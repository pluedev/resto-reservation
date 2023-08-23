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
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.menus.update', $menu->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="name" value="{{ $menu->name }}"
                            class="@error('name') border-red-400 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter a name">
                        @error('name')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>
                        <div>
                            <img class="w-32 h-32" src="{{ Storage::url($menu->image) }}" alt="">
                        </div>
                        <input id="image" type="file" name="image"
                            class="@error('image') border-red-400 @enderror block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        @error('image')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">       
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" id="name" name="price" value="{{ $menu->price }}"
                        class="@error('price') border-red-400 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('price')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">       
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="4" 
                            class="@error('description') border-red-400 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">
                        {{ $menu->description }}
                        </textarea>
                        @error('description')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-6">       
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categories</label>
                        <select name="category" id="category" class="@error('category') border-red-400 @enderror form-multiselect block w-full mt-1" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>{{ $category->name }}</option>
                                @endforeach
                        </select>
                        @error('category')
                            <div class="text-sm text-red-400">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
