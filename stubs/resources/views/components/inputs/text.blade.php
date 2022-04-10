<input type="text"
    {{ $attributes->class(['block w-full mt-1 text-sm rounded-md shadow-sm dark:text-gray-300 dark:focus:shadow-outline-gray form-input','border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' => !$errors->has($name),'border-red-600 dark:border-gray-600 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red' => $errors->has($name)]) }}
    value="{{ isset($value) ? $value : old($name) }}">
