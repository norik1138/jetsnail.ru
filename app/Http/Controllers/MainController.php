<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transport;

class MainController extends Controller
{

  public function index() {
    $transports = Transport::where('status', 'активная')->paginate(12);
    return view('index', compact('transports'));
  }

}
