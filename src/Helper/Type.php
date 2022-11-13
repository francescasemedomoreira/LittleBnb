<?php

namespace App\Helper;

class Type{
    public static function getConfiguration($label, $placeholder){
        return [ 'label' => $label,
                'attr' => ['placeholder' => $placeholder]];
    }
}
