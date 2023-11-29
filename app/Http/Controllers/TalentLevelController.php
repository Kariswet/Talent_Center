<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TalentLevel;
use Illuminate\Http\JsonResponse;

class TalentLevelController extends Controller
{
    public function index(Request $request) 
    {
        $data = TalentLevel::select('talent_level_id', 'talent_level_name')->take(1)->get();
        return response()->json(['data' => $data]);
    }
}
