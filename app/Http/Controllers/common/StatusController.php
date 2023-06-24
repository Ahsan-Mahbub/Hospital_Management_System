<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatusController extends Controller
{
    public function updateStatus(Request $request) 
    {   
        $id     = $request->input('id');
        $status = $request->input('status');
        $table  = $request->input('model');

        if (!Schema::hasTable($table)) {
            return response()->json(['error' => 'Something went wrong'], 400);
        }

        DB::table($table)
            ->where('id', $id)
            ->update(['status' => $status]);

        return response()->json(['success' => true], 200);
    }
}