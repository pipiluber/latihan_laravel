<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko online</title>
</head>
<body>
    <h3> {{$title}}</h3>
    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{session()->get('error')}}</strong>
    </div>
    @endif
    <form action="{{ route('backend.login') }}" method="POST">
        @csrf
        <label>user</label>
        <input type="text" name="email"  value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="masukkan email">
        <span class="invalid-feedback alert-danger" role="alert">
            @error('email') 
        </span class="invalid-feedback alert-danger" role="alert">
            {{$message}}
            @enderror
            <p></p>
        <label>password</label>
         <input type="password" name="password" id="" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" placeholder="masukkan password">
    @error('password') 
        <span class="invalid-feedback alert-danger" role="alert">
            {{$message}} 
        </span>
            @enderror
            <p></p>
        <button type="submit" class="btn btn-primary">login</button>
</body>
</html>