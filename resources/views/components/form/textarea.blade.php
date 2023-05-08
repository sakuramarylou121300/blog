@props(['name'])

<x-form.field>
    {{-- this is for the lable, the name is dynamic, depending on the parent --}}
    <x-form.label name="{{$name}}"/>

    <textarea class="border border-gray-200 p-2 w-full rounded"
        name="{{$name}}"
        id="{{$name}}"
        required>
        {{$attributes}}
        {{$slot?? old($name)}}

    </textarea>
    
    {{-- the name will be coming depending on the connected file --}}
    <x-form.error name="{{$name}}"/>

</x-form.field>