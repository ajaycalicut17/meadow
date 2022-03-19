<input type="text" @isset($name) name="{{ $name }}" @endisset
    @isset($id) id="{{ $id }}" @endisset
    @error($name) class="block w-full mt-1 text-sm rounded-md shadow-sm border-red-600 dark:border-gray-600 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red dark:text-gray-300 dark:focus:shadow-outline-gray form-input" @enderror
    class="block w-full mt-1 text-sm rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
    value="{{ old($name) }}" @isset($placeholder) placeholder="{{ $placeholder }}" @endisset>
