<?php

namespace Applications\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layout', ['content' => 'home/index']);
    }
}
