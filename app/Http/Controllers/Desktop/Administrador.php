<?php

namespace Market\Http\Controllers\Desktop;

use Illuminate\Http\Request;
use Market\Http\Controllers\Controller;

class Administrador extends Controller
{
    //
    public function panel(){
      return view('administrador/panel');
    }

    public function acceso(){
      return view('administrador/acceso');
    }

    public function reportes(){
      return view('administrador/reportes');
    }
}
