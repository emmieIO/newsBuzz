<x-admin>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Create New Category</h5>
            </div>
            <div class="card-body">
                <form class=" g-3" action="{{ route('admin.categories.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-md-12 mb-3">
                        <label for="category-name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" value="{{ old('name') }}"
                            @error('name') is-invalid @enderror" name="name" id="category-name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="slug" class="form-label">Category Slug</label>
                        <input type="text" class="form-control" value="{{ old('slug') }}"
                            @error('slug') is-invalid @enderror" name="slug" id="slug">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Category Description</label>
                        <textarea type="text" row="8" value="{{ old('description') }}" name="description"
                            class="form-control resize-none @error('description') is-invalid @enderror" style="resize:none" id="description">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        <div class="input-group">
                            <input type="file" name="image"
                                class="form-control @error('image') is-invalid @enderror" id="image"
                                aria-describedby="image">
                        </div>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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
