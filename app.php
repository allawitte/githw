<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$app = new \Symfony\Component\Console\Application('demo app');
$app->add(new App\SayHello());
$app->add(new App\LoopOut())
$app->add(new App\WhoYouAre());
$app->run();
