<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="instagram-feed">
        @foreach ($data['data'] as $post)
            <div class="post">
                <img src="{{ $post['thumbnail_url'] }}" alt="Post Image">
                <p>{{ $post['caption'] }}</p>
            </div>
        @endforeach
    </div>    
</body>
</html>