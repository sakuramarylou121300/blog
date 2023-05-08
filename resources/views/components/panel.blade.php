{{-- with the use of attributes you can add additional style when this is imported --}}
<div {{$attributes->merge(['class'=>'p-6 border border-gray-200 rounded-xl'])}}>
    {{$slot}}
</div>