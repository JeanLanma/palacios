<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TitularMarca;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $titular = TitularMarca::find($request->titular_id);
        return view('admin.dashboard', compact('titular'));
    }
}
