<section>
    <form id="updatePasswordForm">
        @csrf
        @method('PUT')
        <div id="status"></div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Password</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="password" id="update_password_current_password" name="current_password" class="form-control" required />
                <div id="current_password"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">New Password</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="password" id="update_password_password" name="password" class="form-control" required />
                <div id="password"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3">
                <h6 class="mb-0">Confirm Password</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control" required />
                <div id="password_confirmation"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 text-secondary">
                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
            </div>
        </div>
    </form>
    

    {{--
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    --}}
</section>
