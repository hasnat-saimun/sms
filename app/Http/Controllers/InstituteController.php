<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstituteDetails;
use App\Models\PrincipalSpeech;
use App\Models\ExPrincipal;
use App\Models\ManagingComittee;
use App\Models\TeacherManagement;
use App\Models\StaffManagement;
use File;

class InstituteController extends Controller
{
    

    public function insInfo(){
        return view('academic.instituteInfo');
    }

    public function insDetails(Request $requ){
        if(!empty($requ->pageId)):
            $institute = InstituteDetails::find($requ->pageId);
        else:
            $institute = new InstituteDetails();
        endif;

        $institute->insHeadline     = $requ->insHeadline;
        $institute->insDetails      = $requ->insDetails;
        $institute->establishDate   = $requ->establishDate;
        $institute->landSize        = $requ->landSize;
        $institute->mission         = $requ->ourMission;
        $institute->vision          = $requ->ourVision;
        
        if(!empty($requ->heroImg)):
            $heroImg        = $requ->heroImg;
            $newheroImg     = rand().date('Ymd').'.'.$heroImg->getClientOriginalExtension();
            $heroImg->move(public_path('upload/image/cultivation'),$newheroImg);
            $institute->heroImg      = $newheroImg;
        endif;

        if($institute->save()):
            return back()->with('success','Congrats! Data saved successfully');
        else:
            return back()->with('error','Sorry! Data failed to save. Please try later');
        endif;
    }

    public function principalSpeech(){
        return view('academic.principalSpeech');
    }

    public function savePrincipalSpeech(Request $requ){
        if(!empty($requ->speechId)):
            $speech = PrincipalSpeech::find($requ->speechId);
        else:
            $speech = new PrincipalSpeech();
        endif;

        $speech->importantSpeech        = $requ->importantSpeech;
        $speech->generalSpeech          = $requ->generalSpeech;
        if($speech->save()):
            return back()->with('success','Congrats! Data saved successfully');
        else:
            return back()->with('error','Sorry! Data failed to save. Please try later');
        endif;
    }

    //ex principal
    public function editExPrincipal($id){
        return view('academic.exPrincipal',['exId'=>$id]);
    }

    public function exPrincipal(){
        return view('academic.exPrincipal');
    }

    public function saveExPrincipal(Request $requ){
        if(empty($requ->explId)):
            $exPrincipal = new ExPrincipal();
        else:
            $exPrincipal = ExPrincipal::find($requ->explId);
        endif;

        $exPrincipal->fullName      = $requ->fullName;
        $exPrincipal->mobile        = $requ->mobileNumber;
        $exPrincipal->email         = $requ->emailAddress;
        $exPrincipal->startFrom     = $requ->joinDate;
        $exPrincipal->endTo         = $requ->exitDate;
        $exPrincipal->designation   = $requ->designation;
        if($exPrincipal->save()):
            return back()->with('success','Congrats! Data saved successfully');
        else:
            return back()->with('error','Sorry! Data failed to save. Please try later');
        endif;
    }

    public function delExPrincipal($id){
        $exPrincipal = ExPrincipal::find($id);
        if($exPrincipal->delete()):
            return back()->with('success','Congrats! Data delete successfully');
        else:
            return back()->with('error','Sorry! Data failed to delete. Please try later');
        endif;
    }

    //committee
    public function editManagingCommittee($id){
        return view('academic.managingCommittee',['commId'=>$id]);
    }

    public function managingCommittee(){
        return view('academic.managingCommittee');
    }

    public function saveManagingCommittee(Request $requ){
        if(empty($requ->proId)):
            $committee = new ManagingComittee();
        else:
            $committee = ManagingComittee::find($requ->proId);
        endif;

        $committee->fullName        = $requ->fullName;
        $committee->mobile          = $requ->mobileNumber;
        $committee->email           = $requ->emailAddress;
        $committee->qualification   = $requ->qualification;
        $committee->jobDetails      = $requ->jobDetails;
        $committee->designation     = $requ->designation;
        $committee->address         = $requ->address;
        $committee->validYear       = $requ->validYear;
        $committee->status          = "Active";
        
        if(!empty($requ->avatar)):
            $avatar        = $requ->avatar;
            $newAvatar     = rand().date('Ymd').'.'.$avatar->getClientOriginalExtension();
            $avatar->move(public_path('upload/image/cultivation'),$newAvatar);
            $committee->avatar      = $newAvatar;
        endif;

        if($committee->save()):
            return back()->with('success','Congrats! Data saved successfully');
        else:
            return back()->with('error','Sorry! Data failed to save. Please try later');
        endif;
    }

    public function delImgContent($id){
        $item = ManagingComittee::find($id);
        // return public_path('upload/image/cultivation/syllabus/').$item->attachment;
        if(!empty($item)):
            if(File::exists(public_path('upload/image/cultivation/').$item->avatar)):
                File::delete(public_path('upload/image/cultivation/').$item->avatar);
            endif;
            $item->avatar = NULL;
            $item->save();
            return back()->with('success','Item deleted successfully');
        else:
            return back()->with('success','Item failed to delete');
        endif;
    }

    public function delManagingCommittee($id){
        $committee = ManagingComittee::find($id);
        if($committee->delete()):
            return back()->with('success','Congrats! Data delete successfully');
        else:
            return back()->with('error','Sorry! Data failed to delete. Please try later');
        endif;
    }

    //web support
    public function supportPage(){
        return view('frontend.support');
    }

    //institute info
    public function institutePage(){
        $syllabus  =   InstituteDetails::all();
        return view('frontend.institute.instituteInfo',['Datakey'=>$syllabus]);
    }
    //principalSpeech
    public function principalSpeechPage(){
        $syllabus  =   PrincipalSpeech::all();
        return view('frontend.institute.principalSpeech',['Datakey'=>$syllabus]);
    }
    //X-principal
    public function exprincipalPage(){
        $syllabus  =   ExPrincipal::all();
        return view('frontend.institute.exprincipal',['Datakey'=>$syllabus]);
    }

    //teacher list page
    public function teacherPage(){
        $syllabus  =   TeacherManagement::all();
        return view('frontend.institute.teachers',['Datakey'=>$syllabus]);
    }

    //staff list page
    public function staffPage(){
        $syllabus  =   StaffManagement::all();
        return view('frontend.institute.staff',['Datakey'=>$syllabus]);
    }

    //comittee list page
    public function comitteePage(){
        $syllabus  =   ManagingComittee::all();
        return view('frontend.institute.comittee',['Datakey'=>$syllabus]);
    }
}
