@props (['posts'])

@if($posts->count())
    <x-postmaincard :post="$posts->first()"/>
    @if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
                        
            <x-postcard :post="$post" class="{{ $loop->iteration < 3 ? ' col-span-3 ': ' col-span-2 '}}"/>
         
        @endforeach
    </div>
    @endif
    @else 
        <p>No posts to show</p>
@endif
