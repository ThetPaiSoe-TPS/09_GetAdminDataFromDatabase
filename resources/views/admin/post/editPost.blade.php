@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <h1 class="h3 mb-0" style="font-weight: bold; color: gray-800;">Edit Post</h1>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">Create Post</h3>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{route('admin#createPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Post Title" value="{{ $post->title, old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Enter Description">{{ $post->description, old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Post Image</label>
                            @if($post->image)
                                <div class="mb-2">
                                    <img id="postImagePreview" src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-thumbnail" width="150">
                                </div>
                            @else
                                <div class="mb-2">
                                    <img id="postImagePreview" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIALgAwwMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABQMEBgECB//EADMQAQABAwEECQQBAwUAAAAAAAABAgMEEQU0U3ISFBUhMVGRobEyM3HBQRNSYSIkQkWD/8QAFQEBAQAAAAAAAAAAAAAAAAAAAAL/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwD9hAUkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAS9rZlduqLNqej3a1THiqIO199nlgGKmxlVxFUUXZie/Xv73vVsvh3fSV3G3a1yR8PjJzLGPOlyrWr+2O+QRerZfDu+knVsvh3fSVextHHvVRTFU01T4RVGmrbBzvVsvh3fSTq2Xw7vpLogHO9Wy+Hd9JOrZfDu+kuiAc71bL4d30k6tl8O76S6IBzlNzJxLkazXRPjpV4Sv492L1mi5EadKNdPJK25961yy39mbja/E/Mg2gAAAAAAAAAAAEHa++zywvIO199nlgFe3V0MKiv+21E+zna6prqmqqdapnWZdJjxFWLbifCbcRPohZeJcxq5iaZmj/jVANZ0Wz7tV3Dt1Vd9XhM/hCsWLl+uKbdEz/n+IdFj2osWaLUd/Rjx8wZAfNy5TaomuudKY8ZAuXKbVE11zpTHjL5sXqL9uLludYn2Qs7Mqyq+7WLcfTT+5fGJk14tzpU98T9VPmDpBjsXqL9uLludYn2ZARtufetcst/Zm42vxPzLQ25961yy39mbja/E/Mg2gAAAAAAAAAAAEHa++zywvIO199nlgFnG3a1yR8MrFjbta5I+H3crpt0TXXMRTHjIFVVNumaqpimmP5nufTn8/Mqyq9I7rceFP7ln2dtD+lH9K/P+iPpq8gV7lym1RNdc6Ux4ygZ2ZVlV92sW4+mn9yZ2ZVlV92sW4+mn9y1QAAZ8TKrxbnSp76Z+qnzdBYvUX7cXLc6xPs5hQ2LVMZNVOs6TRrMA+tufetcst/Zm42vxPzLQ25961yy39mbja/E/Mg2gAAAAAAAAAAAEHa++zywvIO199nlgFixVFOJbqq7oi3Ez6Iudm1ZVekaxbjwp/cq//Xf+P6c9pPkDwe6T5Gk+QPB7pPkaT5A8Huk+RpPkDxQ2LvdXJPzDQ0nyb+xY/wB3VyT8wD625961yy39mbja/E/MtDbn3rXLLf2ZuNr8T8yDaAAAAAAAAAAAAQtsRpmz/mmF1rZuHRl0xrPRrjwqBjx83GixbpquxExTETEsnXsXjUp/Y93iUe52Pe4lHuCh17F41J17F41Kf2Pe4lHudj3uJR7godexeNSdexeNSn9j3uJR7nY97iUe4KHXsXjUnXsXjUp/Y97iUe52Pe4lHuCh17F41J17F41Kf2Pe4lHudj3uJR7gx7Wv2792ibVXSiKe+VTZsaYNrXyn5aVnZE9OJvXImnyp/lVpiKaYppjSIjSIB6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/9k=" alt="Default Image" class="img-thumbnail" width="150">
                                </div>
                            @endif

                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <script>
                                document.getElementById('image').addEventListener('change', function(event) {
                                    const [file] = event.target.files;
                                    if (file) {
                                        const preview = document.getElementById('postImagePreview');
                                        if (preview) {
                                            preview.src = URL.createObjectURL(file);
                                        } else {
                                            const img = document.createElement('img');
                                            img.id = 'postImagePreview';
                                            img.src = URL.createObjectURL(file);
                                            img.alt = 'Post Image';
                                            img.className = 'img-thumbnail';
                                            img.width = 150;
                                            document.querySelector('.form-group').insertBefore(img, document.getElementById('image').nextSibling);
                                        }
                                    }
                                });
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="postCategory" class="form-control @error('postCategory') is-invalid @enderror" id="category_id">
                                <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}" >
                                    {{ $category->title }}
                                </option>
                            @endforeach
                            </select>
                            @error('postCategory')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post Table</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>Post Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                @if(is_object($post))
                                    <tr>
                                        <td>{{ $post->post_id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->description }}</td>
                                      
                                        <td>
                                            @if($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-thumbnail" width="100">
                                            @else
                                                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIALgAwwMBIgACEQEDEQH/xAAbAAEBAAMBAQEAAAAAAAAAAAAABQMEBgECB//EADMQAQABAwEECQQBAwUAAAAAAAABAgMEEQU0U3ISFBUhMVGRobEyM3HBQRNSYSIkQkWD/8QAFQEBAQAAAAAAAAAAAAAAAAAAAAL/xAAUEQEAAAAAAAAAAAAAAAAAAAAA/9oADAMBAAIRAxEAPwD9hAUkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAS9rZlduqLNqej3a1THiqIO199nlgGKmxlVxFUUXZie/Xv73vVsvh3fSV3G3a1yR8PjJzLGPOlyrWr+2O+QRerZfDu+knVsvh3fSVextHHvVRTFU01T4RVGmrbBzvVsvh3fSTq2Xw7vpLogHO9Wy+Hd9JOrZfDu+kuiAc71bL4d30k6tl8O76S6IBzlNzJxLkazXRPjpV4Sv492L1mi5EadKNdPJK25961yy39mbja/E/Mg2gAAAAAAAAAAAEHa++zywvIO199nlgFe3V0MKiv+21E+zna6prqmqqdapnWZdJjxFWLbifCbcRPohZeJcxq5iaZmj/jVANZ0Wz7tV3Dt1Vd9XhM/hCsWLl+uKbdEz/n+IdFj2osWaLUd/Rjx8wZAfNy5TaomuudKY8ZAuXKbVE11zpTHjL5sXqL9uLludYn2Qs7Mqyq+7WLcfTT+5fGJk14tzpU98T9VPmDpBjsXqL9uLludYn2ZARtufetcst/Zm42vxPzLQ25961yy39mbja/E/Mg2gAAAAAAAAAAAEHa++zywvIO199nlgFnG3a1yR8MrFjbta5I+H3crpt0TXXMRTHjIFVVNumaqpimmP5nufTn8/Mqyq9I7rceFP7ln2dtD+lH9K/P+iPpq8gV7lym1RNdc6Ux4ygZ2ZVlV92sW4+mn9yZ2ZVlV92sW4+mn9y1QAAZ8TKrxbnSp76Z+qnzdBYvUX7cXLc6xPs5hQ2LVMZNVOs6TRrMA+tufetcst/Zm42vxPzLQ25961yy39mbja/E/Mg2gAAAAAAAAAAAEHa++zywvIO199nlgFixVFOJbqq7oi3Ez6Iudm1ZVekaxbjwp/cq//Xf+P6c9pPkDwe6T5Gk+QPB7pPkaT5A8Huk+RpPkDxQ2LvdXJPzDQ0nyb+xY/wB3VyT8wD625961yy39mbja/E/MtDbn3rXLLf2ZuNr8T8yDaAAAAAAAAAAAAQtsRpmz/mmF1rZuHRl0xrPRrjwqBjx83GixbpquxExTETEsnXsXjUp/Y93iUe52Pe4lHuCh17F41J17F41Kf2Pe4lHudj3uJR7godexeNSdexeNSn9j3uJR7nY97iUe4KHXsXjUnXsXjUp/Y97iUe52Pe4lHuCh17F41J17F41Kf2Pe4lHudj3uJR7gx7Wv2792ibVXSiKe+VTZsaYNrXyn5aVnZE9OJvXImnyp/lVpiKaYppjSIjSIB6AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD/9k=" alt="Default Image" class="img-thumbnail" width="100">
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin#editPost', $post->post_id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.deletePost', $post->post_id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
