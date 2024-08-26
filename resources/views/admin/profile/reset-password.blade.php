<form class="app-form" method="POST" action="{{ route('admin.profile.reset-password') }}">
    @csrf
    <div class="mb-3">
        <h5>Reset Password</h5>
        <p class="f-s-12 text-secondary">Your new password must be different
            from previous used password
        </p>
    </div>
    <div class="mb-3">
        <label class="form-label">Current password</label>
        <input type="password" name="current_password" class="form-control" placeholder="">
        @error('current_password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">New password</label>
        <input type="password" name="new_password" class="form-control" placeholder="">
        @error('new_password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="new_password_confirmation" class="form-control" placeholder="">
        @error('new_password_confirmation')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div>
        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
    </div>
</form>