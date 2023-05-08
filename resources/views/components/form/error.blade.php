{{-- to be use in validating, form views/components/form --}}
@props(['name'])

@error($name)
    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
@enderror