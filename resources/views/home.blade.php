<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('CSS/home.css') }}">
    <title>Document</title>
</head>
<body>

@include('menu')

<div class="profile">
    @include('profile')
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var profile = document.getElementById('profile');
        var job_done = document.getElementById('job_done');
        var invoice = document.getElementById('invoice');
        var labels = document.querySelectorAll('label');
        var add =document.getElementById('add');

        labels.forEach(function(label) {
                label.addEventListener('click', function() {
                    add.classList.toggle('active');
        })});
    });
</script>
</body>
</html>

