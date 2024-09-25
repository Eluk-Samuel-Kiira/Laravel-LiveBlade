<x-guest-layout>
    @section('title', 'LiveBlade | Login')
    <div id="content"></div>
    @section('cover-image')
        <img src="{{ asset('admin-panel/assets/images/login-images/login-cover.svg') }}" class="img-fluid auth-img-cover-login" width="650" alt="" style="display: block; margin: 0 auto;"/>
    @endsection
    <div class="text-center mb-4">
        <h5 class="">Rocker Admin</h5>
        <p class="mb-0">Please log in to your account</p>
    </div>
    <div class="form-body">
        <!-- <form method="POST" action="{{ route('login') }}" id="loginForm" class="row g-3"> -->
        <form id="loginForm" class="row g-3">
            @csrf
            <div class="col-12">
                <label for="inputEmailAddress" class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="jhon@example.com" :value="old('email')" class="form-control" autofocus autocomplete="username">
                <!-- @error('email') <span class="text-danger">{{ $message }}</span> @enderror -->
                <div id="email"></div>
            </div>
            <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" name="password" id="passwords" class="form-control border-end-0" placeholder="Enter Password" :value="old('email')" autocomplete="current-password"> 
                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                </div>
                <!-- @error('password') <span class="text-danger">{{ $message }}</span> @enderror -->
                <br>
                <div id="password"></div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                </div>
            </div>
            <div class="col-md-6 text-end">	
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif
            </div>
            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>
    </div>
    <div class="login-separater text-center mb-5"> <span>OR SIGN IN WITH</span>
        <hr>
    </div>
    

    @include('layouts.liveblade-imports')
    <script>
        // Laravel routes and form handling to be pass to js
        window.routes = {
            login: "{{ route('login') }}",
            register: "{{ route('register') }}",
            dashboard: "{{ route('dashboard') }}"
        };

        const handleFormSubmit = (formId, routeName, method) => {
            document.getElementById(formId).addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = Object.fromEntries(new FormData(this));
                formData._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                // You can as well perform validations here
                
                LiveBlade.load(routeName, method, formData, `#${formId}`);
            });
        };

        // Example usage for multiple forms, pass form id with route name
        handleFormSubmit('loginForm', 'login', 'POST');
        // handleFormSubmit('registerForm', 'register', 'POST');
    </script>




    {{--
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    --}}
</x-guest-layout>
