<?php

// Possible options

// ?info=tel:3134126208 -> tel
// ?info=tel:31983645656 -> whatsapp
// ?info=mailto:lucas@lucasmoreira.com.br -> email
// ?info=http://lucasmoreira.com.br -> site

$info = base64_decode($_GET['info']);

if (!empty($info)) :

    $protocols = ['tel','mailto','http','https','whatsapp'];
    $protocolsNames = ['Telefone','Email','Site','Site (SSL)','WhatsApp'];

    $exp = explode(':', $info);
    $protocol = ( isset($exp[0]) && in_array($exp[0], $protocols) ) ? $exp[0] : 'https';
    $target = $exp[1];

    $location = $protocol . ':' . $target;

    if ($protocol=='whatsapp') {
        $location = 'https://api.whatsapp.com/send?phone=55' . $target . '&text=Ola';
    }

    $content = str_replace($protocols, $protocolsNames, $protocol) . ' - ' . $target . ' - ' . date('d/m/Y H:i') . "\n";

    $fs = fopen('reports.txt', 'a+');
    fwrite($fs, $content);
    fclose($fs);

    header('Location: ' . $location);

endif;

die('Nenhum redirecionamento encontrado');