<?php
namespace DeveloperTest\Controller;

use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

abstract class Controller
{
    /**
     * @param $name
     * @param array $variables
     * @return false|string
     */
    protected function render($name, array $variables = [])
    {
        return (new PhpEngine(new TemplateNameParser(),
            new FilesystemLoader(__DIR__
                . DIRECTORY_SEPARATOR . '..'
                . DIRECTORY_SEPARATOR . '..'
                . DIRECTORY_SEPARATOR . 'resources'
                . DIRECTORY_SEPARATOR . 'view'
                . DIRECTORY_SEPARATOR . '%name%'))
        )->render($name, $variables);
    }
}