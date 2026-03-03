<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Keluarga') }}
        </h2>
    </x-slot>
    @if (session('status'))
        <div class="max-w-7xl mx-auto py-1 px-4 sm:px-6 lg:px-8 items-start justify-start">
            <div id='alert'
                class="fixed alert w-auto flex items-center p-4 mt-3 text-base text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="message-alert">
                    <span class="font-medium">Yey!</span> {{ session('status') }}
                </div>
            </div>
        </div>
    @endif

    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section class="bg-gray-50 py-4 antialiased dark:bg-gray-900 md:py-12 md:px-5">
                    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                        <!-- Heading & Filters -->
                        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                            <div>
                                <form class="lg:w-96 max-w-full sm:w-72 mx-auto">
                                    <label for="search"
                                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                        </div>
                                        <input name="search" type="text" id="search"
                                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Pencarian" required />
                                    </div>
                                </form>
                            </div>
                            <div class="flex items-end justify-end gap-4 w-full sm:w-auto">
                                <button onclick="window.location.href='{{ route('family.create') }}'" type="button"
                                    class="flex items-center justify-center rounded-lg border border-primary-200 bg-primary-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 hover:text-gray-50 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 w-full sm:w-auto">
                                    Tagging
                                    <svg class="animate-bounce h-4 w-4" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.81207 6.05324C9.53921 2.87158 14.4614 2.87158 17.1885 6.05324C19.382 8.61225 19.382 12.3884 17.1885 14.9474L13.0785 19.7424C12.7864 20.0831 12.6404 20.2535 12.4797 20.3413C12.1809 20.5045 11.8197 20.5045 11.5209 20.3413C11.3602 20.2535 11.2142 20.0831 10.9221 19.7424L6.81207 14.9474C4.61863 12.3884 4.61863 8.61225 6.81207 6.05324Z"
                                            stroke="white" stroke-width="null" class="my-path"></path>
                                        <path
                                            d="M14 10C14 11.1046 13.1046 12 12 12C10.8954 12 10 11.1046 10 10C10 8.89543 10.8954 8 12 8C13.1046 8 14 8.89543 14 10Z"
                                            stroke="white" stroke-width="null" class="my-path"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div id="emptyState" class="hidden card bg-gray-50 p-4 rounded-lg text-center justify-center">
                            <h2 class="text-lg font-semibold text-gray-700">Belum ada data</h2>
                            <p class="text-gray-500">Silakan tambahkan keluarga.</p>
                        </div>
                        <div class="shopContainer mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3"
                            id="family-members-container">
                            @foreach ($members as $member)
                                <div
                                    class="member-item rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <div class="pt-6">
                                        <div class="mb-4 flex items-center justify-between gap-4">
                                            <span
                                                class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                                {{ $member->created_at->diffForHumans() }} </span>
                                            <div class="flex items-center justify-end gap-1 text-sm">
                                                <p class="font-sm text-gray-500">
                                                    {{ $member->created_at->format('j F Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="mb-4 pb-4 border-b border-gray-200">
                                            <div class="font-medium text-gray-900">
                                                Kepala Keluarga:
                                                @php
                                                    $kepala = $member->family->members->firstWhere(
                                                        'status_in_family',
                                                        'Kepala Keluarga',
                                                    );
                                                @endphp
                                                <span
                                                    class="text-gray-900">{{ $kepala->full_name ?? 'Tidak diketahui' }}</span>
                                            </div>
                                            <div class="text-sm text-gray-500 mb-1">Nomor KK :
                                                {{ $member->family->number_kk ?? '-' }}</div>
                                            <div class="text-sm text-gray-600 mt-1">RT/RW:
                                                {{ $member->family->rt_address ?? '-' }}</div>
                                        </div>
                                        <div class="ext-lg font-semibold leading-tight text-gray-900 dark:text-white">
                                            {{ $member->full_name }}</p>
                                        </div>
                                        <div class="mt-4 flex items-center gap-2">
                                            <div class="table">
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                RT/RW
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->family->rt_address ?? '-' }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                Status Keluarga
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->status_in_family }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                Tempat Lahir
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->place_of_birth }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                Status Kawin
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->marital_status }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                Pendidikan Tertinggi
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->highest_education_level }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                Ijazah Terakhir
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->highest_education_certificate }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                Status Ketenagakerjaan
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->employment_status }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="">
                                                                Status Dalam Bekerja
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->employment_position }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mt-2">
                                                                Jaminan Kesehatan
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            <div class="mb-2">
                                                                @if ($member->health_insurance == 'BPJS Kesehatan PBI')
                                                                    <span
                                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-200 text-pink-800">
                                                                        PBI
                                                                        <svg class="w-4 h-4 text-green-800 dark:text-green-800"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="4"
                                                                                d="M5 11.917 9.724 16.5 19 7.5" />
                                                                        </svg>
                                                                    </span>
                                                                @elseif ($member->health_insurance == 'BPJS Kesehatan Non PBI/Mandiri')
                                                                    <span
                                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-200 text-amber-800">
                                                                        Non-PBI
                                                                        <svg class="w-4 h-4 text-green-800 dark:text-green-800"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="4"
                                                                                d="M5 11.917 9.724 16.5 19 7.5" />
                                                                        </svg>
                                                                    </span>
                                                                @elseif ($member->health_insurance == 'JAMKESDA')
                                                                    <span
                                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                                        JAMKESDA
                                                                        <svg class="w-4 h-4 text-green-800 dark:text-green-800"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="4"
                                                                                d="M5 11.917 9.724 16.5 19 7.5" />
                                                                        </svg>
                                                                    </span>
                                                                @elseif ($member->health_insurance == 'Tidak memiliki')
                                                                    <span
                                                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                                        Tidak memiliki
                                                                        <svg class="w-4 h-4 text-red-800 dark:text-red-800"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="4"
                                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                                        </svg>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mt-2">
                                                                Stunting
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->stunting }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mt-2">
                                                                Disabilitas
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $member->disability }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="w-full text-center">

                            <div class="flex flex-col items-center">
                                <!-- Help text -->
                                <span class="text-sm text-gray-700 dark:text-gray-400">
                                    Showing <span id="startEntry"
                                        class="font-semibold text-gray-900 dark:text-white"></span> to
                                    <span id="endEntry" class="font-semibold text-gray-900 dark:text-white"></span>
                                    of
                                    <span id="totalEntries"
                                        class="font-semibold text-gray-900 dark:text-white"></span> Entries
                                </span>
                                <!-- Buttons -->
                                <div class="inline-flex mt-2 xs:mt-0">
                                    <button id="prevBtn"
                                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-700 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        Prev
                                    </button>
                                    <button id="nextBtn"
                                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-700 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        Next
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            </section>
        </div>
    </div>
    </div>
    @push('scrollreveal-index')
        {{-- Pesan kosong --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const shopContainer = document.getElementById('shopContainer'); // Wrapper untuk card
                const emptyState = document.getElementById('emptyState'); // Div untuk pesan kosong
                const shopItems = document.querySelectorAll('.member-item'); // Semua item tagging usaha

                function checkEmptyState() {
                    if (shopItems.length === 0) {
                        // Tampilkan pesan kosong
                        emptyState.classList.remove('hidden');
                        shopContainer.style.display = 'none'; // Sembunyikan container utama
                    } else {
                        // Sembunyikan pesan kosong
                        emptyState.classList.add('hidden');
                    }
                }

                // Panggil fungsi checkEmptyState saat halaman dimuat
                checkEmptyState();
            });
        </script>

        {{-- Scroll Reveal --}}
        <script>
            window.sr = ScrollReveal({
                duration: 300,
                distance: '50px',
                easing: 'ease-out'
            });

            sr.reveal('.alert', {
                interval: 200,
                origin: 'bottom',
                reset: false
            })

            sr.reveal('.message-alert', {
                interval: 200,
                delay: 500,
                origin: 'left',
                reset: true,
            })
            // sr.reveal('.shop-item', {interval: 300, origin:'bottom', reset:false})
        </script>
        <script>
            // Pastikan alert ditampilkan hanya jika ada session status
            document.addEventListener('DOMContentLoaded', function() {
                // Ambil elemen alert
                const alert = document.getElementById('alert');

                // Cek jika alert ada
                if (alert) {
                    // Tunggu 2 detik, kemudian animasikan ke opacity 0
                    setTimeout(function() {
                        alert.classList.add('opacity-0'); // Menambahkan kelas untuk menghilangkan alert
                        alert.classList.remove('opacity-100'); // Menghapus kelas yang membuat alert terlihat

                        // Setelah animasi selesai (1 detik), hapus elemen dari DOM
                        setTimeout(function() {
                            alert.remove();
                        }, 1000); // 1000ms = 1 detik untuk waktu transisi
                    }, 3000); // 2000ms = 2 detik sebelum menghilang
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi data untuk pagination
                let currentPage = 1;
                const itemsPerPage = 10; // Jumlah item per halaman
                const shopItems = document.querySelectorAll('.member-item');
                const totalItems = shopItems.length; // Total jumlah item yang ada
                const totalPages = Math.max(1, Math.ceil(totalItems /
                    itemsPerPage)); // Minimal 1 halaman, bahkan jika tidak ada data

                // Fungsi untuk memperbarui tampilan item sesuai halaman
                function updatePagination() {
                    const start = (currentPage - 1) * itemsPerPage;
                    const end = start + itemsPerPage;

                    // Sembunyikan semua item terlebih dahulu
                    shopItems.forEach(item => (item.style.display = 'none'));

                    // Tampilkan item yang sesuai dengan halaman saat ini
                    if (totalItems > 0) {
                        for (let i = start; i < end && i < totalItems; i++) {
                            shopItems[i].style.display = ''; // Menampilkan item
                        }

                        // Perbarui teks rentang item yang ditampilkan
                        document.getElementById('startEntry').textContent = start + 1;
                        document.getElementById('endEntry').textContent = Math.min(end, totalItems);
                    } else {
                        // Jika tidak ada item, tampilkan 0
                        document.getElementById('startEntry').textContent = 0;
                        document.getElementById('endEntry').textContent = 0;
                    }

                    document.getElementById('totalEntries').textContent = totalItems;

                    // Perbarui status tombol navigasi
                    document.getElementById('prevBtn').disabled = currentPage === 1;
                    document.getElementById('nextBtn').disabled = currentPage === totalPages || totalItems === 0;
                }

                // Fungsi untuk pindah ke halaman sebelumnya
                document.getElementById('prevBtn').addEventListener('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        updatePagination();
                    }
                });

                // Fungsi untuk pindah ke halaman berikutnya
                document.getElementById('nextBtn').addEventListener('click', function() {
                    if (currentPage < totalPages) {
                        currentPage++;
                        updatePagination();
                    }
                });

                // Memulai pagination dengan menampilkan halaman pertama
                updatePagination();
            });
        </script>
        <script>
            const editButtons = document.querySelectorAll('.editBtn');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const shopId = this.dataset.shopId || '';
                    const shopName = this.dataset.shopName || '';
                    const shopDescription = this.dataset.shopDescription || '';
                    const shopAddress = this.dataset.shopAddress || 'Alamat tidak tersedia';

                    // Mengisi data ke dalam modal
                    document.getElementById('shop_id').value = shopId;
                    document.getElementById('shop_name').value = shopName;
                    document.getElementById('shop_description').value = shopDescription;
                    document.getElementById('shop_address').value = shopAddress;
                    console.log(this.dataset.shopAddress);

                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ketika tombol delete ditekan
                document.querySelectorAll('.deleteBtn').forEach(function(button) {
                    button.addEventListener('click', function() {
                        // Ambil ID shop dari tombol
                        var familyId = button.getAttribute('data-family-id');

                        // Set form action dengan route untuk delete
                        var deleteForm = document.getElementById('deleteForm');
                        deleteForm.action = '/family/' + familyId;

                        // Set input hidden family_id
                        document.getElementById('family_id').value = familyId;

                        // Tampilkan modal
                        document.getElementById('popup-modal').classList.remove('hidden');
                    });
                });

                // Tutup modal jika tombol close ditekan
                document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        document.getElementById('popup-modal').classList.add('hidden');
                    });
                });
            });
        </script>
        <script>
            // FUNGSI SEARCH
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('search');
                const cards = document.querySelectorAll('.member-item');
                const container = document.getElementById('family-members-container');

                if (!searchInput) {
                    console.error('Search input tidak ditemukan!');
                    return;
                }

                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();

                    cards.forEach(card => {
                        // Ambil data dari card (sesuaikan dengan struktur HTML lo)
                        const namaAnggota = card.querySelector('.text-lg.font-semibold')?.textContent
                            .toLowerCase() || '';
                        const statusKeluarga = card.querySelector('.table-row-group .text-gray-500')
                            ?.textContent.toLowerCase() || '';

                        // Cari semua teks di dalam card untuk pencarian umum
                        const cardText = card.textContent.toLowerCase();

                        // Cek apakah cocok dengan pencarian
                        const matches =
                            namaAnggota.includes(searchTerm) ||
                            statusKeluarga.includes(searchTerm) ||
                            cardText.includes(searchTerm);

                        // Tampilkan atau sembunyikan card
                        if (searchTerm === '' || matches) {
                            card.style.display = ''; // tampilkan
                        } else {
                            card.style.display = 'none'; // sembunyikan
                        }
                    });

                    // Cek apakah ada card yang tampil
                    checkEmptySearch();
                });

                function checkEmptySearch() {
                    // Hitung card yang tampil (style display bukan 'none')
                    let visibleCount = 0;
                    cards.forEach(card => {
                        if (card.style.display !== 'none') {
                            visibleCount++;
                        }
                    });

                    // Hapus pesan kosong lama jika ada
                    const oldMessage = document.getElementById('search-empty-message');
                    if (oldMessage) oldMessage.remove();

                    // Kalau tidak ada card yang tampil, tampilkan pesan
                    if (visibleCount === 0 && cards.length > 0) {
                        const emptyMessage = document.createElement('div');
                        emptyMessage.id = 'search-empty-message';
                        emptyMessage.className = 'col-span-full text-center py-8 text-gray-500';
                        emptyMessage.textContent = 'Tidak ada data yang cocok dengan pencarian.';
                        container.appendChild(emptyMessage);
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
