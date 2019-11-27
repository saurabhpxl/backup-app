<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    /**
     * Action to execute all controllers
     * @param Request $request
     */
    public function backup(Request $request)
    {
        Artisan::call('db:backup');

        return view('welcome', [
            'message' => Artisan::output()
        ]);
    }
}
