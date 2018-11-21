<?php

use NoisyWinds\Smartmd;
use PHPUnit\Framework\TestCase;
class MarkdownTest extends TestCase {
    public function __construct($name = null, array $data = [],$dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }
    function testRawMath(){
        $extension = new Smartmd\Markdown;
        $math = "# header\n\$\$x = 1\$\$";
        $flow = "```\ngraph LR\nA-->B```";
        $expectedMarkup = "<h1>header</h1>\n<p><span class=\"math\">x = 1</span></p>";
        $actualMarkup = $extension->text($math);
        $this->assertEquals($expectedMarkup, $actualMarkup);
        $expectedMarkup = "<pre class=\"flow\"><code class=\"mermaid\">\ngraph LR\nA--&gt;B```</code></pre>";
        $actualMarkup = $extension->text($flow);
        $this->assertEquals($expectedMarkup, $actualMarkup);
    }
}
