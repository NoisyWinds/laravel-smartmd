<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fresh Air') }}</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    @include('Smartmd::js-parse')
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
                <textarea id="editor" placeholder="请输入正文" style="display: none">
                    {{
                       // print your markdown text there
                       "# Hello world\nHi,my friend.That is Fresh Air markdown editor.Are you using it for the first time? click the question button or [click there](https://xiaoqingxin.site/p/markdown-guide) there has a simple documentation for you.\n\n## Some great features\n\n### 1. LaTex\nYou can render LaTeX mathematical expressions inline like this\n$\ny = x+1\n$\n,or like a block.\n$$\n\\Gamma(z) = \\int_0^\\infty t^{z-1}e^{-t}dt\\,.\n$$\n\n$$\n\\begin{cases}3x + 5y +  z \\\\7x - 2y + 4z \\\\-6x + 3y + 2z\\end{cases}\n$$\n\n>Mathematics abuse my hundreds of times, I stay mathematics such as first.\n\n### 2. Code highlight\n\n```javascript\n// get page width\nvar width = document.body.clientWidth\n```\n\n```python\n# Find the odd number within 100\ni = 0\nsum = 0\nwhile i < 100:\n    if i % 2 == 1:\n        sum += i\n    i += 1\nprint 'odd number sum is：' + str(sum)\n```\n\n### 3. Flow chart\n\n```\ngraph LR\nA[rock] -- write --> B((article))\nA --> C(posts)\nB --> D{mountain}\nC --> D\n```\n\n### 4.Table lists\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text     | Text     |\n| Text     | Text     | Text     |\n\n### 4.Emoji face\n\nemoji shortcode will be render like this：\n```\n:joy :laughing: :fire: :dragon_face: :frog:\n```\n:joy: :laughing: :fire: :dragon_face: :frog:\n\n### 4.Upload image\n![](https://www.xiaoqingxin.site/images/logo_3.png)\n\n\n\n"
                    }}
                </textarea>
                <div id="content" class="markdown-body">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // create Parsemd object use javascript parse markdown
    var parse = new Parsemd();
    var html = parse.render(document.getElementById("editor").value.replace(/^\s+|\s+$/g, ''));
    document.getElementById("content").innerHTML = html;
</script>
</body>