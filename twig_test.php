<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

require_once 'vendor/autoload.php';

error_reporting(E_ALL ^ E_DEPRECATED);

$twig = new Environment(new Twig\Loader\FilesystemLoader(["welcome"]));
try {
    echo $twig->render('temp.html', ['name' => 'Fabien']);
} catch (LoaderError|RuntimeError|SyntaxError $e) {
}