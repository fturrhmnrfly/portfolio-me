<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificates;
use App\Models\Contact;

class HomeController extends Controller
{
    public function home(){
        $skill = Skill::all();
        $project = Project::all();
        $certificates = Certificates::all();
        $contact = Contact::all();
        return view('index', compact('skill', 'project', 'certificates', 'contact'));
    }
}
