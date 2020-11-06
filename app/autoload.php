<?php

spl_autoload_register(function ($classe){

    $diretorios = [
        'Libraries',
        'Helpers'
    ];

    foreach($diretorios as $diretorios):
        if(file_exists(__DIR__.DIRECTORY_SEPARATOR.$diretorios.DIRECTORY_SEPARATOR.$classe.'.php')):
            require_once (__DIR__.DIRECTORY_SEPARATOR.$diretorios.DIRECTORY_SEPARATOR.$classe.'.php');
        endif;

    endforeach;
});