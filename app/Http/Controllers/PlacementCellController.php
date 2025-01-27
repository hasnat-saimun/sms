<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlacementCell;
use App\Models\NeedyStudent;
use File;

class PlacementCellController extends Controller
{

    public function placementCell(){
        $placement = PlacementCell::orderBy('id','DESC')->get();
        return view('academic.placementCell',['placement'=>$placement]);
    }

    public function needyStudentPanel(){
        $needy = PlacementCell::orderBy('id','DESC')->get();
        return view('academic.needyStudent',['needy'=>$needy]);
    }

    public function placementCellView(){
        return view('frontend.job.placementCell');
    }

    public function jobNeedyStudentView(){
        return view('frontend.job.jobNeedyStudent');
    }
}
