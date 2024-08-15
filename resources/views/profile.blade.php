<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-54e7be3a62ca9b7580d7f8c669f59e74.css?vsn=d">
    <title>Document</title>
</head>
<body>
    <div class="pros">
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" style="color:red; border:none; background-color:white; font-size:25px; position:absolute; left:60%; top:30%; cursor:pointer; z-index:100;"><i class="fa-solid fa-right-from-bracket"></i></button>
</form>
        <div class="pro-items">
        
        <form action="{{ route('addprofile') }}" method="post" enctype="multipart/form-data">

@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@csrf
<input type="file" name="image" id="image">
<input type="text" name="name" id="name" value="{{ old('name', $users->name) }}" hidden>
<input type="email" name="email" id="email" value="{{ old('email', $users->email) }}" hidden>
<input type="submit" value="Add Profile" id="add">

<div id="imagePreview" style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">


    @if($users->image)
        <img src="{{ asset('storage/' . $users->image) }}" id="currentImage" style="max-width: 200px;">
        <label for="image" style="display: flex; justify-content: center; align-items: center;">
            <i class="fa-regular fa-camera" style="font-size: 35px; color: gray; cursor:pointer;"></i>
        </label>
    @else 
        <label for="image" style="display: flex; justify-content: center; align-items: center;">
            <i class="fa-solid fa-user" style="font-size: 65px; color: gray; cursor:pointer;"></i>
        </label>
    @endif
</div>

</div>



</form>
<div class="name">
    @if(Auth::check())
        <p>{{ $users->name }}</p>
    @endif
</div>


        </div>
        
    </div>

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        var imagePreview = document.getElementById('imagePreview');
        var currentImage = document.getElementById('currentImage');
        var files = event.target.files;
        
        if (files.length > 0) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (!currentImage) {
                    currentImage = document.createElement('img');
                    currentImage.id = 'currentImage';
                    currentImage.style.maxWidth = '200px';
                    imagePreview.appendChild(currentImage);
                }
                currentImage.src = e.target.result;
            };
            reader.readAsDataURL(files[0]);
        }
    });
</script>

</body>
</html>
