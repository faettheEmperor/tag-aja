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
                            <div class="flex items-end justify-end gap-4">
                                <button id="sortDropdownButton1" data-dropdown-toggle="dropdownSort1" type="button"
                                    class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                                    Sort
                                    <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 9-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="dropdownSort1"
                                    class="z-50 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
                                    data-popper-placement="bottom">
                                    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400"
                                        aria-labelledby="sortDropdownButton">
                                        <li>
                                            <a href="javascript:void(0)"
                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                RT/RW </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"
                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                PKH </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"
                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                BPNT </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"
                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                BLT Lansia </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"
                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                BLT Desa </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"
                                                class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Jumlah Anggota Keluarga </a>
                                        </li>
                                    </ul>
                                </div>
                                @if (in_array(Auth::user()->role, ['supervisor', 'admin']))
                                    <button onclick="window.location.href='{{ route('families.export') }}'" type="button"
                                        class="flex items-center justify-end rounded-lg border border-primary-200 bg-green-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 hover:text-gray-50 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                        Download
                                        <svg class="animate-bounce h-4 w-4" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                        </svg>
                                    </button>
                                @endif
                                <button onclick="window.location.href='{{ route('family.create') }}'" type="button"
                                    class="flex items-center justify-end rounded-lg border border-primary-200 bg-primary-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 hover:text-gray-50 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
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
                            id="families-container">
                            @foreach ($families as $family)
                                <div class="family-item rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800"
                                    data-rt="{{ $family->rt_address }}" data-pkh="{{ $family->pkh }}"
                                    data-bpnt="{{ $family->bpnt }}" data-blt-elderly="{{ $family->blt_elderly }}"
                                    data-blt-village="{{ $family->blt_village }}"
                                    data-jumlah="{{ $family->number_of_family_member }}">
                                    <div class="h-52 w-full">
                                        <a href="#">
                                            <img class="mx-auto h-full dark:hidden rounded-md"
                                                src="{{ asset('storage/' . $family->house_photo) }}"
                                                alt="Foto Rumah" />
                                        </a>
                                    </div>
                                    <div class="pt-6">
                                        <div class="mb-4 flex items-center justify-between gap-4">
                                            <span
                                                class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                                {{ $family->created_at->diffForHumans() }} </span>
                                            <div class="flex items-center justify-end gap-1 text-sm">
                                                <p class="font-sm text-gray-500">
                                                    {{ $family->created_at->format('j F Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="ext-lg font-semibold leading-tight text-gray-900 dark:text-white">
                                            <p>@php $kepala = $family->members->firstWhere('status_in_family', 'Kepala Keluarga'); @endphp
                                                {{ $kepala->full_name }}</p>
                                        </div>
                                        <div class="mt-4 flex items-center gap-2">
                                            <div class="table">
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                Kelurahan
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $family->kelurahan->nama ?? '-' }}</div>
                                                    </div>
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                RT
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            RT {{ $family->rtRw->rt ?? '-' }} RW
                                                            {{ $family->rtRw->rw ?? '-' }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            <div class="mb-2">
                                                                Jumlah Anggota
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            {{ $family->number_of_family_member }}</div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            Jenis Bantuan</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-200 text-pink-800">
                                                                PKH
                                                                @if ($family->pkh == 'Ya')
                                                                    <svg class="w-4 h-4 text-green-800 dark:text-green-800"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="4"
                                                                            d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                @else
                                                                    <svg class="w-4 h-4 text-red-800 dark:text-red-800"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="4"
                                                                            d="M6 18 17.94 6M18 18 6.06 6" />
                                                                    </svg>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            <div class="mt-2">
                                                                <span
                                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                                    BPNT
                                                                    @if ($family->bpnt == 'Ya')
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
                                                                    @else
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
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            <div class="mt-2">
                                                                <span
                                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                                    DESA
                                                                    @if ($family->blt_village == 'Ya')
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
                                                                    @else
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
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 dark:text-white pr-2">
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                                                            <div class="mt-2">
                                                                <span
                                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                                    LANSIA
                                                                    @if ($family->blt_elderly == 'Ya')
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
                                                                    @else
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
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-row-group">
                                                    <div class="table-row">
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 pr-2">
                                                            <div class="mt-2">
                                                                Koordinat
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="table-cell text-left text-sm font-medium text-gray-900 pr-2">
                                                            :</div>
                                                        <div
                                                            class="table-cell text-left text-sm text-gray-500 align-middle">
                                                            <div class="mt-2">
                                                                <a href="https://www.google.com/maps?q={{ $family->latitude }},{{ $family->longitude }}"
                                                                    target="_blank"
                                                                    class="text-blue-600 hover:underline inline-flex items-center gap-1">
                                                                    <svg class="w-4 h-4" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                                        </path>
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                    </svg>
                                                                    {{ number_format($family->latitude, 6) }},
                                                                    {{ number_format($family->longitude, 6) }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center justify-end gap-4">
                                            <button type="button"
                                                onclick="window.location.href='{{ route('family.edit', $family->id) }}'"
                                                class="editBtn inline-flex items-center rounded-lg bg-primary-700 px-3 py-1.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                Edit
                                                <svg class="-me-0.5 ms-2 h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                                </svg>
                                            </button>
                                            <button type="button" data-modal-target="popup-modal"
                                                data-modal-toggle="popup-modal" data-family-id="{{ $family->id }}"
                                                class="deleteBtn inline-flex items-center rounded-lg bg-red-700 px-3 py-1.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                Hapus
                                                <svg class="-me-0.5 ms-2 h-5 w-5" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3 6.60001H21M4.8 6.60001H19.2V15C19.2 17.8284 19.2 19.2426 18.3213 20.1213C17.4426 21 16.0284 21 13.2 21H10.8C7.97157 21 6.55736 21 5.67868 20.1213C4.8 19.2426 4.8 17.8284 4.8 15V6.60001Z"
                                                        stroke="#ffffff" stroke-width="null" stroke-linecap="round"
                                                        class="my-path"></path>
                                                    <path
                                                        d="M7.49994 6.59994V4.99994C7.49994 3.89537 8.39537 2.99994 9.49994 2.99994H14.4999C15.6045 2.99994 16.4999 3.89537 16.4999 4.99994V6.59994M16.4999 6.59994H2.99994M16.4999 6.59994H21"
                                                        stroke="#ffffff" stroke-width="null" stroke-linecap="round"
                                                        class="my-path"></path>
                                                    <path d="M10.2 11.1L10.2 16.5" stroke="#ffffff"
                                                        stroke-width="null" stroke-linecap="round" class="my-path">
                                                    </path>
                                                    <path d="M13.8 11.1L13.8 16.5" stroke="#ffffff"
                                                        stroke-width="null" stroke-linecap="round" class="my-path">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div id="popup-modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12 17a2 2 0 0 1 2 2h-4a2 2 0 0 1 2-2Z" />
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13.815 9H16.5a2 2 0 1 0-1.03-3.707A1.87 1.87 0 0 0 15.5 5 1.992 1.992 0 0 0 12 3.69 1.992 1.992 0 0 0 8.5 5c.002.098.012.196.03.293A2 2 0 1 0 7.5 9h3.388m2.927-.985v3.604M10.228 9v2.574M15 16h.01M9 16h.01m11.962-4.426a1.805 1.805 0 0 1-1.74 1.326 1.893 1.893 0 0 1-1.811-1.326 1.9 1.9 0 0 1-3.621 0 1.8 1.8 0 0 1-1.749 1.326 1.98 1.98 0 0 1-1.87-1.326A1.763 1.763 0 0 1 8.46 12.9a2.035 2.035 0 0 1-1.905-1.326A1.9 1.9 0 0 1 4.74 12.9 1.805 1.805 0 0 1 3 11.574V12a9 9 0 0 0 18 0l-.028-.426Z" />
                                            </svg>

                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                yakin ingin menghapus keluarga ini? </h3>
                                            <form id="deleteForm" method="POST"
                                                action="{{ route('family.delete', ['id' => '$family->id']) }}">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="family_id" id="family_id">
                                                <button data-modal-hide="popup-modal" type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Tentu, hapus Saja!
                                                </button>
                                                <button data-modal-hide="popup-modal" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak,
                                                    tunggu</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <!-- END SATU DIV -->

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
                const shopItems = document.querySelectorAll('.family-item'); // Semua item tagging usaha

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

        {{-- Pagination --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi data untuk pagination
                let currentPage = 1;
                const itemsPerPage = 9; // Jumlah item per halaman
                const shopItems = document.querySelectorAll('.family-item');
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

        {{-- Edit data --}}
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
            // DEKLARASI VARIABEL
            const container = document.getElementById('families-container');

            document.addEventListener('DOMContentLoaded', function() {
                // AMBIL SEMUA LINK SORTING
                const sortLinks = document.querySelectorAll('#dropdownSort1 a');

                // PASANG EVENT LISTENER KE SETIAP LINK
                sortLinks.forEach((link, index) => {
                    link.addEventListener('click', function(event) {
                        event.preventDefault(); // CEGAH REFRESH
                        event.stopPropagation();
                        const sortBy = this.textContent.trim();
                        // PANGGIL FUNGSI SORTING
                        sortCards(sortBy);
                    });
                });
            });

            // FUNGSI UTAMA SORTING
            function sortCards(criteria) {
                // CEK APAKAH CONTAINER ADA
                if (!container) {
                    console.error('Container families-container tidak ditemukan!');
                    return;
                }

                // AMBIL SEMUA CARD
                const cards = Array.from(document.querySelectorAll('.family-item'));
                if (cards.length === 0) {
                    return;
                }

                // LOGIKA SORTING
                cards.sort((a, b) => {
                    switch (criteria) {
                        case 'RT/RW':
                            // EKSTRAK ANGKA DARI RT
                            const rtA = extractRT(a.dataset.rt);
                            const rtB = extractRT(b.dataset.rt);
                            return rtA - rtB;

                        case 'PKH':
                            // PRIORITASKAN YANG 'Ya'
                            return (b.dataset.pkh === 'Ya' ? 1 : 0) - (a.dataset.pkh === 'Ya' ? 1 : 0);

                        case 'BPNT':
                            return (b.dataset.bpnt === 'Ya' ? 1 : 0) - (a.dataset.bpnt === 'Ya' ? 1 : 0);

                        case 'BLT Lansia':
                            return (b.dataset.bltElderly === 'Ya' ? 1 : 0) - (a.dataset.bltElderly === 'Ya' ? 1 : 0);

                        case 'BLT Desa':
                            return (b.dataset.bltVillage === 'Ya' ? 1 : 0) - (a.dataset.bltVillage === 'Ya' ? 1 : 0);

                        case 'Jumlah Anggota Keluarga':
                            // URUT DARI TERBESAR
                            return parseInt(b.dataset.jumlah) - parseInt(a.dataset.jumlah);

                        default:
                            return 0;
                    }
                });

                // RENDER ULANG CARD
                container.innerHTML = '';
                cards.forEach(card => container.appendChild(card));
            }

            // FUNGSI BANTUAN: EXTRACT ANGKA DARI RT
            function extractRT(rtString) {
                if (!rtString) return 999;
                const match = rtString.match(/RT (\d+)/i);
                return match ? parseInt(match[1]) : 999;
            }

            // FUNGSI SEARCH
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('search');
                const cards = document.querySelectorAll('.family-item');

                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();

                    cards.forEach(card => {
                        // Ambil data yang mau dicari
                        const kepalaNama = card.querySelector('.ext-lg.font-semibold p')?.textContent
                            .toLowerCase() || '';
                        const rtAddress = card.dataset.rt?.toLowerCase() || '';
                        const jumlahAnggota = card.dataset.jumlah || '';

                        // Cek apakah cocok dengan pencarian
                        const matches =
                            kepalaNama.includes(searchTerm) ||
                            rtAddress.includes(searchTerm) ||
                            jumlahAnggota.includes(searchTerm);

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
                    const visibleCards = document.querySelectorAll('.family-item[style="display: none;"]');
                    const totalCards = document.querySelectorAll('.family-item').length;
                    const container = document.getElementById('families-container');

                    // Hapus pesan kosong lama jika ada
                    const oldMessage = document.getElementById('search-empty-message');
                    if (oldMessage) oldMessage.remove();

                    // Kalau semua card tersembunyi, tampilkan pesan
                    if (visibleCards.length === totalCards && totalCards > 0) {
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
