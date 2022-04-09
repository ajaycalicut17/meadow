<x-layouts.guest>
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('img/office.jpeg') }}" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Reset password') }}
            </h1>

            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <div class="block text-sm">
                    <x-forms.label name="{{ __('Email') }}" for="input-email" />
                    <x-inputs.text name="email" id="input-email" placeholder="{{ __('Email') }}"
                        value="{{ $request->email }}" readonly />
                    <x-forms.error name="email" />
                </div>
                <div class="block mt-4 text-sm">
                    <x-forms.label name="{{ __('Password') }}" for="input-password" />
                    <x-inputs.password name="password" id="input-password" placeholder="***************" />
                    <x-forms.error name="password" />
                </div>
                <div class="block mt-4 text-sm">
                    <x-forms.label name="{{ __('Confirm Password') }}" for="input-password-confirmation" />
                    <x-inputs.password name="password_confirmation" id="input-password-confirmation"
                        placeholder="***************" />
                    <x-forms.error name="password_confirmation" />
                </div>

                <x-buttons.submit name="{{ __('Reset') }}" />
            </form>

            <hr class="my-8" />

            <p class="mt-1">
                <x-common.link name="{{ __('Back to login') }}" href="{{ route('login') }}" />
            </p>
        </div>
    </div>
</x-layouts.guest>
