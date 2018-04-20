<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetForm extends Controller
{
   	public function GetFormLogin(){
   		return view('form.layout');
   	}
}
