<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstituteDetails;
use App\Models\PrincipalSpeech;
use App\Models\ExPrincipal;
use App\Models\ManagingComittee;

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

    public function delManagingComittee($id){
        $committee = ManagingComittee::find($id);
        if($committee->delete()):
            return back()->with('success','Congrats! Data delete successfully');
        else:
            return back()->with('error','Sorry! Data failed to delete. Please try later');
        endif;
    }
}
