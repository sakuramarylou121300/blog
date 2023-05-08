@props(['posts'])
<!-- it will load the first post, this is the featured -->
<!-- featured is basically the first post -->
<x-post-featured-card :post="$posts[0]"/>
 

@if($posts->count()>1)
    <div class="lg:grid lg:grid-cols-6">
        <!-- skip the first post because it is declared above, which is the featured -->
        @foreach($posts->skip(1) as $post)
        <!-- import from post-card.blade.php -->  
        <x-post-card 
            :post="$post" 
            class="{{$loop->iteration <3? 'col-span-3': 'col-span-2'}}   "/>
        @endforeach
    </div>
@endif