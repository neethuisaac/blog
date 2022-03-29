@props(['comment'])
<article class="flex bg-gray-100 border rounded-xl border-gray-200 p-5">
    <div class="flex-shrink-0">
        <img class="rounded-xl" src="https://i.pravatar.cc/?u={{ $comment->author->id }}" alt="thumbnail" width=60 height=60>
    </div>
    <div class="ml-5">
        <header>
            <h1 class="font-bold">{{ $comment->author->name }}</h1>
            <p>
                <time class="text-xs">Posted {{ $comment->created_at->format('d M Y g:i:s a') }}</time>
            </p>
        </header>
        <p>{{ $comment->body }}</p>
    </div>
</article>
