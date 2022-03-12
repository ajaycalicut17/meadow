<label @isset($for) for="{{ 'input-text-' . $for }}" @endisset
    class="text-gray-700 dark:text-gray-400">
    @isset($name)
        {{ $name }}
    @endisset
</label>
