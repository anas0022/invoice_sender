<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/register.css')}}">
    <title>Document</title>
</head>
<body>

            <div class="alert alert-danger">
              
            </div>
       
<form action="{{route('register.post')}}" method="post" >
    @csrf
        <h2>Register</h2>
        @if(session('error'))
    <div class="alert alert-danger" style="color:red;">
        {{ session('error') }}
    </div>
@endif
        @if ($errors->any())
        <div class="errors">
        <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
        @endif
        <input type="text" name="name" id="name" placeholder="Fullname" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="file" name="image" id="image" hidden >
        <div class="password">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
        </div>
      
        <div class="button">
       <button type="submit" class="btn">Submit</button></div>
       <div class="allreadyhave-account">
        <p>Already have an account? <a href="{{route('login')}}">Login</a>
       </div>
    </form>
    <script>
        
    </script>
</body>
</html>