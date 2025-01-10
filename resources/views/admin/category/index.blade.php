@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('deleteSuccess'))
            <div class="alert alert-success">
                {{ session('deleteSuccess') }}
            </div>
        @endif
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin#createCategory') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="categoryName"
                                class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="categoryName" type="text"
                                    class="form-control @error('categoryName') is-invalid @enderror" name="categoryName"
                                    value="{{ old('categoryName') }}" autocomplete="categoryName" autofocus>

                                @error('categoryName')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                                    rows="3">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <form action="{{ route('admin#categorySearch') }}" method="POST">
                                @csrf

                                <div class="input-group">
                                    <input type="text" name="categorySearch" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td> {{ $item['category_id'] }} </td>
                                    <td> {{ $item['title'] }} </td>
                                    <td> {{ $item['description'] }} </td>
                                    <td> {{ $item['created_at'] }} </td>

                                    <td>
                                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                                        <a href="{{ route('admin#deleteCategory', $item['category_id']) }}">
                                            <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i>
                                            </button>
                                        </a>


                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection
