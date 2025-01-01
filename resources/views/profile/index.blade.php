{{-- @extends('layouts.app')

@section('content')
<header class="text-center my-3">
    <b class="h3 p-3 rounded bg-info">Admin Dashboard</b>
</header>

<div class="container mx-auto bg-white">
    <div class="row col-12 mb-5">
        <div class="col-6 sidebar me-5">
            <h3 class="text-center h4">Sidebar</h3>
            <ul>
                <li><a href="#" style="" class="my-3 p-2">Profile</a></li>
                <li><a href="#" style="" class="my-3 p-2">Admin List</a></li>
                <li><a href="#" style="" class="my-3 p-2">Category</a></li>
                <li><a href="#" style="" class="my-3 p-2">Post</a></li>
                <li><a href="#" style="" class="my-3 p-2">Trending Post</a></li>
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn text-white m-0 p-0" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-6 px-3 ms-5 ps-5">
            <h2 class="text-center my-4 h3">Contact Form</h2>
            <form>
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
            </div>
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <!-- Phone Field -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control " id="phone" placeholder="Enter your phone number" required>
            </div>
            <!-- Address Field -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" required></textarea>
            </div>
            <!-- Submit Button -->
            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
            </form>
        </div>
    </div>
</div>
<footer class="footer">
    <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
</footer>
@endsection
 --}}

 <h1>Hello World</h1>
