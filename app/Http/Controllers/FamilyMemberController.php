<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;

class FamilyMemberController extends Controller
{
    public function index()
    {
        $members = FamilyMember::with('family.creator')->get();   
        return view('family-members.index', compact('members'));
    }
}
