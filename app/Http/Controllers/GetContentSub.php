<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetContentSub extends Controller
{
    public function GetSub(){
    	return view('sub');
    }
}
/*foreach ($variable as $key => $value) {
	# code...
}*/