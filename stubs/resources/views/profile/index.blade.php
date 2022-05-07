<x-layouts.app>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Profile') }}
        </h2>
        @if (session('status'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="flex items-center p-4 mb-8 text-sm font-semibold text-white bg-green-500 focus:shadow-outline-green rounded-lg shadow-md focus:outline-none">
                @if (session('status') == 'profile-information-updated')
                    {{ __('Profile information updated successfully') }}
                @elseif (session('status') == 'password-updated')
                    {{ __('Password updated successfully') }}
                @elseif (session('status') == 'two-factor-authentication-enabled')
                    {{ __('Two factor authentication enabled successfully, please finish configuring two factor authentication below.') }}
                @elseif (session('status') == 'two-factor-authentication-disabled')
                    {{ __('Two factor authentication disabled successfully.') }}
                @endif
            </div>
        @endif
        <div class="lg:w-1/2">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    {{ __('Profile Information') }}
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
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    {{ __('Password Update') }}
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
                            <x-forms.label for="input-password-confirmation">{{ __('Confirm Password') }}
                            </x-forms.label>
                            <x-inputs.password name="password_confirmation" id="input-password-confirmation"
                                placeholder="***************" />
                            @error('password_confirmation', 'updatePassword')
                                <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                            @enderror
                        </div>

                        <x-buttons.submit>{{ __('Update') }}</x-buttons.submit>
                    </form>
                </div>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    {{ __('Two Factor Authentication') }}
                </h4>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="block text-md text-gray-700 dark:text-gray-400">
                        {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                    </div>
                    @if (auth()->user()->two_factor_secret)
                        <div class="mt-2">
                            {!! request()->user()->twoFactorQrCodeSvg() !!}
                        </div>
                        <form action="{{ route('two-factor.disable') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-buttons.submit>{{ __('Disable') }}</x-buttons.submit>
                        </form>
                    @else
                        <form action="{{ route('two-factor.enable') }}" method="post">
                            @csrf
                            <x-buttons.submit>{{ __('Enable') }}</x-buttons.submit>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
