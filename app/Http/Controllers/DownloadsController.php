<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DownloadsController extends Controller
{
  public function download($file_name) {
    $file_path = public_path('downloads/'.$file_name);
    return response()->download($file_path);
  }
}
