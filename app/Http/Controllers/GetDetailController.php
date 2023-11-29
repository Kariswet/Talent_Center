<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetDetailController extends Controller
{
    public function detail($id) 
    {
        try {
            $talentDetail = Talent::firstWhere('talent_id', $id);
            $data = [
                'talentId' => $talentDetail->talent_id,
                'talentPhoto' => $talentDetail->talent_photo_filename,
                'talentName' => $talentDetail->talent_name,
                'talentStatus' => $talentDetail->talentStatus->talent_status_name,
                'nip' => $talentDetail->employee_number,
                'sex' => $talentDetail->sex,
                'dob' => $talentDetail->birth_date,
                'talentDescription' => $talentDetail->talent_description,
                'cv' => $talentDetail->talent_cv_filename,
                'talentExperience' => $talentDetail->experience,
                'talentLevel' => $talentDetail->talentLevel->talent_level_name,
                'projectCompleted' => $talentDetail->total_project_completed,
                'totalRequested',
                'position' => $talentDetail->positions->map(function ($positions) {
                    return [
                        'positionId' => $positions->position_id,
                        'positionName' => $positions->position_name
                    ];
                }),               
                'skillSet' => $talentDetail->skillsets->map(function ($skillsets) {
                    return [
                        'skillId' => $skillsets->skillset_id,
                        'skillName' => $skillsets->skillset_name
                    ];
                }),
                'email' => $talentDetail->email,
                'cellphone' => $talentDetail->cellphone,
                'employeeStatus' => $talentDetail->employeeStatus->employee_status_name,
                'talentAvailability' => $talentDetail->talent_availability,
                'videoUrl' => $talentDetail->biography_video_url
            ];
            return response()->json(['data' => $data]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    } 
}