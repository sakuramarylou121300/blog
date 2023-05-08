@props(['trigger'])

<!-- javascript, if category is selected then it will go to the category -->
<!-- x data with the use of cdn from layout.blade.js -->
<!-- if click away then do not show drop down -->
<div x-data="{ show: false }" @click.away="show=false" class="relative">
    <!-- this is onclick then display div x-show="show" -->
    <!-- this is the trigger -->
    <div @click="show = ! show">
        
        {{$trigger}}

    </div>

    <!-- this is the dropdown links -->
    <div x-show="show" class ="py-2 absolute bg-gray-100 mt-2 rounded-xl text-left w-full z-50 overflow-auto max-h-52" style="display:none">
        <!-- this is the link located in _post-header -->
        {{$slot}}
    </div>

</div>
