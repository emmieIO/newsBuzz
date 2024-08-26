<x-admin>
    <div class="row project_dashboard">
        <!-- Cards -->
        <div class="col-md-6 col-lg-3">
            <div class="card project-cards">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="text-primary">Active Users<span class="badge badge-success text-md text-primary">{{$usersCount}}</span></h5>
                    </div>
                    <div class="project-card-icon project-success text-success h-55 w-55 d-flex-center b-r-100">
                        <i class="ti ti-users f-s-30 mb-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card project-cards">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="text-primary">Blocked Users<span class="badge badge-success text-md text-primary">{{$blockedusersCount}}</span></h5>
                    </div>
                    <div class="project-card-icon project-secondary text-danger h-55 w-55 d-flex-center b-r-100">
                        <i class="ti ti-ban f-s-30 mb-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card project-cards">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="text-primary">Total Posts<span class="badge text-primary">{{$postCount}}</span></h5>
                    </div>
                    <div class="project-card-icon project-danger text-danger h-55 w-55 d-flex-center b-r-100">
                        <i class="ti ti-news f-s-30 mb-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card project-cards">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="text-primary">Total categories<span class="badge text-primary">{{$categoryCount}}</span></h5>
                    </div>
                    <div class="project-card-icon project-primary text-primary h-55 w-55 d-flex-center b-r-100">
                        <i class="ti ti-filter f-s-36 mb-1"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cards end -->




    </div>
</x-admin>
