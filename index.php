<?php
require './vendor/autoload.php';
use Carbon\Carbon;
$hoje = Carbon::now();
$data = date('Y', strtotime($hoje));

    require __DIR__ . './source/Controllers/DOM.php';

    # uses
    use Source\Controllers\DOM;

    # instances

    # header html
    DOM::components ('header');

    # sections and components html
    DOM::section ([

        'intro',
        'about',
        'works',
        'conclusion'
    ]);

    # footer html
    DOM::components ('footer');