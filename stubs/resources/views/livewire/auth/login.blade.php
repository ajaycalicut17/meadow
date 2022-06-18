<div>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="block text-sm">
            <x-forms.label for="input-email">{{ __('Email') }}</x-forms.label>
            <x-inputs.text name="email" id="input-email" placeholder="{{ __('Email') }}" />
            <x-forms.error name="email" />
        </div>
        <div class="block mt-4 text-sm">
            <x-forms.label for="input-password">{{ __('Password') }}</x-forms.label>
            <x-inputs.password name="password" id="input-password" placeholder="***************" />
            <x-forms.error name="password" />
        </div>

        <x-buttons.submit
            class="w-full bg-purple-600 active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple">
            {{ __('Log in') }}</x-buttons.submit>
    </form>
</div>
