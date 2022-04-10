<x-layouts.base>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" x-data="{ isSideMenuOpen: false }"
        x-bind:class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
            aria-label="Desktop sidebar">
            <x-partials.sidebar />
        </aside>
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        </div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
            aria-label="Mobile sidebar" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform -translate-x-20" x-on:click.away="{ isSideMenuOpen: false }"
            x-on:keydown.escape="{ isSideMenuOpen: false }">
            <x-partials.sidebar />
        </aside>
        <div class="flex flex-col flex-1">
            <x-partials.header />
            <main class="h-full pb-16 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-layouts.base>
