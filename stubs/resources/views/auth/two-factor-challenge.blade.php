<x-layouts.guest>
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('img/office.jpeg') }}" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full" x-data="{ recovery: false }">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Two Factor Authentication') }}
            </h1>

            <div class="block text-sm text-gray-700 dark:text-gray-400" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="block text-sm text-gray-700 dark:text-gray-400" x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            <form action="{{ route('two-factor.login') }}" method="post">
                @csrf
                <div class="block text-sm mt-4" x-show="! recovery">
                    <x-forms.label for="input-code">{{ __('Code') }}</x-forms.label>
                    <x-inputs.text name="code" id="input-code" placeholder="{{ __('Code') }}" />
                    <x-forms.error name="code" />
                </div>

                <div class="block text-sm mt-4" x-show="recovery">
                    <x-forms.label for="input-recovery_code">{{ __('Recovery Code') }}</x-forms.label>
                    <x-inputs.text name="recovery_code" id="input-recovery_code"
                        placeholder="{{ __('Recovery Code') }}" />
                    <x-forms.error name="recovery_code" />
                </div>

                <x-buttons.submit class="w-full bg-purple-600 active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple">{{ __('Confirm') }}</x-buttons.submit>
            </form>

            <hr class="my-8" />

            <p class="mt-1" x-show="! recovery">
                <x-buttons.underline x-show="! recovery" x-on:click="recovery = true">{{ __('Use a recovery code') }}
                    </x-partials.link>
            </p>

            <p class="mt-1" x-show="recovery">
                <x-buttons.underline x-on:click="recovery = false">{{ __('Use an authentication code') }}
                    </x-partials.link>
            </p>

            <p class="mt-1">
                <x-partials.link href="{{ route('login') }}">{{ __('Back to login') }}</x-partials.link>
            </p>
        </div>
    </div>
</x-layouts.guest>
