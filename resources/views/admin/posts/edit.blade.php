<x-layout>
    {{-- edit post and display the title --}}
    <x-setting :heading="'Edit Post: '.$post->title">
            {{-- if the form has upload photo --}}
            <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- to get the component in component/form directory --}}
                {{-- this is for the title --}}
                {{-- either you have entered title or the title stored in the database --}}
                <x-form.input name="title" :value="old('title',$post->title)"/>

                {{-- this is for the slug --}}
                 <x-form.input name="slug"  :value="old('slug',$post->slug)"/>

                <div class="flex mt-6">
                     {{-- this is for the thumbnail then override the type from input to file, type now will be pass in props so that the type will be dynamic --}}
                    <div class="flex-1">
                     <x-form.input name="thumbnail" type="file"  :value="old('thumbnail',$post->thumbnail)"/>
                    </div>
                        {{-- display the old thumbna --}}
                    <img src="{{asset('storage/'. $post->thumbnail)}}" alt="" class="rounded-xl ml-6" width="100">
                </div>

                {{-- this is for the excerpt --}}
                <x-form.textarea name="excerpt">{{old('excerpt',$post->excerpt)}}</x-form.textarea>

                {{-- this is for the body --}}
                <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>

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
                                    {{old('category_id', $post->category_id)==$category->id? 'selected':''}}>
                                    {{(ucwords($category->name))}}</option>
                            @endforeach
                           
                        </select>
                    </x-form.field name="category">
                </x-form.field>
                
                {{-- this is a submit button --}}
                <x-form.button>Update</x-form.button>

            </form>
        {{-- </x-panel> --}}
    {{-- </section> --}}
    </x-setting>
</x-layout>