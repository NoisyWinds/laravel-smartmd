<?php
namespace NoisyWinds\Smartmd;
use Illuminate\Config\Repository;

class Smartmd
{
    protected $config;
    public function __construct(Repository $config)
    {
        $this->config = $config;
        $this->markdown = new Markdown();
    }
}