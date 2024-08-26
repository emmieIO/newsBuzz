<x-admin>
    <div class="card col-lg-8">
        <div class="card-header">
            <h5>Create a new post</h5>
        </div>
        <div class="card-body">
            <form class="app-form" method="POST" action="{{ route("admin.posts.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Post title" name="title" id="title" value="{{ old('title') }}" oninput="generateSlug(this.value)" maxlength="255">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" value="{{ old('slug') }}" class="form-control @error('slug') is-invalid @enderror" placeholder="Auto-generated slug" name="slug" id="slug" maxlength="255">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea rows="12" style="resize: none" class="form-control @error('content') is-invalid @enderror" placeholder="What's on your mind ?" name="content" id="content">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="category" class="form-label">Select Category</label>
                        <select class="form-select @error('category') is-invalid @enderror"  name="category" id="category">
                            <option selected="">Select post category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="image" class="form-label">Post Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="post_image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Make post</button>
                </div>
            </form>
        </div>
    </div>
</x-admin>

<script>
    function generateSlug(title) {
        const slugInput = document.getElementById('slug');
        const slug = title.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]/g, '');
        slugInput.value = slug;
    }
</script>