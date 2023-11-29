<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use App\Models\Skillset;
use App\Models\Position;
use App\Models\TalentMetadata;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PostSaveDataController extends Controller
{
    public function create(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'talentPhoto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'talentName' => 'required|string',
                'talentStatusId' => 'required|exists:talent_status,talent_status_id',
                'nip' => 'required|string',
                'sex' => 'required|string',
                'dob' => 'required|date',
                'talentDescription' => 'required|string',
                'cv' => 'required|mimes:pdf,docx|max:2048',
                'talentExperience' => 'required|integer',
                'talentLevelId' => 'required|exists:talent_level,talent_level_id',
                'projectCompleted' => 'required|integer',
                'position' => 'required|array',
                'position.*.positionId' => 'required|exists:position,position_id',
                'skillSet' => 'required|array',
                'skillSet.*.skillId' => 'required|exists:skillset,skillset_id',
                'email' => 'required|email',
                'cellphone' => 'required|string',
                'employeeStatusId' => 'required|exists:employee_status,employee_status_id',
                'talentAvailability' => 'required|string',
                'videoUrl' => 'required|string',
            ]);

            // Process the photo
            $photo = $request->file('talentPhoto');
            $photoFileName = $this->generateFileName($validatedData['talentName'], $validatedData['talentExperience'], $validatedData['talentLevelId'], 'photo', $photo->extension());
            $photo->storeAs('photos', $photoFileName);

            // Process the CV
            $cv = $request->file('cv');
            $cvFileName = $this->generateFileName($validatedData['talentName'], $validatedData['talentExperience'], $validatedData['talentLevelId'], 'cv', $cv->extension());
            $cv->storeAs('cvs', $cvFileName);

            // Start a database transaction
            DB::beginTransaction();
            $uuid = Uuid::uuid4();
            // Create talent record
            $talent = Talent::create([
               //'talent_id' => $uuid,
                'talent_photo_filename' => $photoFileName,
                'talent_name' => $validatedData['talentName'],
                'talent_status_id' => $validatedData['talentStatusId'],
                'employee_number' => $validatedData['nip'],
                'sex' => $validatedData['sex'],
                'birth_date' => $validatedData['dob'],
                'talent_description' => $validatedData['talentDescription'],
                'talent_cv_filename' => $cvFileName,
                'experience' => $validatedData['talentExperience'],
                'talent_level_id' => $validatedData['talentLevelId'],
                'total_project_completed' => $validatedData['projectCompleted'],
                'email' => $validatedData['email'],
                'cellphone' => $validatedData['cellphone'],
                'employee_status_id' => $validatedData['employeeStatusId'],
                'talent_availability' => $validatedData['talentAvailability'],
                'biography_video_url' => $validatedData['videoUrl'],
            ]);

            // Attach positions to talent
            $talent->positions()->attach(
                collect($validatedData['position'])->pluck('positionId')->toArray()
            );

            // Attach skillsets to talent
            $talent->skillsets()->attach(
                collect($validatedData['skillSet'])->pluck('skillId')->toArray()
            );

            // Insert into talent_metadata table
            TalentMetadata::create([
                'talent_id' => $talent->talent_id,
                'profile_counter' => 0,
                'cv_counter' => 0,
            ]);

            // Commit the transaction
            DB::commit();

            // Return a success response
            return response()->json(['message' => 'Talent created successfully']);

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Return an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Helper function to generate file names
    private function generateFileName($talentName, $experience, $levelId, $type, $extension)
    {
        $timestamp = now()->timestamp;
        return "{$talentName}_{$experience}_{$levelId}_{$type}_{$timestamp}.{$extension}";
    }
}
