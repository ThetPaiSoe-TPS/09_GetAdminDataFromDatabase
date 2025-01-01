@extends('admin.layouts.app')

@section('content')
    <div class="container w-100">
        <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <legend class="text-center">User Profile</legend>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <form class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="inputPhone" placeholder="Phone" value="{{ $user->phone }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="address" rows="5" placeholder="Enter your address here" value="{{ $user->address }}">{{$user->address}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputGenda" class="col-sm-4 col-form-label">Gender</label>
                                        <div class="col-md-6">
                                            <div class=" row">
                                                <div class="col">
                                                    <input class="form-check-input" type="radio" name="genda" id="male" value="male" {{$user->gender== 'male'? 'checked': ''}}>
                                                    <label class="form-check-label"for="male"> Male </label>
                                                </div>
                                                <div class="col">
                                                    <input class="form-check-input" type="radio" name="genda" id="female" value="female" {{$user->gender== 'female'? 'checked': ''}}>
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
