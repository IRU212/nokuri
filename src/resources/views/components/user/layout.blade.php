<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description }}">
    <meta name="author" content="okajima">
    <meta http-equiv="Content-Language" content="ja">
    <title>{{ $title }}</title>
    @vite(['resources/scss/app.scss'])
    <!-- OGP -->
    <!-- Twitterカード -->
</head>
<body>
    {{ $slot }}
</body>
</html>