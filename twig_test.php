<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\ArrayLoader;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';

error_reporting(E_ALL ^ E_DEPRECATED);

$data = array(
    "ROOT" => "/welcome",
    "PAGE" => "main",
    "TITLE" => "Mahdi Parastesh",
    "HELP" => $_GET['hl'] ?? '',
    "COUNTRY" => '',
);

$twig = new Environment(new FilesystemLoader(["welcome"]));
try {
    $twig->setLoader(new ArrayLoader([
        'index' => $twig->render('temp.html', $data),
    ]));
} catch (LoaderError|RuntimeError|SyntaxError $e) {
}
try {
    echo $twig->render('index', $data);
} catch (LoaderError|RuntimeError|SyntaxError $e) {
}
