<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function index() {

        $packages = DB::table('packages')-> get();
        return view('pages.events.index',[
            "packages" => $packages
        ]);
    }
}
