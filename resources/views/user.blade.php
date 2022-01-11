
    
{{-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif --}}

{{-- <h1> Login Page</h1>
@foreach($users as $user)
    <p> {!! $user->name !!} </p>
    <p> {!! $user->description !!} </p>
@endforeach --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="user" method="post" style="border: 2px solid gray; width:30%; margin-left:600px;margin-top:100px; border-radius:20px; padding-top:30px">
        <h1 style="margin-left:130px">Registration Form</h1>
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{old('name')}}" style="width:90%; height:40px; margin-left:20px; margin-top:10px;border-radius:15px"><br>
        <span style="color:red; margin-left:20px">@error('name'){{$message}}@enderror</span><br>
        <input type="email" name="email" placeholder="email" value="{{old('email')}}" style="width:90%; height:40px; margin-left:20px; margin-top:10px;border-radius:15px"><br>
        <span style="color:red;margin-left:20px">@error('email'){{$message}}@enderror</span><br>
        <input type="password" name="password" placeholder="Password" style="width:90%; height:40px; margin-left:20px; margin-top:10px;border-radius:15px"><br>
        <span style="color:red;margin-left:20px">@error('password'){{$message}}@enderror</span><br>
        <input type="text" name="phone" placeholder="Phone#"  style="width:90%; height:40px; margin-left:20px; margin-top:10px;border-radius:15px"><br>
        <span style="color:red;margin-left:20px">@error('phone'){{$message}}@enderror</span><br>
        <input type="date" name="date" placeholder="Registration Date" value="{{old('date')}}" style="width:90%; height:40px; margin-left:20px; margin-top:10px;border-radius:15px"><br>
        <span style="color:red;margin-left:20px">@error('date'){{$message}}@enderror</span><br>
        <input type="submit" name="submit" value="Login" style="width:150px; height:50px; border-radius:20px; margin-bottom:50px; margin-left:200px; color:white;background-color:rgb(48, 48, 124);font-weight:bold;">
    </form>
</body>
</html>