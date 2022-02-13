<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function __invoke()
    {  	
    	return view('personal.main.index');
    }
}
