<?php

$finder = new TwigCsFixer\File\Finder();
$finder->in('templates');

$config = new TwigCsFixer\Config\Config();
$config->setFinder($finder);

return $config;
