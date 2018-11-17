<?php
namespace NoisyWinds\Smartmd;
use Illuminate\Config\Repository;
use Illuminate\Routing\Route;
class Smartmd
{
    protected $config;
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }
}