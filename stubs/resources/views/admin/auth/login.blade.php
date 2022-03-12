<x-layouts.guest>
  <div class="h-32 md:h-auto md:w-1/2">
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('img/login-office.jpeg') }}" alt="Office" />
    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{ asset('img/login-office-dark.jpeg') }}" alt="Office" />
  </div>
  <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
    <div class="w-full">
      <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __('Login') }}
      </h1>
      <div class="block text-sm">
        <x-forms.label name="{{ __('Email') }}" for="email"/>
        <x-inputs.text name="email" placeholder="{{ __('Email') }}"/>
      </div>
      <div class="block mt-4 text-sm">
        <x-forms.label name="{{ __('Password') }}" for="password"/>
        <x-inputs.password name="password" placeholder="***************"/>
      </div>
      
      <a class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="../index.html">
        {{ __('Log in') }}
      </a>

      <hr class="my-8" />

      <p class="mt-4">
        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('register') }}">
          {{ __('Forgot your password?') }}
        </a>
      </p>
      <p class="mt-1">
        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('password.request') }}">
          {{ __('Create account') }}
        </a>
      </p>
    </div>
  </div>
</x-layouts.guest>