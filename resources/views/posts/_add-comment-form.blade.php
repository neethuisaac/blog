@auth
<form method="POST" action="/posts/{{ $post->slug }}/comments/" class="bg-gray-100 border rounded-xl border-gray-200 p-5">
    @csrf
    <header class="flex items-center">
        <img src="https://i.pravatar.cc/?u={{ auth()->id() }}" width="40" height="40" class="rounded-full">
        <h2 class="ml-4">Want to participate?</h2>
    </header>
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="mt-4">
        <textarea class="w-full" cols=60 rows="4" name="body" placeholder="Write something" required></textarea>
        @error('body')
        <span class='text-red-500 text-xs'>{{ $message }}</span>
        @enderror
        <x-primary-button>POST</x-submit-button>
    </div>
</form>
    @else
    <p class='font-semibold'>
        <a href="/login" class="hover:underline">Log In</a>
        or
        <a href="/register" class="hover:underline">Register</a>
        to leave a comment.
    </p>
@endauth
