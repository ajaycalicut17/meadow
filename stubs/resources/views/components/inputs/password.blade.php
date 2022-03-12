<input type="password" @isset($name) name="{{ $name }}" @endisset
    @isset($id) id="{{ $id }}" @endisset
    class="block w-full mt-1 text-sm rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
    @isset($placeholder) placeholder="{{ $placeholder }}" @endisset>