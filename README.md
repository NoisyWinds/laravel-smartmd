# Laravel-smartmd
a simple markdown editor compatible most markdown parse,like Mathematical formula、flowchart、upload image...

this program is a plugin for laravel 5.4 upper

#  Screenshots
editor demo: [xiaoqingxin.site](https://xiaoqingxin.site/editor/write) and you can see the render page [xiaoqingxin.site](https://xiaoqingxin.site/editor/show)
  
  ![](./docs/screenshort_01.png)
  ---
  ![](./docs/screenshort_02.png) 
  --- 
  ![](./docs/screenshort_03.gif) 
  ---
  ![](./docs/screenshort_04.gif)

Reference:
- CodeMirror [link](https://github.com/codemirror/CodeMirror) 
- Simplemde-markdown [link](https://github.com/sparksuite/simplemde-markdown-editor)
- markdown-it (markdown render) [link](https://github.com/markdown-it/markdown-it)
- mermaid (flowchart) [link](https://github.com/knsv/mermaid)
- intervention (image handling) [link](https://github.com/Intervention/image)

### requirements
- PHP >= 7.0.0
- Laravel >= 5.4.0

## Installation
First, install package.
```
composer install noisywinds/laravel-smartmd
```
Then run these commands to publish assets and config：
```
php artisan vendor:publish --provider="NoisyWinds\Smartmd\SmartmdServiceProvider"
```
make test view router:
```
Route::group(['namespace' => 'Smartmd', 'prefix' => 'editor'], function () {

    // uploda controller
    Route::post('/upload', 'UploadController@imSave');
    
    // write view
    Route::get('/write', function () {
        return view('vendor/smartmd/write');
    });
    
    // show view
    Route::get('/show',function(){
        return view('vendor/smartmd/show');
    });
});
```
Rewrite UploadController or config/smartmd.php to change upload path:
```php
<?php
return [
    "image" => [
        /*
         * like filesystem, Where do you like to place pictures?
         */
        "root" => storage_path('app/public/images'),
        /*
         * return public image path
         */
        "url" => env('APP_URL').'/storage/images',
    ],
];
```
* notice: uploda image will optimize and resize in the UploadController

# 
# Some shortcode
1. Bold (Ctrl + b)
2. Italic (Ctrl + I)
3. Insert Image (Ctrl + Alt + I)
4. Insert Math (Ctrl + m)
5. Insert flowchart (Ctrl + Alt + m)
6. more... (mac command the same with ctrl)


# some editor options
```javascript
var editor = new Smartmd({
        element: document.getElementById("editor"),
        // minheight default 30vh
        minHeight: "80vh",
        renderingConfig: {
            singleLineBreaks: false,
            // highlight (need highlight.js)
            codeSyntaxHighlighting: true,
        },
        autosave: {
            enabled: true,
            uniqueId: "write",
            delay: 1000,
        },
        autoCloseTags: true,
        matchTags: {bothTags: true},
        image:{
            // your UploadController route
            uploadPath:'./upload',
            type:['jpeg','png','bmp','gif','jpg'],
            // fileSize (kb)
            maxSize:4096,
        },
        // editor alert notice icon and color
        alertThemes:[
            {
                name: 'success',
                icon: 'fa fa-check-circle',
            	color: '#38c172',
            	defaultText: 'success'
            },
            {
            	name: 'error',
            	icon: 'fa fa-close-circle',
            	color: '#e3342f',
            	defaultText: 'Some things error'
            }
            //..add your themes and use editor.alert("themeName","text") to used;
        ]
        //...more see the docs
});

// diy editor drop function
var cm = smartmd.codemirror;
  cm.display.lineDiv.ondrop = function(ev){
       if(ev.target.className.indexOf("CodeMirror-line") > -1){
           // your drop down function
       }
       ev.preventDefault();
   }
```
# How to expand
### editor
- CodeMirror [link](https://github.com/codemirror/CodeMirror) 
### markdown render
- markdown-it (markdown render) [link](https://github.com/markdown-it/markdown-it)
# issue 
Welcome to ask questions or what features you want to be compatible with.

