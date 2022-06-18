<x-layouts.guest>
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('img/office.jpeg') }}" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Login') }}
            </h1>

            <x-partials.alert />

            @livewire('auth.login')

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::resetPasswords()) || Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
                <hr class="my-8" />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::resetPasswords()))
                <p class="mt-1">
                    <x-partials.link href="{{ route('password.request') }}">{{ __('Forgot your password?') }}
                    </x-partials.link>
                </p>
            @endif
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
                <p class="mt-1">
                    <x-partials.link href="{{ route('register') }}">{{ __('Create account') }}</x-partials.link>
                </p>
            @endif
        </div>
    </div>
</x-layouts.guest>
