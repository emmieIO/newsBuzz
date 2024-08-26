<x-admin>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Create New Category</h5>
            </div>
            <div class="card-body">
                <form class=" g-3" action="{{ route('admin.categories.update', $category) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="col-md-12 mb-3">
                        <label for="category-name" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $category->name) }}" name="name" id="category-name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="slug" class="form-label">Category Slug</label>
                        <input type="text" class="form-control" value="{{$category->slug}}"
                            @error('slug') is-invalid @enderror" name="slug" id="slug">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Category Description</label>
                        <textarea type="text" rows="8" style="resize: none;"
                            class="form-control resize-none @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="h-50 w-50 d-flex-center b-r-50 overflow-hidden text-bg-secondary b-2-light mt-3">
                            <img src="{{ asset("images/categories/$category->image") }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button class="btn btn-primary" type="submit">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const categoryNameInput = document.getElementById('category-name');
            const slugInput = document.getElementById('slug');

            categoryNameInput.addEventListener('input', (e) => {
                const categoryName = e.target.value;
                const slug = categoryName.toLowerCase().replace(/ /g, '_');
                slugInput.value = slug;
                console.log(slugInput.value);
            });
        </script>
    @endpush
</x-admin>
