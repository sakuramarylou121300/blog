<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">

            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In</h1>

                <form method="POST" action="/login" class="mt-10">
                    {{-- whithout csrf then it will bring an error, expired --}}
                    @csrf
                    {{-- this is for the email --}}
                    <x-form.input name="email" type="email" autocomplete="username"/>
    
                    {{-- this is for the password --}}
                    <x-form.input name="password" type="password" autocomplete="new-password"/>
            
    
                    {{-- this is for the submit button --}}
                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
           
        </main>
    </section>
</x-layout>