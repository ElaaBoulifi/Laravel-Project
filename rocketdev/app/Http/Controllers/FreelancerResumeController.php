<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FreelancerResume;
use App\Models\FreelancerEducation;
use App\Models\FreelancerWorkExperience;
use App\Models\FreelancerSkill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\YourEmailMailable; 
class FreelancerResumeController extends Controller
{
    public function index()
    {
        $resumes = FreelancerResume::all();
        return view('freelancer-resumes.index', compact('resumes'));
    }

    public function list()
    {
        $resumes = FreelancerResume::orderBy('id', 'desc')->get();
        return view('freelancer-resumes.list', compact('resumes'));
    }

    public function create()
    {
        $userId = Auth::user()->id;
        $existingResume = FreelancerResume::where('user_id', $userId)->first();
    
        // Fetch work experiences and skills for the specific resume
        $workExperiences = [];
        $skills = [];
    
        if ($existingResume) {
            $resumeId = $existingResume->id;
            $workExperiences = FreelancerWorkExperience::where('freelancer_resume_id', $resumeId)->get();
            $skills = FreelancerSkill::where('freelancer_resume_id', $resumeId)->get();
        }
    
        return view('freelancer-resumes.create', compact('existingResume', 'workExperiences', 'skills'));
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
         $existingResume = FreelancerResume::where('user_id', $userId)->first();
         if ($existingResume) {
            // Update the existing resume with the new data
            $existingResume->update([
                'Name' => $request->input('Name'),
                'Email' => $request->input('Email'),
                'Profession_Title' => $request->input('Profession_Title'),
                'Location' => $request->input('Location'),
                'Web' => $request->input('Web'),
                'Pre_Hour' => $request->input('Per_Hour'),
                'Age' => $request->input('Age'),
            ]);
        
            // Handle other data updates (education, work experience, skills, and PDF)
            // ...
        
            return redirect()->back()->with('success', 'Freelancer resume has been updated successfully.');
        }else{      $freelancerResume = new FreelancerResume();
            $freelancerResume->Name = $request->input('Name');
            $freelancerResume->user_id = $userId = Auth::user()->id;
            $freelancerResume->Email = $request->input('Email');
            $freelancerResume->Profession_Title = $request->input('Profession_Title');
            $freelancerResume->Location = $request->input('Location');
            $freelancerResume->Web = $request->input('Web');
            $freelancerResume->Pre_Hour = $request->input('Per_Hour');
            $freelancerResume->Age = $request->input('Age');
        
            // Save the basic information
            $freelancerResume->save();
        
            if ($request->has('education')) {
                    // Example for storing education records:
                        foreach ($request->input('education') as $educationData) {
                            $education = new FreelancerEducation();
                            
                            // Check if the required fields exist
                            if (isset($educationData['degree']) && isset($educationData['field_of_study'])) {
                                $education->degree = $educationData['degree'];
                                $education->field_of_study = $educationData['field_of_study'];
                    
                                // Check if other fields exist and set them accordingly
                                if (isset($educationData['school'])) {
                                    $education->school = $educationData['school'];
                                }
                    
                                if (isset($educationData['from'])) {
                                    $education->from = $educationData['from'];
                                }
                    
                                if (isset($educationData['to'])) {
                                    $education->to = $educationData['to'];
                                }
                    
                                if (isset($educationData['description'])) {
                                    $education->description = $educationData['description'];
                                }
                                
                                
                                $freelancerResume->educations()->save($education);
                            } else {
                                // Handle missing required fields for education record
                            }
                        }
                    }
           
            
                    if ($request->hasFile('resume_pdf')) {
                        $user_id = Auth::user()->id;
                        $file = $request->file('resume_pdf');
                        $fileName = 'resume_' . $user_id . '.pdf';
                        Log::info('File name: ' . $fileName);
                        // Check if a file with the same name exists and delete it
                        if (Storage::disk('public')->exists($fileName)) {
                            Storage::disk('public')->delete($fileName);
                        }
                
                        // Store the uploaded PDF file
                        Storage::disk('public')->put($fileName, file_get_contents($file));
                        
                        // You can save the file name in your database if needed
                        $freelancerResume->pdf_filename = $fileName;
                        $freelancerResume->save();
                    }
                    
                
            
          
                        if ($request->has('work_experience')) {
                foreach ($request->input('work_experience') as $workExperienceData) {
                    $workExperience = new FreelancerWorkExperience();
                    
                    // Assuming "company_name" and "title" are required fields
                    $workExperience->company_name = $workExperienceData['company_name'];
                    $workExperience->title = $workExperienceData['title'];
            
                    // Check if other fields exist and set them accordingly
                    if (isset($workExperienceData['date_from'])) {
                        $workExperience->date_from = $workExperienceData['date_from'];
                    }
            
                    if (isset($workExperienceData['date_to'])) {
                        $workExperience->date_to = $workExperienceData['date_to'];
                    }
            
                    if (isset($workExperienceData['description'])) {
                        $workExperience->description = $workExperienceData['description'];
                    }
            
                    $freelancerResume->workExperience()->save($workExperience);
                }
            } 
            
            if ($request->has('skills')) {
                // Example for storing skills records:
                foreach ($request->input('skills.Skill_name') as $index => $skillName) {
                    $skill = new FreelancerSkill();
                    $skill->Skill_Name = $skillName;
                    
                    // Check if there's a corresponding proficiency value
                    if (isset($request->input('skills.skill_proficiency')[$index])) {
                        $skill->proficiency = $request->input('skills.skill_proficiency')[$index];
                    } else {
                        // Handle the case where proficiency is missing or not provided
                        // You can set a default value or handle it as needed
                        $skill->proficiency = null; // Set a default value or handle as needed
                    }
                
                    $freelancerResume->skills()->save($skill);
                }}
        // Create a new freelancer resume record and store it in the database
  
        } 
        
        
        
        //dd($request->all());
        // Redirect back with a success message or to a different page
        return redirect()->back()->with('success', 'Freelancer resume has been saved successfully.');
    }


    public function show($id)
    {
        $resume = FreelancerResume::findOrFail($id);
        return view('freelancer-resumes.show', compact('resume'));
    }

    public function edit($id)
    {
        $resume = FreelancerResume::findOrFail($id);
        return view('freelancer-resumes.edit', compact('resume'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            // Add more validation rules for other fields
        ]);

        $resume = FreelancerResume::findOrFail($id);
        $resume->update($request->all());

        return redirect('/freelancer-resumes')->with('success', 'Resume updated successfully!');
    }

    public function destroy($id)
    {
        $resume = FreelancerResume::findOrFail($id);
        $resume->delete();

        return redirect('/freelancer-resumes')->with('success', 'Resume deleted successfully!');
    }
    public function downloadCv($filename)
    {
        $filename = '60555636.pdf'; // Replace with your actual file name
        $path = storage_path('app/public/' . $filename);
    
        $headers = [
            'Content-Type' => 'application/pdf', // Specify the MIME type here
        ];
    
        return Response::download($path, $filename, $headers);
    }


    public function sendEmail(Request $request)
{
    // Validate the request if needed

    $data = [
        // Data to pass to the email template
    ];

    Mail::to('oz.oussema@gmail.com')->send(new YourEmailMailable($data));

    return response()->json(['message' => 'Email sent successfully']);
}

}
