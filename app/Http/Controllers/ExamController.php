<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    
    public function createExam(){
        return view('result.new-exam');
    }

    public function confirmExam(Request $requ){
        $chk = Exam::where(['examName'=>$requ->examName]);
        if($chk->exists()):
            return back()->with('error','Alias already exist');
        else:
            $exam = new Exam();
            $aliasCreate = str_replace(' ','_',$requ->examName);
            $alias = strtolower($aliasCreate);

            $exam->examName     = $requ->examName;
            $exam->className    = $requ->examClass;
            $exam->examDate     = $requ->examDate;
            $exam->closeDate    = $requ->closeDate;
            $exam->baseMark     = $requ->baseMark;
            $exam->alias        = $alias;
            $exam->save();
            return back()->with('success','Record successfully saved');
        endif;
    }

    public function allExam(){
        $itemData = Exam::orderBy('id','DESC')->get();
        return view('result.examList',['itemData'=>$itemData]);
    }
    
    public function editExam($item){
        $itemData = Exam::find($item);
        return view('result.edit-exam',['item'=>$itemData]);
    }
    

    public function updateExam(Request $requ){
        $exam = Exam::find($requ->itemId);
        if(!empty($exam) && $exam->exists()):
            $aliasCreate = str_replace(' ','_',$requ->examName);
            $alias = strtolower($aliasCreate);

            $exam->examName     = $requ->examName;
            $exam->className    = $requ->examClass;
            $exam->examDate     = $requ->examDate;
            $exam->closeDate    = $requ->closeDate;
            $exam->baseMark     = $requ->baseMark;
            $exam->alias        = $alias;
            $exam->save();
            return back()->with('success','Record successfully updated');
        else:
            return back()->with('error','No alias found for update');
        endif;
    }

    public function delExam($id){
        $itemData = Exam::find($id);
        if(empty($itemData)):
            return back()->with('error','Sorry! Alias failed to delete');
        else:
            $itemData->delete();
            return back()->with('success','Success! Alias successfully delete');
        endif;
    }
}
