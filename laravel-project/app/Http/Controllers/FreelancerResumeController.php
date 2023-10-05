<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FreelancerResume;

class FreelancerResumeController extends Controller
{
    public function index()
    {
        $resumes = FreelancerResume::all();
        return view('freelancer-resumes.index', compact('resumes'));
    }

    public function create()
    {
        return view('freelancer-resumes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|email',
            // Add more validation rules for other fields
        ]);

        FreelancerResume::create($request->all());

        return redirect('/freelancer-resumes')->with('success', 'Resume created successfully!');
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
}
