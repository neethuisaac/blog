<!DOCTYPE html>
<head>
    <title>Blog</title>
</head>
<body>
    <div style='background-color:yellow'>
        {{ $heading }}
    </div>
    {{ $slot }}
    <div style='background-color:gray'>
        {{ $footer }}
    </div>
</body>
</html>
