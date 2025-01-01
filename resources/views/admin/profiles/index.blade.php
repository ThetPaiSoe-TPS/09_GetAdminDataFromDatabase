@extends('admin.layouts.app')

@section('content')
    <div class="container w-100">
        <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <legend class="text-center">User Profile</legend>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <form class="form-horizontal" method="POST" action="{{ route('admin#update') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('adminName') is-invalid @enderror" id="adminName" name="adminName"
                                                placeholder="Name" value="{{ old('adminName', $user->name) }}">
                                            @error('adminName')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label ">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="adminEmail" class="form-control @error('adminEmail') is-invalid @enderror" id="inputEmail"
                                                placeholder="Email" value="{{ old('adminEmail', $user->email) }}">
                                            @error('adminEmail')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label ">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="tel" name="adminPhone" class="form-control @error('adminPhone') is-invalid @enderror" id="inputPhone"
                                                placeholder="Phone" value="{{ old('adminPhone', $user->phone) }}">
                                            @error('adminPhone')
                                                <span class="invalid-feedback"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label ">Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control @error('adminAddress') is-invalid @enderror" name="adminAddress" id="address" rows="5" placeholder="Enter your address here"
                                                value="{{ $user->address }}">{{ old('adminAddress', $user->address) }}</textarea>
                                            @error('adminAddress')
                                                <span class="invalid-feedback "> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputGenda" class="col-sm-4 col-form-label">Gender</label>
                                        <div class="col-md-6">
                                            <div class=" row">
                                                <div class="col">
                                                    <input class="form-check-input" type="radio" name="adminGender"
                                                        id="male" value="male"
                                                        {{ $user->gender == 'male' ? 'checked' : '' }}>
                                                    <label class="form-check-label"for="male"> Male </label>
                                                </div>
                                                <div class="col">
                                                    <input class="form-check-input" type="radio" name="adminGender"
                                                        id="female" value="female"
                                                        {{ $user->gender == 'female' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="female">Female </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-4">
                                            <button type="submit" class="btn bg-dark text-white">Update</button>
                                        </div>
                                        <div class="col">
                                            <a href="">Change Password</a>
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
