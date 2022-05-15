<x-layouts.guest>
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('img/office.jpeg') }}" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Forgot password') }}
            </h1>

            <x-partials.alert />

            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="block text-sm">
                    <x-forms.label for="input-email">{{ __('Email') }}</x-forms.label>
                    <x-inputs.text name="email" id="input-email" placeholder="{{ __('Email') }}" />
                    <x-forms.error name="email" />
                </div>

                <x-buttons.submit class="w-full bg-purple-600 active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple">{{ __('Recover password') }}</x-buttons.submit>
            </form>

            <hr class="my-8" />

            <p class="mt-1">
                <x-partials.link href="{{ route('login') }}">{{ __('Back to login') }}</x-partials.link>
            </p>
        </div>
    </div>
</x-layouts.guest>
