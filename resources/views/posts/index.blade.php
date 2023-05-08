<x-layout> 
    <!-- from posts-header.blade.php --> 
    @include ('posts._header') 

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

         <!-- if there is a post then proceed to post-grid.blade.html, the :posts is connected to the props declared in the posts-grid.blade.php -->
         @if ($posts->count()) 
            
            <x-posts-grid :posts="$posts"/>
            
            <!-- this is pagination, links is default -->
            {{$posts->links()}}
                @else
                    <p class="text-center">No post yet. Please check back later.</p>
        <@endif>

    </main>


</x-layout>
