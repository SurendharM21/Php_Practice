<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<h1>Welcome to User Cart</h1>
<div class="container">
    <div class="row align-items-center">
        @if ('success')
        <div class="aler alert-success">
            {{session('success')}}
        </div>
        @endif
        @foreach ($users as $user )
        <div class="col-md-4">
            <div class="card" style="width:18rem;">
                <img src="{{asset($user->image)}}" class="card-img-top" alt="{{$user->name}}">
                <div class="card-body">
                    <div class="card-title">{{$user->name}}</div>
                    <p class="card-text">Email:<span>{{$user->email}}</span></p>
                    <p class="card-text">Address:<span>{{$user->address}}</span></p>
                    <p class="card-text">Phone Number:<span>{{$user->phone_number}}</span></p>
                    <div class="text-center">
                    <button class="btn btn-danger">
                        <a href="{{route('deleteUser',['id'=>$user->id])}}" class="text-white">Delete</a>
                    </button>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
