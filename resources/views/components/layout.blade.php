<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- css for subscribe transition --}}
<style>
    html{
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                {{-- if guest or already signed in then the user will not be able to run the register link   --}}
                {{-- if auth then a message, welcome back else will have a register button --}}
                @auth
                    <x-dropdown>
                        {{-- the button will be triggered once clicked --}}
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">Welcome Back, {{auth()->user()->name}}!</button>
                        </x-slot>

                        @admin
                            <x-dropdown-item href="admin/posts" :active="request()->is('admin/posts')">
                                Dashboard
                            </x-dropdown-item>
                      
                            {{-- will highlight when the request is adminpostscreate --}}
                            <x-dropdown-item href="admin/posts/create" :active="request()->is('admin/posts/create')">
                                New Post
                            </x-dropdown-item>
                        @endadmin
                        {{-- call the log out by click.prevent --}}
                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#log-out-form').submit()">
                            Log Out
                        </x-dropdown-item>
                    </x-dropdown>
                    
                    {{-- this is for the logout method --}}
                    <form id="log-out-form" method="POST"action="/logout" class="hidden">
                        @csrf
                    </form>
                    @else
                        <a href="/register" class="text-xs font-bold uppercase">Register</a>
                        <a href="/login" class="text-xs font-bold uppercase ml-6">Log In</a>
                @endauth
                {{-- will redirect to footer with an id of newsletter --}}
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{$slot}}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    {{-- a method for api --}}
                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email" 
                                name="email"
                                type="text" 
                                placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    {{-- this is for the flash message when the user successfully created account --}}
    <x-flash />
    
</body>
