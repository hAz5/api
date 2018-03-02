<?php
namespace API\api\controllers;

use Barryvdh\Debugbar\Controllers\BaseController;

class TestControllers extends BaseController {

    public function index()
    {
        return 'test';
    }
}