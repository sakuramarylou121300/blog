 @props(['comment'])
 {{-- space-x-4 is to adjust the position of the image --}}
 {{-- you can add additional style in the component panel --}}
 <x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        {{-- this is for the avatar --}}
        <div class="flex-shrink-0">
            {{-- the id comment id so that the avatar will be random --}}
            <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="" width="60" height="60" class =rounded-xl>
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{$comment->author->username}}</h3>
                <p class="text-xs">Posted 
                    {{-- time format for data and time --}}
                    <time>{{$comment->created_at->format('F j, Y, g:i a')}}</time>
                </p>
            </header>
            <p>
                {{$comment->body}}
            </p>
        </div>
    </article>
</x-panel>