<x-layouts.guest>
    <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('img/office.jpeg') }}" alt="Office" />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                {{ __('Email Verification') }}
            </h1>

            @if (session('status') == 'verification-link-sent')
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                    class="flex items-center p-4 mb-8 text-sm font-semibold text-white bg-green-500 focus:shadow-outline-green rounded-lg shadow-md focus:outline-none">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="block text-sm text-gray-700 dark:text-gray-400">
                {{ __("Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.") }}
            </div>

            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                <x-buttons.submit class="w-full bg-purple-600 active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple">{{ __('Resend Verification Email') }}</x-buttons.submit>
            </form>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <x-buttons.submit class="w-full bg-purple-600 active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple">{{ __('Log Out') }}</x-buttons.submit>
            </form>
        </div>
    </div>
</x-layouts.guest>
