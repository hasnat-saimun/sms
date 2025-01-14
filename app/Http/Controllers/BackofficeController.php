<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentManagement;
use App\Models\StaffManagement;
use App\Models\TeacherManagement;
use App\Models\CultivationAdmin;
use Hash;
use sessionData;

class BackofficeController extends Controller
{
    //cultivation controller goes here
    public function index(){
        $stdData = StudentManagement::all();
        return view('academic.index',['studentData'=>$stdData]);
    }
    
    public function resultPart(){
        return view('result.index');
    }
}
