<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'skills' => Skill::orderBy('sort_order')->get(),
            'experiences' => Experience::orderBy('sort_order')->get(),
            'projects' => Project::orderBy('sort_order')->get(),
            'certifications' => Certification::orderBy('sort_order')->get(),
        ]);
    }
}
