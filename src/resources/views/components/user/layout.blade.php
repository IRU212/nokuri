<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description }}">
    <meta name="author" content="okajima">
    <meta http-equiv="Content-Language" content="ja">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('/img/icon/favicon.png') }}">
    <link rel="stylesheet" href="{{ $addTimeStamp(asset('/css/user/index.css')) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="{{ $addTimeStamp(asset('/js/index.js')) }}" defer></script>
</head>
<body>
    {{ $slot }}
</body>