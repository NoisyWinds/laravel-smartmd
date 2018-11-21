<?php

namespace App\Http\Controllers\Smartmd;
use App\Http\Controllers\Controller;
use NoisyWinds\Smartmd\Markdown;

class ParseController extends Controller
{
    public function index(){
        $parse = new Markdown();
        $text = "# Hello world\nHi,my friend.That is Fresh Air markdown editor.Are you using it for the first time? click the question button or [click there](https://xiaoqingxin.site/p/markdown-guide) there has a simple documentation for you.\n\n## Some great features\n\n### 1. LaTex\nYou can render LaTeX mathematical expressions inline like this\n$\ny = x+1\n$\n,or like a block.\n$$\n\\Gamma(z) = \\int_0^\\infty t^{z-1}e^{-t}dt\\,.\n$$\n\n$$\n\\begin{cases}3x + 5y +  z \\\\7x - 2y + 4z \\\\-6x + 3y + 2z\\end{cases}\n$$\n\n>Mathematics abuse my hundreds of times, I stay mathematics such as first.\n\n### 2. Code highlight\n\n```javascript\n// get page width\nvar width = document.body.clientWidth\n```\n\n```python\n# Find the odd number within 100\ni = 0\nsum = 0\nwhile i < 100:\n    if i % 2 == 1:\n        sum += i\n    i += 1\nprint \"odd number sum is：\" + str(sum)\n```\n\n### 3. Flow chart\n\n```\ngraph LR\nA[rock] -- write --> B((article))\nA --> C(posts)\nB --> D{mountain}\nC --> D\n```\n\n### 4.Table lists\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text     | Text     |\n| Text     | Text     | Text     |\n\n### 4.Emoji face\n\nemoji shortcode will be render like this：\n```\n:joy :laughing: :fire: :dragon_face: :frog:\n```\n:joy: :laughing: :fire: :dragon_face: :frog:\n\n### 4.Upload image\n![](https://www.xiaoqingxin.site/images/logo_3.png)\n\n\n\n";
        $html = $parse->text($text);
        return view('Smartmd::php-show',['content'=>$html]);
    }
}
