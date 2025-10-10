<?php

return [
    'rules' => [
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same',
            'position_after_control_structures' => 'same',
        ],
    ],
    'finder' => PhpCsFixer\Finder::create()
        ->in(__DIR__),
];
