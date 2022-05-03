<x-layouts.guest>
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('img/office.jpeg') }}" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Password Confirmation') }}
            </h1>

            <form action="{{ route('password.confirm') }}" method="post">
                @csrf
                <div class="block text-sm">
                    <x-forms.label for="input-password">{{ __('Current Password') }}</x-forms.label>
                    <x-inputs.password name="password" id="input-password" placeholder="***************" />
                    <x-forms.error name="password" />
                </div>

                <x-buttons.submit>{{ __('Confirm') }}</x-buttons.submit>
            </form>
        </div>
    </div>
</x-layouts.guest>
