@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        @if (session('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('deleteSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('deleteError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('deleteError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Page</h3>

                <div class="card-tools">
                    <form action="{{route('admin#listSearch')}}" method="POST">
                        @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="adminSearch" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>Name {{ count($userData) }} </th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Genda</th>
                            <th>Crated Date</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userData as $item)
                            <tr>
                                <td> {{ $item['name'] }} </td>
                                <td> {{ $item['email'] }} </td>
                                <td> {{ $item['phone'] }} </td>
                                <td> {{ $item['address'] }} </td>
                                <td> {{ $item['gender'] }} </td>
                                <td> {{ $item['created_at'] }} </td>
                                <td>
                                    {{-- <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button> --}}
                                    <a
                                        @if (count($userData) == 1) href="#"
                                    @else
                                      href="{{ route('admin#accountDelete', $item['id']) }}" @endif>
                                        @if ($item['id'] !== Auth::id())
                                            <button class="btn btn-sm bg-danger text-white">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        @endif

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
@endsection
