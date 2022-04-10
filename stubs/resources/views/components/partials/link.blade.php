<a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
    @isset($href) href="{{ $href }}" @endisset>
    @isset($name)
        {{ $name }}
    @endisset
</a>
