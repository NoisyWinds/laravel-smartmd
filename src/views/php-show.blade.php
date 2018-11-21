<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fresh Air') }}</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    @include('Smartmd::php-parse')
    <style>
        body{
            background: white;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="container">
        <div class="row justify-content-center p-5">
            <div class="col-10 mb-4 text-center">
                <img src="https://xiaoqingxin.site/images/default_img.jpg" alt="im" class="col-12">
            </div>
            <div class="col-10">
                <div id="content" class="markdown-body">
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var codes = document.getElementsByClassName('hljs');
    for(let item of codes){
        window.hljs.highlightBlock(item);
    }
    var maths = document.getElementsByClassName('math');
    for(let item of maths){
        window.katex.render(item.innerHTML, item, {
            throwOnError: true
        });
    }
</script>
</body>