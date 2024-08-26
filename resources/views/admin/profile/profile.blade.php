<x-admin>
    <!-- Profile -->
    <div class="row">
        <div class="">
            <div class="card col-lg-12">
                <div class="card-body">
                    <div class="profile-container">
                        <div class="image-details">
                            <div class="profile-image"></div>
                            <div class="profile-pic">
                                <div class="avatar-upload">
                                    <div class="avatar-preview">
                                        <img src="{{asset('images/profile_pictures/'.auth()->user()->img)}}" alt="user-dp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="person-details">
                            <h5 class="f-w-600">{{ auth()->user()->name }}
                                <img width="20" height="20"
                                    src="{{ asset('dist/adminx/images/profile/01.png') }}"
                                    alt="instagram-check-mark">
                            </h5>
                            <p>{{ auth()->user()->role }}</p>
                            <p>{{ auth()->user()->email }}</p>
                            <div class="details">
                                <div>
                                    <h4 class="text-primary">{{ auth()->user()->posts->count() }}</h4>
                                    <p class="text-secondary">Posts</p>
                                </div>
                                <div>
                                    <h4 class="text-primary">
                                        {{ auth()->user()->isFollowedBy(auth()->user()) }}</h4>
                                    <p class="text-secondary">Following</p>
                                </div>
                                <div>
                                    <h4 class="text-primary">
                                        {{ auth()->user()->isFollowing(auth()->user()) }}</h4>
                                    <p class="text-secondary">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xxl-3">
            <div class="card">
                <div class="card-header">
                    <h5>Update Profile</h5>
                </div>
                <div class="card-body">
                    <div class="row gap-3">
                        <div class="col-lg-6 ">
                          @include('admin.profile.edit-personal-info')
                        </div>
                        <div class="col-lg-6 row gap-3">
                            @include("admin.profile.reset-password")
                            @include("admin.profile.update-profile-picture")
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</x-admin>
