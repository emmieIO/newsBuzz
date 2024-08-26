<x-admin>
    <div class="row">
        <div class="col-lg-12 visitors">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Users</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="app-scroll table-responsive">

                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th class="col" scope="col">ID</th>
                                    <th class="col" scope="col">Name</th>

                                    <th scope="col">Role</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                    <th>Posts Count</th>
                                    <th class="col" scope="col">Following</th>
                                    <th scope="col">Followers</th>
                                    <th class="col" scope="col">Edit</th>
                                    <th class="col" scope="col">Delete</th>
                                    <th class="col" scope="col">Block/Unblock User</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users))
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                            </td>
                                            <td>
                                                <p class="f-w-500 text-start mb-0">
                                                    {{ $user->name }}</p>
                                            </td>
                                            <td class="text-primary f-w-500">{{ $user->role }}</td>

                                            <td>
                                                <ul class="avatar-group justify-content-center">
                                                    <li
                                                        class="h-40 w-40 d-flex-center b-r-50 overflow-hidden text-bg-secondary b-2-light">
                                                        @if ($user->img)
                                                            <img src="{{ asset('images/profile_pictures/' . $user->img) }}"
                                                                alt="" class="img-fluid">
                                                        @else
                                                            <img src="{{ asset('dist/adminx/images/avtar/08.png') }}"
                                                                alt class="img-fluid">
                                                        @endif
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                @if($user->status == 'blocked')
                                                <span class="badge bg-light-danger">{{ $user->status }}</span>
                                                @elseif($user->status == 'active')
                                                <span class="badge bg-light-success">{{ $user->status }}</span>
                                                @endif
                                            </td>
                                            <td class="f-w-600">{{ $user->posts->count() }}</td>
                                            <td class="f-w-600">{{ $user->isFollowedBy($user) }}</td>
                                            <td class="f-w-600">{{ $user->isFollowing($user) }}</td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-success text-center btn-xs d-flex align-items-center gap-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit-user-{{ $user->id }}">
                                                    <i class="ti ti-edit"></i> <span>Update Role</span>
                                                </button>
                                            </td>
                                            <td>
                                                <form action="{{route("admin.users.destroy", $user)}}" id="delete-form-{{$user->id}}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="button"
                                                        id="delete-btn-{{$user->id}}"
                                                        class="btn btn-danger btn-xs d-flex align-items-center gap-2">
                                                        <i class="ti ti-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                @if ($user->status == 'active')
                                                <form action="{{route('admin.users.block', $user)}}" method="post">
                                                    @csrf
                                                    <button type="button" onclick="showID"
                                                    id="block-btn-{{ $user->id }}"
                                                    class="btn btn-danger btn-xs d-flex align-items-center gap-2">
                                                        <i class="ti ti-ban"></i>
                                                        <span>Block User</span>
                                                    </button>
                                                </form>
                                                    @else
                                                    <form action="{{route("admin.users.activate", $user)}}" method="post">
                                                        @csrf
                                                        <button type="button" onclick="showID"
                                                        id="activate-btn-{{ $user->id }}"
                                                        class="btn btn-success btn-xs d-flex align-items-center gap-2">
                                                            <i class="ti ti-check"></i>
                                                            <span>Activate User</span>
                                                        </button>
                                                    </form>
                                                    @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer visitors-table-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal -->
    @foreach ($users as $user)
        <div class="modal fade" id="edit-user-{{ $user->id }}" tabindex="-1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog app_modal_sm">
                <form action="{{ route('admin.users.update-role', $user->id) }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="exampleModal2">Update User Role</h1>
                            <button type="button" class="fs-5 border-0 bg-none  text-white" data-bs-dismiss="modal"
                                aria-label="Close"><i class="ti ti-x fs-3"></i></button>
                        </div>
                        <div class="modal-body">
                            <!-- Update User Form -->
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="role">Role:</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author
                                    </option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-light-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @push('scripts')
        <script>
            $('#delete-btn-{{$user->id}}').on('click', function() {
                Swal.fire({
                    title: "Are you sure you want to delete  {{ $user->name }} ?",
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            '{{$user->name}} has been deleted',
                            'success'
                        )
                        // Submit the form to delete the category
                        $(this).closest('form').submit();
                    }
                })
            })
            $('#block-btn-{{ $user->id }}').on('click', function() {
                Swal.fire({
                    title: "Are you sure you want to block  {{ $user->name }} ?",
                    text: "This user wont be able to sign in",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, block'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Account De-activated!',
                            "{{$user->name}}'s account has been blocked.",
                            'success'
                        )
                        // Submit the form to block the user
                        $(this).closest('form').submit();
                    }
                })
            })
            $('#activate-btn-{{ $user->id }}').on('click', function() {
                Swal.fire({
                    title: "Click 'Proceed' to activate {{ $user->name }}'s account ?",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Proceed'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Account De-activated!',
                            "{{$user->name}}'s account has been activated.",
                            'success'
                        )
                        // Submit the form to block the user
                        $(this).closest('form').submit();
                    }
                })
            })
        </script>
        @endpush
    @endforeach
</x-admin>
