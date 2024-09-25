<x-guest-layout>

    @section('title', 'LiveBlade | Login')
    @section('cover-image')
        <img src="{{ asset('admin-panel/assets/images/login-images/register-cover.svg') }}" class="img-fluid auth-img-cover-login" width="550" alt="" style="display: block; margin: 0 auto;"/>
    @endsection
    <div class="text-center mb-4">
        <h5 class="">Rocker Admin</h5>
        <p class="mb-0">Please fill the below details to create your account</p>
    </div>
    <div class="form-body">
        <form method="POST" action="{{ route('register') }}" class="row g-3">
            @csrf
            <div class="col-12">
                <label for="inputUsername" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Jhon" :value="old('name')" required autofocus autocomplete="name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <label for="inputEmailAddress" class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="jhon@example.com" :value="old('email')" class="form-control" required autofocus autocomplete="username">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" name="password" id="password" class="form-control border-end-0" placeholder="Enter Password" :value="old('email')" required autocomplete="current-password"> 
                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                </div>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border-end-0" placeholder="Enter Password" :value="old('email')" required autocomplete="current-password"> 
                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                </div>
                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                </div>
            </div>
            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
            <div class="col-md-12 text-end">	
                <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
            </div>
        </form>
    </div>
    <div class="login-separater text-center mb-5"> <span>OR SIGN IN WITH</span>
        <hr>
    </div>
    
</x-guest-layout>
