<x-layouts.app>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Profile
        </h2>
        <div class="lg:w-1/2">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Profile Information
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('user-profile-information.update') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="block text-sm">
                        <x-forms.label for="input-name">{{ __('Name') }}</x-forms.label>
                        <x-inputs.text name="name" id="input-name" placeholder="{{ __('Name') }}"
                            value="{{ auth()->user()->name }}" />
                        @error('name', 'updateProfileInformation')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="block mt-4 text-sm">
                        <x-forms.label for="input-email">{{ __('Email') }}</x-forms.label>
                        <x-inputs.text name="email" id="input-email" placeholder="{{ __('Email') }}"
                            value="{{ auth()->user()->email }}" />
                        @error('email', 'updateProfileInformation')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <x-buttons.submit>{{ __('Update') }}</x-buttons.submit>
                </form>
            </div>

            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Password Update
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('user-password.update') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="block text-sm">
                        <x-forms.label for="input-current-password">{{ __('Current Password') }}</x-forms.label>
                        <x-inputs.password name="current_password" id="input-current-password"
                            placeholder="***************" />
                        @error('current_password', 'updatePassword')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="block mt-4 text-sm">
                        <x-forms.label for="input-password">{{ __('Password') }}</x-forms.label>
                        <x-inputs.password name="password" id="input-password" placeholder="***************" />
                        @error('password', 'updatePassword')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="block mt-4 text-sm">
                        <x-forms.label for="input-password-confirmation">{{ __('Confirm Password') }}</x-forms.label>
                        <x-inputs.password name="password_confirmation" id="input-password-confirmation"
                            placeholder="***************" />
                        @error('password_confirmation', 'updatePassword')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <x-buttons.submit>{{ __('Update') }}</x-buttons.submit>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
