# Smartmd useful API 
![](https://xiaoqingxin.site/images/default_img.jpg)

## Useful methods
```javascript
var editor = new Smartmd();

editor.togglePreview(); // show preview
editor.toggleSideBySide(); // show preview side by side
editor.toggleFullScreen(); // show fullScreen

editor.isSideBySideActive(); // returns boolean
editor.isFullscreenActive(); // returns boolean
editor.clearAutosavedValue(); // no returned value
editor.isPrototypeOf(); // return boolean

editor.alert('error','some thing wrong');
// editor.alert("Theme name","string");

// create a progress and ajax upload image
var file = document.getElementById("file").files[0];
editor.uploadImage(file); // no returned value

// rewrite upload weight
editor.makeUploadWidget = function(){
    var widget = document.createElement("div");
    widget.className = "editor-image";
    
    // ajax will update width and text in this element
    var progress = document.createElement("div");
    progress.className = "editor-image__progress";
    widget.appendChild(progress);
    return widget;
}
```

## Editor configuration
```javascript
// Most options demonstrate the non-default behavior
var smartmd = new Smartmd({
	autofocus: true,
	// editor height defalut 30vh
	minHeight: "80vh",
	autosave: {
		enabled: true,
		uniqueId: "MyUniqueID",
		delay: 1000,
	},
	blockStyles: {
		bold: "__",
		italic: "_"
	},
	element: document.getElementById("MyID"),
	forceSync: true,
	hideIcons: ["guide", "heading"],
	indentWithTabs: false,
	initialValue: "Hello world!",
	insertTexts: {
		horizontalRule: ["", "\n\n-----\n\n"],
		// need set image false
		image: ["![](http://", ")"],
		link: ["[", "](http://)"],
		table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
	},
	lineWrapping: false,
	parsingConfig: {
		allowAtxHeaderWithoutSpace: true,
		strikethrough: false,
		underscoresBreakWords: true,
	},
	placeholder: "Type here...",
	promptURLs: true,
	renderingConfig: {
		singleLineBreaks: false,
		codeSyntaxHighlighting: true,
	},
	
	// rewrite your shortcuts
	shortcuts: {
		drawTable: "Cmd-Alt-T"
	},
	
	showIcons: ["code", "table"],
	
	// rewrite status
	status: ["autosave", "lines", "words", "cursor", {
		className: "keystrokes",
		defaultValue: function(el) {
			this.keystrokes = 0;
			el.innerHTML = "0 Keystrokes";
		},
		onUpdate: function(el) {
			el.innerHTML = ++this.keystrokes + " Keystrokes";
		}
	}], // Another optional usage, with a custom status bar item that counts keystrokes
	
	styleSelectedText: false,
	tabSize: 4,
	toolbar: false,
	toolbarTips: false,
	
	image:{
       // your UploadController route
       ploadPath:'./upload',
       // image suffix
       type:['jpeg','png','bmp','gif','jpg'],
       // max fileSize (kb)
        maxSize:4096,
    },
	// editor friendly alert themes
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
	]
});
```


### UploadController
```php
return response()->json(
    [
        'path' => config('smartmd.image.url') . '/' . $name,
        'size' => [
            'width' => $width,
            'height' => $height
        ],
        // editor will show the message
        'message' => 'Your success message'
    ]
);
```

### parse markdown 
#### I don't need editor:
```html
// require in your view meta
@include('Smartmd::js-parse')
```
```
<script>
    // create Parsemd object use javascript parse markdown
    var parse = new Parsemd();
    var html = parse.render(document.getElementById("editor").value.replace(/^\s+|\s+$/g, ''));
    document.getElementById("content").innerHTML = html;
</script>
```
#### I need editor:
```html
<script>
    var smartmd = new Smartmd();
    smartmd.markdown("# hello world");
</script>
```
#### I want php render:
* only render Formula、Flowchart、Code highlight use JavaScript
```html
// require in your view meta
@include('Smartmd::php-parse')
```
ParseController.php
```
use NoisyWinds\Smartmd\Markdown;

$parse = new Markdown();
$text = "# Your markdown text";
$html = $parse->text($text);
return view('Smartmd::php-show',['content'=>$html]);

```


 
