<x-dropdown>
    <!-- this is now the trigger, located in dropdown.blade.php --> 
    <x-slot name="trigger">  
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex ">
                <!-- will display to the button the current selected category, otherwise, it will display the default value Category -->
                {{ isset($currentCategory)? ucwords($currentCategory->name) : 'Categories'}}
                <!-- this is for the select button -->
                <!-- the absolute pointer is unique to this section that is why it is not belong to the down-arrow.blade.php -->
                <x-icon name="down-arrow" class ="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>
    <!-- LINKS -->
    <!-- if All is clicked then go to home -->
    <!-- will ask do I need to do this again and again -->
    <x-dropdown-item href="/?" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach ($categories as $category) 
        <!-- {{isset($currentCategory)&& $currentCategory->is($category)? 'bg-blue-500 text-white' : ''}}" > -->
        <!-- if there is a req in category but then you switched to search, then category should be ignored now -->
        <!-- exclude the page -->
        <x-dropdown-item 
            href="/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}"
            :active='request()->is("categories/{$category->slug}")'> {{ucwords ($category->name)}} </x-dropdown-item>
        
    @endforeach
</x-dropdown>
