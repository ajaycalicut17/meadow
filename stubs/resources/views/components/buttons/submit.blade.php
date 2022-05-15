<button type="submit"
    {{ $attributes->merge(['class' => 'block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none']) }}>
    {{ $slot }}
</button>
