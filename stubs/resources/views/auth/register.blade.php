<x-layouts.guest>
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('img/office.jpeg') }}" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Register') }}
            </h1>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="block text-sm">
                    <x-forms.label for="input-name">{{ __('Name') }}</x-forms.label>
                    <x-inputs.text name="name" id="input-name" placeholder="{{ __('Name') }}" />
                    <x-forms.error name="name" />
                </div>
                <div class="block mt-4 text-sm">
                    <x-forms.label for="input-email">{{ __('Email') }}</x-forms.label>
                    <x-inputs.text name="email" id="input-email" placeholder="{{ __('Email') }}" />
                    <x-forms.error name="email" />
                </div>
                <div class="block mt-4 text-sm">
                    <x-forms.label for="input-password">{{ __('Password') }}</x-forms.label>
                    <x-inputs.password name="password" id="input-password" placeholder="***************" />
                    <x-forms.error name="password" />
                </div>
                <div class="block mt-4 text-sm">
                    <x-forms.label for="input-password-confirmation">{{ __('Confirm Password') }}</x-forms.label>
                    <x-inputs.password name="password_confirmation" id="input-password-confirmation"
                        placeholder="***************" />
                    <x-forms.error name="password_confirmation" />
                </div>

                <x-buttons.submit class="w-full bg-purple-600 active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple">{{ __('Register') }}</x-buttons.submit>
            </form>

            <hr class="my-8" />

            <p class="mt-1">
                <x-partials.link href="{{ route('login') }}">{{ __('Back to login') }}</x-partials.link>
            </p>
        </div>
    </div>
</x-layouts.guest>
