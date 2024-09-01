<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Practice</title>
</head>
<body>


    <div class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="col-md-6">
                <div class="card">
                    <button class="btn btn-primary">Edit Profile</button>
                </div>
                <div class="card p-2">
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>

                        @endif
                    </div>
                <form action="{{route('edit',["id"=>$profile->id])}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$profile->name}}" class="form-control">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$profile->email}}">
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control mb-3" value="{{$profile->address}}">
                    @error('address')
                    <div class="text-danger">{{$message}}</div>
                    @enderror

                    <label for="phone_number">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control mb-3" value="{{$profile->phone_number}}">
                    @error('phone')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    {{-- <label for="image">Image Upload :</label>
                    <input type="file" name="image" id="image" value="{{$profile->image}}" class="form-control mb-3">
                    @error('image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror --}}

                    <div class="col mx-auto fs-2" style="width:100px;">
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </div>
                <div class="row mt-4">
                    <div class="col">
                       <button type="button" class="btn btn-primary fs-6">
                       <a href="{{route('logout')}}" class=" text-white">Logout</a>
                       </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary fs-6">
                        <a href="{{route('register')}}" class=" text-white">Add Contact</a>
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary fs-6">
                        <a href="{{route('userCart')}}" class=" text-white">All User</a>
                        </button>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
