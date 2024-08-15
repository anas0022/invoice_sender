<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="top">
    <div class="menu-items">
    @if($user->image)
    <a href="/home/{{ $user->id }}" class="img" id="profile">
        <img src="{{ asset('storage/' . $user->image) }}" style="height:100%; width:100%; border-radius:50%;">
    </a>
    @else 
    <a href="/home/{{ $user->id }}"> <i class="fa-solid fa-user" id="profile"></i></a>
    @endif
   
    <a href="/jobdone/{{ $user->id }}"><i class="fa-solid fa-briefcase" id="job_done"></i></a>
    <a href="/job/{{ $user->id }}"><i class="fa-solid fa-file-invoice" id="invoice"></i></a>
    </div>
</div>

</body>
</html>
