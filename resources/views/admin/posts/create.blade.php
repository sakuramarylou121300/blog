<x-layout>
    <x-setting heading="Publish New Post">
    {{-- <section class="py-8 max-w-md mx-auto"> --}}
        {{-- this is the header --}}
        {{-- <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1> --}}
        {{-- <x-panel> --}}
            {{-- if the form has upload photo --}}
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                {{-- to get the component in component/form directory --}}
                {{-- this is for the title --}}
                <x-form.input name="title"/>

                {{-- this is for the slug --}}
                 <x-form.input name="slug"/>

                {{-- this is for the thumbnail then override the type from input to file, type now will be pass in props so that the type will be dynamic --}}
                <x-form.input name="thumbnail" type="file"/>

                {{-- this is for the excerpt --}}
                <x-form.textarea name="excerpt"/>

                {{-- this is for the body --}}
                <x-form.textarea name="body"/>

                {{-- this is for the category, the div class is dependent on the form directory-field.blade.php --}}
                <x-form.field>
                    {{-- the label is dependent on the label component --}}
                    {{-- the name is category, it is different on the other because it is declared here unline with the other which are dependent on the other file --}}
                    {{-- this has to end here because the design is only needed heres --}}
                    <x-form.label name="category"/>
                        <select name="category_id" id="category_id">
    
                            {{-- apply the loaded category in the frontend --}}
                            {{-- ucwords for capitalization --}}
                            {{-- to remember the old category --}}
                            {{-- if equal to the current id, then add the selected attributes in that case --}}
                            @foreach (\App\Models\Category::all() as $category)
                                <option 
                                    value="{{$category->id}}" 
                                    {{old('category_id')==$category->id? 'selected':''}}>
                                    {{(ucwords($category->name))}}</option>
                            @endforeach
                           
                        </select>
                    </x-form.field name="category">
                </x-form.field>
                
                {{-- this is a submit button --}}
                <x-form.button>Publish</x-form.button>

            </form>
        {{-- </x-panel> --}}
    {{-- </section> --}}
    </x-setting>
</x-layout>