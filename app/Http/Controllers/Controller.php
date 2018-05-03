<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController {

    public function generateKey($MaxSize) {
        //return unique random key
        return Str::random($MaxSize);
    }

}
