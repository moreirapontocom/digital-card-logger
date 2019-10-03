<?php

// Possible options

// ?info=tel:31983645656
// ?info=mailto:lucas@lucasmoreira.com.br
// ?info=http://lucasmoreira.com.br

$info = base64_decode($_GET['info']);

if (!empty($info)) :

    $protocols = ['tel','mailto','http','https'];

    $exp = explode(':', $info);
    $protocol = ( isset($exp[0]) && in_array($exp[0], $protocols) ) ? $exp[0] : 'https';
    $target = $exp[1];

    $report = $protocol . ':' . $target;

    $content = $report . '|' . date('d/m/Y H:i') . "\n";

    $fs = fopen('reports.txt', 'a+');
    fwrite($fs, $content);
    fclose($fs);

    header('Location: ' . $report);

endif;

header('Location: https://lucasmoreira.com.br/');