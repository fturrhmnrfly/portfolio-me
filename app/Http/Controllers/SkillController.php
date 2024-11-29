<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function skill(){
        $skills = Skill::all();
        return view('skill', compact('skills'));
    }
}
