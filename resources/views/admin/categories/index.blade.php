<x-admin>
    <div class="row">
        <div class="col-lg-12 visitors">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-0">Categories</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="app-scroll table-responsive">
                        <table class="table table-striped table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th class="col" scope="col">ID</th>
                                    <th class="col" scope="col">Name</th>
                                    <th>Category Image</th>
                                    <th class="col" scope="col">Edit</th>
                                    <th class="col" scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($categories))
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="text-center">
                                                {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                            </td>
                                            <td>
                                                <p class="f-w-500 text-start mb-0">
                                                    {{ $category->name }}</p>
                                            </td>
                                            <td>
                                                <ul class="justify-content-start">
                                                    <li class="h-60 w-60 d-flex-center overflow-hidden">
                                                        <img src="{{ asset("images/categories/$category->image") }}"
                                                            alt="" class="img-fluid">
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                    class="btn btn-success text-center btn-xs">
                                                    <span>Edit</span>
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" id="delete-btn-{{ $category->id }}" class="d-flex align-items-center gap-2 btn btn-danger btn-xs">
                                                        <i class="ti ti-trash mr-1"> </i>
                                                        <span>Delete</span>
                                                    </button>
                                                </form>
                                                @push('scripts')
                                                    <script>
                                                        $('#delete-btn-{{ $category->id }}').on('click', function() {
                                                            Swal.fire({
                                                                title: "Are you sure you want to delete {{ $category->name }} ?",
                                                                text: "You won't be able to revert this!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Yes, delete it!'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    Swal.fire(
                                                                        'Deleted!',
                                                                        'Your file has been deleted',
                                                                        'success'
                                                                    )
                                                                    // Submit the form to delete the category
                                                                    $(this).closest('form').submit();
                                                                }
                                                            })
                                                        })
                                                    </script>
                                                @endpush
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer visitors-table-footer">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin>