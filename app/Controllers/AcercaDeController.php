<?php

namespace App\Controllers;

class AcercaDeController extends BaseController
{
    public function index(): string
    {
        return view('acerca_de');
    }
}
