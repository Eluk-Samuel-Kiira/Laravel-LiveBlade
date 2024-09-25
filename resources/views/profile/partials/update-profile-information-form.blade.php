<section>
    <form id="updateProfileForm">
        @csrf
        @method('patch')
        <div id="status"></div>
        <span>{{ $user->name }}</span>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required />
            </div><div id="name"></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}" />
            </div><div id="email"></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" value="(239) 816-9029" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Mobile</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" value="(320) 380-4539" />
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="text" class="form-control" value="Bay Area, San Francisco, CA" />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 text-secondary">
                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
            </div>
        </div>
    </form>
    @include('layouts.liveblade-imports')
    <script>
        // Laravel routes and form handling to be pass to js
        window.routes = {
            'profile.update': "{{ route('profile.update') }}",
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
        handleFormSubmit('updateProfileForm', 'profile.update', 'PATCH');
        // handleFormSubmit('registerForm', 'register', 'POST');
    </script>

    {{-- <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form> --}}
</section>
