<x-layout>
    <section class="py-6 px-8">
        <main class="max-w-lg mx-auto mt-6 lg:mt-20 space-y-6 rounded-xl bg-gray-200 border border-gray-300 p-6">
            <h1 class="font-bold text-center text-xl">New post</h1>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label class="uppercase block text-xs mb-2" for="title">
                        Title
                    </label>
                    <input type="text" class="border border-gray-200 p-2 w-full" name='title' value="{{ old('title') }}">
                    @error('title')
                    <p class='text-red-500 text-xs mb-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="uppercase block text-xs mb-2" for="excerpt">
                        Excerpt
                    </label>
                    <input type="text" class="border border-gray-200 p-2 w-full" name='excerpt' value="{{ old('excerpt') }}">
                    @error('excerpt')
                    <p class='text-red-500 text-xs mb-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="uppercase block text-xs mb-2" for="slug">
                        Slug
                    </label>
                    <input type="text" class="border border-gray-200 p-2 w-full" name='slug' value="{{ old('slug') }}">
                    @error('slug')
                    <p class='text-red-500 text-xs mb-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="uppercase block text-xs mb-2" for="thumbnail">
                        thumbnail
                    </label>
                    <input type="file" class="border border-gray-200 p-2 w-full" name='thumbnail' >
                    @error('thumbnail')
                    <p class='text-red-500 text-xs mb-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="uppercase block text-xs mb-2" for="slug">
                        Category
                    </label>
                    <select class="border border-gray-200 p-2 w-full" name='category_id'>
                        @foreach ($categories as $category){

                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>

                        @endforeach
                    </select>
                    @error('category')
                    <p class='text-red-500 text-xs mb-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="uppercase block text-xs mb-2" for="slug">
                        Body
                    </label>
                    <textarea class="border border-gray-200 p-2 w-full" name='body'>{{ old('body') }}</textarea>
                    @error('body')
                    <p class='text-red-500 text-xs mb-2'>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <input type="submit" class="border border-gray-200 py-2 px-8 bg-blue-500 text-white rounded-xl" name='submit' value='Submit'>
                </div>
            </form>
        </main>
    </section>
</x-layout>
