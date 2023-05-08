{{-- set default value of type to text but if it is override to connected frontend like create.blade.php then it will also be possible --}}
@props(['name'])
{{-- the name now will be pass in create.blade.php or to any frontend that it will be connected --}}
{{-- this is for title --}}
<x-form.field>

    {{-- this is for the label from label.blade.php --}}
    <x-form.label name="{{$name}}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
        name="{{$name}}"
        id="{{$name}}"
        {{-- get the value if there is a value --}}
        {{$attributes (['value'=>old($name)]) }}>
    
    {{-- this is for the error from error.blade.php the name will be coming depending on the connected file --}}
    <x-form.error name="{{$name}}"/>

</x-form.field>