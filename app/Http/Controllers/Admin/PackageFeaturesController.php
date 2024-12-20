<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageFeaturesController extends Controller
{
    public function feature() {
        
        $feature = DB::table('Package_features')-> get();
        return view('pages.events.packagesfeatures', [
            "feature" => $feature
        ]);
    }
}