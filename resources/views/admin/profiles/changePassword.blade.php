@extends('admin.layouts.app')

@section('content')
    <div class="container w-100">
        <div class="col-10 offset-3 mt-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <legend class="text-center">Change Password</legend>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                @if (Session::has('fails'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{Session::get('fails')}}
                                  </div>
                                @endif
                                <form class="form-horizontal " method="POST" action="{{ route('admin#changePassword') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-4 col-form-label">Old Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword" name="oldPassword"
                                                placeholder="Enter your old password..." >
                                            @error('oldPassword')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-4 col-form-label">New Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword"
                                                placeholder="Enter your new password..." >
                                            @error('newPassword')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-4 col-form-label">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword" name="confirmPassword"
                                                placeholder="Enter your confirm password..." >
                                            @error('confirmPassword')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class=" col-sm-4">
                                            <button type="submit" class="btn bg-dark text-white">Change Password</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
