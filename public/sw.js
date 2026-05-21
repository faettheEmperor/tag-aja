"use strict";

const CACHE_NAME = "offline-cache-v3";
const OFFLINE_URL = "/offline.html";

const filesToCache = [
    OFFLINE_URL
];

// INSTALL
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => cache.addAll(filesToCache))
    );

    // LANGSUNG AKTIFKAN SW BARU
    self.skipWaiting();
});

// FETCH
self.addEventListener("fetch", (event) => {

    // BYPASS SEMUA REQUEST NON-GET
    if (event.request.method !== "GET") {
        event.respondWith(fetch(event.request));
        return;
    }

    // HANDLE PAGE NAVIGATION
    if (event.request.mode === "navigate") {
        event.respondWith(
            fetch(event.request)
                .then((response) => {
                    return response;
                })
                .catch(() => {
                    return caches.match(OFFLINE_URL);
                })
        );
    }

    // HANDLE ASSET CACHE (CSS, JS, IMG, DLL)
    else {
        event.respondWith(
            caches.match(event.request)
                .then((cachedResponse) => {

                    // JIKA ADA DI CACHE
                    if (cachedResponse) {
                        return cachedResponse;
                    }

                    // JIKA TIDAK ADA → FETCH DARI NETWORK
                    return fetch(event.request)
                        .then((networkResponse) => {

                            // VALIDASI RESPONSE
                            if (
                                !networkResponse ||
                                networkResponse.status !== 200 ||
                                networkResponse.type !== "basic"
                            ) {
                                return networkResponse;
                            }

                            // SIMPAN KE CACHE
                            const responseToCache = networkResponse.clone();

                            caches.open(CACHE_NAME)
                                .then((cache) => {
                                    cache.put(event.request, responseToCache);
                                });

                            return networkResponse;
                        });
                })
        );
    }
});

// ACTIVATE
self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {

                    // HAPUS CACHE LAMA
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );

    // LANGSUNG CLAIM CLIENT
    self.clients.claim();
});