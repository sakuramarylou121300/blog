{{-- this is for the sign up of the user, if only in controller nothing will happen that is why we need to code it here --}}
{{-- the x-data is setting a timeout for the your account successfully created, will disappear in 4s --}}
@if(session()->has('sucess'))
    <div x-data="{show:true}"
        x-init="setTimeout(()=> show=false, 4000)"
        x-show="show"
        class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p>{{session('sucess')}}</p>
    </div>
@endif