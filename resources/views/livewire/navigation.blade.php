<style>
    .item-menu:hover, .item-submenu li>a:hover
    {
        background-color: #215a9a !important;
        color: #fff !important;
    }

    .linea-menu
    {
        width: 100%;
        height: 40px;
        background: #36c;
    }

    .icono-home
    {
        font-size: 20px;
        margin-top: 10px;
    }
</style>

<div class="linea-menu" id="linea-menu"></div>

<nav class="bg-white shadow sticky top-0" x-data="{ open: false }" style="z-index: 200" id="menu">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

                <button x-on:click=" open = true " type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <!--
                    Icon when menu is closed.
        
                    Heroicon name: outline/menu
        
                    Menu open: "hidden", Menu closed: "block"
                  -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                    Icon when menu is open.
        
                    Heroicon name: outline/x
        
                    Menu open: "block", Menu closed: "hidden"
                  -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                {{-- Logotipo --}}
                <a href="{{Route('secondcontent.home')}}" class="flex-shrink-0 flex items-center">
                    @foreach ($seconds as $item)
                        @foreach ($item->image as $img)
                            @if ($img->id == 2)
                                <img class="block h-11 w-28 object-cover object-center"
                                    src="{{ Storage::url($img->url) }}" alt="">
                            @endif
                        @endforeach
                    @endforeach
                </a>

                {{-- Menu lg --}}
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('secondcontent.home') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 py-2 rounded-md text-sm font-medium item-menu"><i class="fa-solid fa-home icono-home"></i></a>
                        <a href="{{ route('secondcontent.index') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 py-2 rounded-md text-sm font-medium item-menu">Antecedentes
                            y contexto
                        </a>

                        <ul class="flex flex-col">

                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 rounded-md text-sm item-menu">Movilización
                                    social 2021
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-72 dark:bg-gray-700 dark:divide-gray-600"
                                    data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(682px, 2583px);">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400 item-submenu"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('generales_panorámica.index') }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                style="text-decoration: none">Una mirada Panorámica</a>
                                        </li>
                                        {{-- <li>
                                            <button type="button"
                                                class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                                aria-controls="dropdown-example"
                                                data-collapse-toggle="dropdown-example">

                                                <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                                    sidebar-toggle-item>Generales-panorámica

                                                </span>
                                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd">
                                                    </path>
                                                </svg>
                                            </button>
                                            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                                <li>
                                                    <a href="{{ Route('secondcontent.LT') }}"
                                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white">LT</a>
                                                </li>
                                                <li>
                                                    <a href="{{ Route('secondcontent.alcaldia') }}"
                                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:text-white">Alcaldía</a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                        <li>
                                            <a href="{{ Route('secondcontent.analisis') }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                style="text-decoration: none">Análisis y reflexiones</a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('secondcontent.derechos_humanos') }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                style="text-decoration: none">Derechos humanos</a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('secondcontent.territorio') }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                style="text-decoration: none">Territorio y representaciones
                                                colectivas</a>
                                        </li>
                                    </ul>

                                </div>
                            </li>

                        </ul>

                        <a href="{{ route('dialogo.index') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 py-2 rounded-md text-sm font-medium item-menu">Exploración y diálogo
                        </a>

                        {{--<ul class="flex flex-col">

                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar1"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 rounded-md text-sm item-menu">Exploración
                                    y diálogo
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar1"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-56 dark:bg-gray-700 dark:divide-gray-600"
                                    data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(682px, 2583px);">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400 item-submenu"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                style="text-decoration: none">Conversaciones territoriales</a>
                                        </li>
                                        <li>
                                            <a href="{{ Route('dialogo.index') }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                style="text-decoration: none">Diálogo distrital</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                style="text-decoration: none">Acuerdos</a>
                                        </li>
                                    </ul>

                                </div>
                            </li>

                        </ul>--}}
                        {{-- <a href="{{ route('dialogo.index') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 py-2 rounded-md text-sm font-medium item-menu">Diálogo
                            y negociación
                        </a> --}}

                        <a href="{{ route('atencion.index') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-2 py-2 rounded-md text-sm font-medium item-menu">Atención
                            de emergencia
                        </a>

                        {{-- <a href="{{ route('inclusion.index') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 py-2 rounded-md text-sm font-medium item-menu">Inclusión
                            y reconciliación
                        </a> --}}
                        
                        <a href="{{ route('inclusion.index') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 py-2 rounded-md text-sm font-medium item-menu">Inclusión
                                    y reconciliación
                        </a>

                        {{--<ul class="flex flex-col">

                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 rounded-md text-sm item-menu">Inclusión
                                    y reconciliación
                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar2"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-48 dark:bg-gray-700 dark:divide-gray-600"
                                    data-popper-reference-hidden="" data-popper-escaped=""
                                    data-popper-placement="top"
                                    style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(682px, 2583px);">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400 item-submenu"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('inclusion.index') }}"
                                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                                style="text-decoration: none">Resiliencia e iniciativas</a>
                                        </li>
                                    </ul>

                                </div>
                            </li>

                        </ul>--}}

                        <a href="{{ route('arte.index') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 py-2 rounded-md text-sm font-medium item-menu">Arte
                            y cultura
                        </a>
                        {{-- <a href="{{ route('alcaldia.index') }}"
                            class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 py-2 rounded-md text-sm font-medium item-menu">Alcaldía
                        </a> --}}
                    </div>
                </div>
            </div>

            @auth
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    {{-- Boton notificaciones --}}
                    <button type="button"
                        class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">

                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative" x-data="{ open: false }">
                        <div>
                            <button x-on:click=" open = true " type="button"
                                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>

                        <div x-show="open" x-on:click.away=" open = false "
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" x-on:click.away="open = false" class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            <a href="{{ route('secondcontent.index') }}"
                class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 block px-3 py-2 rounded-md text-base font-medium">Antecedentes
                y contexto
            </a>

            <ul class="flex flex-col">
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar4"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 rounded-md text-base">Movilización
                        social 2021
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar4"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-72 dark:bg-gray-700 dark:divide-gray-600"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(682px, 2583px);">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400 item-submenu"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('generales_panorámica.index') }}"
                                    class="block px-4 py-2 text-gray-800 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    style="text-decoration: none">Generales panorámica</a>
                            </li>
                            <li>
                                <a href="{{ Route('secondcontent.analisis') }}"
                                    class="block px-4 py-2 text-gray-800 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    style="text-decoration: none">Análisis y reflexiones</a>
                            </li>
                            <li>
                                <a href="{{ Route('secondcontent.derechos_humanos') }}"
                                    class="block px-4 py-2 text-gray-800 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    style="text-decoration: none">Derechos humanos</a>
                            </li>
                            <li>
                                <a href="{{ Route('secondcontent.territorio') }}"
                                    class="block px-4 py-2 text-gray-800 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    style="text-decoration: none">Territorio y representaciones
                                    colectivas</a>
                            </li>
                        </ul>

                    </div>
                </li>

            </ul>

            <ul class="flex flex-col">

                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar5"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 rounded-md text-base">Exploración
                        y diálogo
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar5"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-56 dark:bg-gray-700 dark:divide-gray-600"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(682px, 2583px);">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400 item-submenu"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-gray-800 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    style="text-decoration: none">Conversaciones territoriales</a>
                            </li>
                            <li>
                                <a href="{{ Route('dialogo.index') }}"
                                    class="block px-4 py-2 text-gray-800 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    style="text-decoration: none">Diálogo distrital</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-gray-800 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    style="text-decoration: none">Acuerdos</a>
                            </li>
                        </ul>

                    </div>
                </li>

            </ul>

            <a href="{{ route('atencion.index') }}"
                class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 block px-3 py-2 rounded-md text-base font-medium">Atención
                de emergencia
            </a>

            <ul class="flex flex-col">

                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar6"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-800 hover:bg-gray-200 hover:text-slate-800 px-3 rounded-md text-base">Inclusión
                        y reconciliación
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar6"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-48 dark:bg-gray-700 dark:divide-gray-600"
                        data-popper-reference-hidden="" data-popper-escaped=""
                        data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(682px, 2583px);">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400 item-submenu"
                            aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('inclusion.index') }}"
                                    class="block px-4 py-2 text-gray-800 text-base font-medium hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    style="text-decoration: none">Resiliencia e iniciativas</a>
                            </li>
                        </ul>

                    </div>
                </li>

            </ul>

            <a href="{{ route('arte.index') }}"
                class="text-gray-800 hover:bg-gray-200 hover:text-slate-800 block px-3 py-2 rounded-md text-base font-medium">Arte
                y cultura
            </a>
        </div>
    </div>
</nav>
