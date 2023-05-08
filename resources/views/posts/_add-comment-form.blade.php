{{-- to display only when signed in --}}
@auth
{{-- post comments --}}
<x-panel>
    {{-- the action is connected to the web.php --}}
    <form method="POST" action="/posts/{{$post->slug}}/comments">
        @csrf
        <header class="flex items-center">
            {{-- the auth() meaning to get the avatar of the current user --}}
            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="40" height="40" class=rounded-full>
            <h2 class="ml-4">Want to participate?</h2>
        </header>

        {{-- post comments --}}
        <div class="mt-6">
            <textarea name="body" 
                rows="5" 
                class="w-full text-sm focus:outline-none focus:ring" 
                placeholder="Quick of something to say!"
                required >
            </textarea>
            {{-- there is the validation for this, and if not satisfied then display the validation error    --}}
            @error('body')
                <span class="text-red-500 text-xs">{{$message}}</span>
            @enderror
        </div>

        {{-- button to post the comment location:submit-button.blade.php --}}
        {{-- the Post text now is the slot from submit-button.blade.php --}}
        <x-form.button>Post</x-form.button>
        
    </form>
</x-panel>
{{-- else if not log in for comments --}}
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline hover:text-blue-500">Register</a> or <a href="/login" class="hover:underline  hover:text-blue-500">Log in</a> to leave a comment
    </p>
@endauth