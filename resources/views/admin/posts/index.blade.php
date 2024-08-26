<x-admin>
    <div class="row">
        <div class="col-lg-12 visitors">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Posts</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="app-scroll table-responsive">
                        <table class="table table-striped table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">ID</th>
                                    <th scope="col" class="text-nowrap">Title</th>
                                    <th scope="col" class="text-nowrap">Slug</th>
                                    <th scope="col" class="text-nowrap">Content</th>
                                    <th scope="col" class="text-nowrap">Thumbnail</th>
                                    <th scope="col" class="text-nowrap">Category</th>
                                    <th scope="col" class="text-nowrap">Author</th>
                                    <th scope="col" class="text-nowrap">Publish Date</th>
                                    <th scope="col" class="text-nowrap">Edit</th>
                                    <th scope="col" class="text-nowrap">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($posts))
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->slug }}</td>
                                            <td>{{ Str::limit($post->content, 50) }}</td>
                                            <td>
                                                <img src="{{ asset('images/posts/' . $post->image) }}" alt=""
                                                    class="img-fluid post-image"
                                                    style="max-width: 40px; max-height: 40px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
                                            </td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->published_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="ti ti-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" id="delete-btn-{{ $post->id }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="ti ti-trash"></i> Delete
                                                    </button>
                                                </form>
                                                @push('scripts')
                                                    <script>
                                                        $('#delete-btn-{{ $post->id }}').on('click', function() {
                                                            Swal.fire({
                                                                title: "Are you sure you want to delete post ?",
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
                                                                        'Post has been deleted',
                                                                        'success'
                                                                    )
                                                                    // Submit the form to delete the post
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
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin>
