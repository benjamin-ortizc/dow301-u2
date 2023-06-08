<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index() {
    return view('admin.index');
  }
}
