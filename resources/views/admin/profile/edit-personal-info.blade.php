<form class="app-form" method="POST" action="{{ route("admin.profile.editPersonalInfo") }}">
    @csrf
    <div class="mb-3">
        <h5>Personal Info</h5>
        <p class="f-s-12 text-secondary">Update your personal information.
        </p>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" autocomplete="off" readonly  value="{{auth()->user()->email}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" placeholder="">
    </div>
    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" rows="8" style="resize: none;" class="form-control" placeholder="">{{auth()->user()->bio}}</textarea>
    </div>
    <div>
        <button type="submit"
            class="btn btn-primary w-100">Update Personal Info</button>
    </div>
</form>