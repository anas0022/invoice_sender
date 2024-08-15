<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link rel="stylesheet" href="{{asset('CSS/register.css')}}">
    <title>Document</title>
</head>
@if(session('success'))
<div class="success">

        <p style="color: green;">{{ session('success') }}</p>
  </div>  @endif
<body>

<form action="{{route('login.post')}}" method="post">
    
    @csrf
        <h2>Login</h2>
        @if ($errors->any())
        <div class="errors">
        <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
        @endif
        <input type="email" name="email" id="email" placeholder="Email" required>

            <input type="password" name="password" id="password" placeholder="Password" required>
       
  
      
        <div class="button">
       <button type="submit" class="btn">Submit</button></div>
   <div class="donthave-account">
    <p>Don't have an account? <a href="/">Register</a>
   </div>
    </form>
</body>
</html>