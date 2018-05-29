<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, You can do this actions");
        }

        return view('admin.dashboard');
    }
}
