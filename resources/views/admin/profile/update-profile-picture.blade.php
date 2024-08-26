<form class="app-form mt-4" method="POST" action="{{ route('admin.update-profile-picture') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <h5>Profile Image Update</h5>
        <p class="f-s-12 text-secondary">Update profile image
        </p>
    </div>
    <div class="mb-3">
        <input type="file" name="profile_picture" class="form-control" placeholder="">
    </div>
    <div>
        <button type="submit" class="btn btn-primary w-100">Upload Image</button>
    </div>
</form>