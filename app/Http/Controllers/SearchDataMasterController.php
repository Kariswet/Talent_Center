<?php

namespace App\Http\Controllers;

use App\Models\EmployeeStatus;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SearchDataMasterController extends Controller
{
   public function filter(Request $request) 
   {
        $data = EmployeeStatus::select(['employee_status_id', 'employee_status_name'])->take(10)->get();
        return response()->json(['data' => $data]);
        //return view('/searchdata', ['data' => $data]);

   }

}


    //     $selectedColumn = $request->input('employee_status_name');
    //     $selectedValue = $request->input('Active', 'Non Active');
    
    //     $query = SearchDataMaster::query();
    
    //     if ($selectedColumn && $selectedValue) 
    //     {
    //         $quey->where($selectedColumn, $selectedValue);
    //     }
    
    //     $result = $query->get();
    //     return response()->json(['result' => $result], 200);
    //     return view('/searchdata', ['result' => $result]);
    //    }
