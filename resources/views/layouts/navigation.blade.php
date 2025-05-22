<div class="flex min-h-screen">

    <!-- Sidebar -->
    <nav x-data="{ open: true }" class="bg-white dark:bg-gray-800 transition-all duration-200 flex flex-col min-h-screen" :class="open ? 'w-56' : 'w-16'">
        <!-- Logo & Toggle -->
        <button @click="open = !open" class="flex items-center justify-center h-16 w-full focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-900 relative">
            <x-application-logo class="block h-9 w-auto fill-current  dark:text-" />
            <span x-show="open" class="ml-3 font-bold text-lg  transition-all duration-200">{{ config('app.name', 'Laravel') }}</span>
            <svg x-show="open" class="absolute right-4 h-5 w-5 " fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5" />
            </svg>
            <svg x-show="!open" class="absolute right-4 h-5 w-5 " fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
            </svg>
        </button>
        <!-- Menu Points -->
        <div class="flex-1 flex flex-col items-center py-4 space-y-2">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center justify-center w-full h-12">
                <div class="flex items-center justify-center w-full h-full">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                    </svg>
                    <span x-show="open" class="ml-3 flex items-center">{{ __('Dashboard') }}</span>
                </div>
            </x-nav-link>
            {{-- Add more nav links here as needed, with icons --}}
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-h-screen">
        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 w-full h-16 flex items-center justify-between px-6">
            <!-- Breadcrumbs on the left -->
            <div class="flex items-center">
                @if (isset($breadcrumbs))
                    {{ $breadcrumbs }}
                @endif
            </div>
            <!-- Profile settings on the right -->
            <div class="flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 dark:bg-gray-700 text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 dark:bg-gray-900 p-6">
            {{ $slot }}
        </main>
    </div>

</div>
