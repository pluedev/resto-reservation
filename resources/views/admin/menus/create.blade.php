<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" 
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu Index</a>
            </div>
            <div class="m-2 p-2 bg-slate-100 rounded">       
                <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="@error('name') border-red-400 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter a name">
                        @error('name')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="large_size">Image</label>
                        <input name="image" class="@error('image') border-red-400 @enderror block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size" type="file">
                        @error('image')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">       
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input name="price" type="number" min="0.00" max="10000.00" step="0.01" name="price" id="price" class="@error('price') border-red-400 @enderror block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size">
                        @error('price')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">       
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea name="description" id="message" rows="4" class="@error('description') border-red-400 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                        @error('description')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">       
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
                        <select name="category" id="category" class="form-multiselect block w-full mt-1 @error('category') border-red-400 @enderror" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </select>
                        @error('category')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Store</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
