<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\CultivationController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GradeListController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\MarksheetController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PlacementCellController;
use App\Http\Controllers\individualController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\admissionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\cashCalculasController;
use App\Http\Controllers\tuitionController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\cultivationAdmin;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\TrustHosts;
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\ValidateSignature;
use App\Http\Middleware\VerifyCsrfToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[
    FrontController::class,
    'homePage'
])->name('homePage');

//Result Part
Route::get('/cultivation/result',[
    BackofficeController::class,
    'resultPart'
])->name('resultPart');

Route::post('/cultivation/login/confirm',[
    FrontController::class ,
    'cultivationLogin'
])->name('cultivationLogin');
Route::get('/cultivation/login',[
    FrontController::class,
    'adminLogin'
])->name('adminLogin');
Route::get('/cultivation/logout',[
    FrontController::class,
    'adminLogout'
])->name('adminLogout');
Route::post('/cultivation/register',[
    FrontController::class ,
    'adminRegister'
])->name('adminRegister');

//Cultivation Part
Route::get('/cultivation/dashboard',[
    CultivationController::class,
    'cultivationIndex'
])->name('cultivationIndex');
Route::get('/cultivation/profile',[
    CultivationController::class,
    'adminProfile'
])->name('adminProfile');
Route::post('/cultivation/profile/save',[
    CultivationController::class ,
    'saveAdminProfile'
])->name('saveAdminProfile');
Route::post('/cultivation/profile/password/save',[
    CultivationController::class ,
    'changeAdminPassword'
])->name('changeAdminPassword');
Route::get('/cultivation/notice/list',[
    NoticeController::class ,
    'noticeList'
])->name('noticeList');
Route::get('/cultivation/notice/new',[
    NoticeController::class ,
    'newNotice'
])->name('newNotice');
Route::post('/cultivation/notice/save',[
    NoticeController::class ,
    'saveNotice'
])->name('saveNotice');
Route::get('/cultivation/notice/edit/{id}',[
    NoticeController::class ,
    'editNotice'
])->name('editNotice');
Route::post('/cultivation/notice/update',[
    NoticeController::class ,
    'updateNotice'
])->name('updateNotice');
Route::get('/cultivation/notice/delete/{id}',[
    NoticeController::class ,
    'delNotice'
])->name('delNotice');
Route::get('/cultivation/notice/preview/{id}',[
    NoticeController::class ,
    'prevNotice'
])->name('prevNotice');

//notice ends here

//Image str

Route::get('/cultivation/institute/photo/',[
    GalleryController::class,
    'newPhoto'
])->name('newPhoto');

Route::post('/cultivation/photo/save',[
    GalleryController::class ,
    'savePhoto'
])->name('savePhoto');

Route::get('/cultivation/photo/edit/{id}',[
    GalleryController::class ,
    'editPhoto'
])->name('editPhoto');

Route::get('/cultivation/photo/content/delete/{id}',[
    GalleryController::class ,
    'delPhotoContent'
])->name('delPhotoContent');

Route::get('/cultivation/photo/delete/{id}',[
    GalleryController::class ,
    'delPhoto'
])->name('delPhoto');

//image end

//video str

Route::get('/cultivation/institute/video/',[
    GalleryController::class,
    'newVideo'
])->name('newVideo');

Route::post('/cultivation/video/save',[
    GalleryController::class ,
    'saveVideo'
])->name('saveVideo');

Route::get('/cultivation/video/edit/{id}',[
    GalleryController::class ,
    'editVideo'
])->name('editVideo');

Route::get('/cultivation/video/content/delete/{id}',[
    GalleryController::class ,
    'delVideoContent'
])->name('delVideoContent');

Route::get('/cultivation/video/delete/{id}',[
    GalleryController::class ,
    'delVideo'
])->name('delVideo');

//video end

Route::get('/cultivation/institute/info/',[
    InstituteController::class,
    'insInfo'
])->name('insInfo');

Route::get('/cultivation/institute/info/img/del/{id}',[
    InstituteController::class ,
    'delHeroImg'
])->name('delHeroImg');

Route::post('/cultivation/institute/details/',[
    InstituteController::class ,
    'insDetails'
])->name('insDetails');

Route::get('/cultivation/institute/principal/speech',[
    InstituteController::class ,
    'principalSpeech'
])->name('principalSpeech');

Route::post('/cultivation/institute/principal/speech/save',[
    InstituteController::class ,
    'savePrincipalSpeech'
])->name('savePrincipalSpeech');

Route::get('/cultivation/institute/principal/exList',[
    InstituteController::class,
    'exPrincipal'
])->name('exPrincipal');

Route::post('/cultivation/institute/principal/exList/save',[
    InstituteController::class ,
    'saveExPrincipal'
])->name('saveExPrincipal');

Route::get('/cultivation/institute/principal/exList/edit/{id}',[
    InstituteController::class ,
    'editExPrincipal'
])->name('editExPrincipal');

Route::get('/cultivation/academic/exPlc/content/delete/{id}',[
    InstituteController::class ,
    'delexPlcCon'
])->name('delexPlcCon');
Route::get('/cultivation/institute/principal/exList/del/{id}',[
    InstituteController::class ,
    'delExPrincipal'
])->name('delExPrincipal');

Route::get('/cultivation/institute/committee/',[
    InstituteController::class ,
    'managingCommittee'
])->name('managingCommittee');

Route::post('/cultivation/institute/committee/save',[
    InstituteController::class ,
    'saveManagingCommittee'
])->name('saveManagingCommittee');

Route::get('/cultivation/institute/committee/edit/{id}',[
    InstituteController::class ,
    'editManagingCommittee'
])->name('editManagingCommittee');

Route::get('/cultivation/institute/committee/dlt/image/{id}',[
    InstituteController::class ,
    'delImgContent'
])->name('delImgContent');

Route::get('/cultivation/institute/committee/del/{id}',[
    InstituteController::class ,
    'delManagingCommittee'
])->name('delManagingCommittee');

// institute info ends here

Route::get('/cultivation/academic/syllabus/',[
    AcademicController::class ,
    'syllabusManage'
])->name('syllabusManage');

Route::post('/cultivation/academic/syllabus/save',[
    AcademicController::class ,
    'saveSyllabus'
])->name('saveSyllabus');

Route::get('/cultivation/academic/syllabus/edit/{id}',[
    AcademicController::class ,
    'editSyllabus'
])->name('editSyllabus');

Route::get('/cultivation/academic/syllabus/content/delete/{id}',[
    AcademicController::class ,
    'delSyllabusContent'
])->name('delSyllabusContent');

Route::get('/cultivation/academic/syllabus/del/{id}',[
    AcademicController::class ,
    'delSyllabus'
])->name('delSyllabus');


Route::get('/cultivation/academic/classRoutine/',[
    AcademicController::class ,
    'classRoutineManage'
])->name('classRoutineManage');

Route::post('/cultivation/academic/classRoutine/save',[
    AcademicController::class ,
    'saveClassRoutine'
])->name('saveClassRoutine');

Route::get('/cultivation/academic/classRoutine/edit/{id}',[
    AcademicController::class ,
    'editClassRoutine'
])->name('editClassRoutine');

Route::get('/cultivation/academic/classRoutine/del/{id}',[
    AcademicController::class ,
    'delClassRoutine'
])->name('delClassRoutine');

Route::get('/cultivation/academic/classRoutine/content/delete/{id}',[
    AcademicController::class ,
    'delClassRoutineContent'
])->name('delClassRoutineContent');

Route::get('/cultivation/academic/examRoutine/',[
    AcademicController::class ,
    'examRoutineManage'
])->name('examRoutineManage');

Route::post('/cultivation/academic/examRoutine/save',[
    AcademicController::class ,
    'saveExamRoutine'
])->name('saveExamRoutine');

Route::get('/cultivation/academic/examRoutine/edit/{id}',[
    AcademicController::class ,
    'editExamRoutine'
])->name('editExamRoutine');

Route::get('/cultivation/academic/examRoutine/del/{id}',[
    AcademicController::class ,
    'delExamRoutine'
])->name('delExamRoutine');

Route::get('/cultivation/academic/examRoutine/content/delete/{id}',[
    AcademicController::class ,
    'delExamRoutineContent'
])->name('delExamRoutineContent');

Route::get('/cultivation/academic/semisterPlan/',[
    AcademicController::class,
    'semisterPlanManage'
])->name('semisterPlanManage');

Route::post('/cultivation/academic/semisterPlan/save',[
    AcademicController::class ,
    'saveSemisterPlan'
])->name('saveSemisterPlan');

Route::get('/cultivation/academic/semisterPlan/edit/{id}',[
    AcademicController::class ,
    'editSemisterPlan'
])->name('editSemisterPlan');

Route::get('/cultivation/academic/semisterPlan/del/{id}',[
    AcademicController::class ,
    'delSemisterPlan'
])->name('delSemisterPlan');

Route::get('/cultivation/academic/semisterPlan/content/delete/{id}',[
    AcademicController::class ,
    'delSemisterPlanContent'
])->name('delSemisterPlanContent');

Route::get('/cultivation/placement/jobPlacement/',[
    PlacementCellController::class ,
    'placementCell'
])->name('placementCell');

Route::post('/cultivation/placement/placementCell/save',[
    PlacementCellController::class ,
    'savePlacementCell'
])->name('savePlacementCell');

Route::get('/cultivation/placement/placementCell/edit/{id}',[
    PlacementCellController::class ,
    'editPlc'
])->name('editPlc');


Route::get('/cultivation/academic/placementCell/content/delete/{id}',[
    PlacementCellController::class ,
    'delPlcCon'
])->name('delPlcCon');

Route::get('/cultivation/placement/placementCell/delete/{id}',[
    PlacementCellController::class ,
    'delPlc'
])->name('delPlc');

Route::get('/cultivation/placement/needyStudentPanel/',[
    PlacementCellController::class ,
    'needyStudentPanel'
])->name('needyStudentPanel');

Route::post('/cultivation/placement/needyStudentPanel/save',[
    PlacementCellController::class ,
    'saveNeedyStdPanel'
])->name('saveNeedyStdPanel');

Route::get('/cultivation/placement/needyStudentPanel/edit/{id}',[
    PlacementCellController::class ,
    'editNeedyStdPanel'
])->name('editNeedyStdPanel');


Route::get('/cultivation/academic/needyStudentPanel/photo/delete/{id}',[
    PlacementCellController::class ,
    'delNeedyStdPanelCon'
])->name('delNeedyStdPanelCon');
Route::get('/cultivation/academic/needyStudentPanel/documents/delete/{id}',[
    PlacementCellController::class ,
    'delNeedyStdPaneldoc'
])->name('delNeedyStdPaneldoc');

Route::get('/cultivation/placement/needyStudentPanel/delete/{id}',[
    PlacementCellController::class ,
    'delNeedyStdPanel'
])->name('delNeedyStdPanel');
//academic info ends here

//
Route::get('/cultivation/configuration',[
    CultivationController::class ,
    'serverConfig'
])->name('serverConfig');
Route::post('/cultivation/configuration/save',[
    CultivationController::class ,
    'saveConfig'
])->name('saveConfig');
Route::get('/cultivation/sign/del/{id}',[
    CultivationController::class ,
    'delSign'
])->name('delSign');
Route::post('/cultivation/sign/save',[
    CultivationController::class,
    'saveSign'
])->name('saveSign');
Route::get('/cultivation/logo/del/{id}',[
    CultivationController::class ,
    'delLogo'
])->name('delLogo');
Route::post('/cultivation/logo/save',[
    CultivationController::class ,
    'saveLogo'
])->name('saveLogo');
Route::get('/cultivation/favicon/del/{id}',[
    CultivationController::class ,
    'delFavicon'
])->name('delFavicon');
Route::post('/cultivation/favicon/save',[
    CultivationController::class ,
    'saveFavicon'
])->name('saveFavicon');
Route::get('/cultivation/avatar/del/{id}',[
    CultivationController::class ,
    'delAvatar'
])->name('delAvatar');
Route::post('/cultivation/avatar/save',[
    CultivationController::class ,
    'saveAvatar'
])->name('saveAvatar');

//Account Part
Route::get('/cultivation/account',[
    BackofficeController::class ,
    'accountPart'
])->name('accountPart');

//Fees str
Route::get('/add-fees',[
    individualController::class, //add Fees
    'feesForm'
])->name('feesForm');

Route::get('/edit-fees-data/{id}',[
    individualController::class, //edit Fees
    'editFees'
])->name('editFees');

Route::post('/update-fees',[
    individualController::class, //update Fees
    'updateFees'
])->name('updateFees');


Route::post('/save-fees',[
    individualController::class, //add Fees
    'saveFees'
])->name('saveFees');

Route::get('/delete-fees-data/{id}',[
    individualController::class,      // delete Fees
    'deleteFees'
])->name('deleteFees');

//Fees end

    //cashCalculas str
    Route::get('/cash-calculas-from',[
        cashCalculasController::class,    //cashCalculas main page
        'cashCalculasView'
    ])->name('cashCalculasView');

    Route::get('/get-report',[
        cashCalculasController::class,    //reportList page
        'reportListView'
    ])->name('reportListView');

    Route::get('/single-report/{id}',[
        cashCalculasController::class,    // report single page
        'singleView'
    ])->name('singleView');


    Route::post('/save-cash-calculas',[
        cashCalculasController::class,    //saveCashCalculas brackhand
        'saveCashCalculas'
    ])->name('saveCashCalculas');

    Route::get('/edit-cash-calculas/{id}',[
        cashCalculasController::class,     // edit calculas 
        'editCashCalculas'
    ])->name('editCashCalculas');

    Route::post('/update-cash-calculas',[
        cashCalculasController::class,   //update calculas
        'updateCashCalculas'
    ])->name('updateCashCalculas');

    Route::get('/delete-calculas-data/{id}',[
        cashCalculasController::class,      // delete calculas
        'dltCalculasData'
    ])->name('dltCalculasData');

    Route::get('/calculas-repot-generate/{id}',[
        cashCalculasController::class,   // calculas Report
        'cashReport'
    ])->name('cashReport');

    Route::get('/calculas-date-repot-generate',[
        cashCalculasController::class,   // calculas Report
        'cashDateReport'
    ])->name('cashDateReport');

    Route::post('/calculas-date-repot-recipit',[
        cashCalculasController::class, //  free
        'getCashReport'
    ])->name('getCashReport');
    //cashCalculas end

     //Tuition str
     Route::get('/getStudentForTutionFee/{stdId}',[
        tuitionController::class,
        'getStudentForTutionFee'
    ])->name('getStudentForTutionFee');

    Route::get('/add-tuition-fee',[
        tuitionController::class,   //add tuition free
        'tuitionFee'
    ])->name('tuitionFee');

    Route::post('/save-tuition-fee',[
        tuitionController::class,
        'saveTuitionfee'
    ])->name('saveTuitionfee');

    Route::get('/tuition-fee-list',[
        tuitionController::class,   // tuition free list
        'tuitionFeeList'
    ])->name('tuitionFeeList');

    Route::get('/tuition-fee-view/{id}',[
        tuitionController::class,   // tuition free view
        'tuitionFeeView'
    ])->name('tuitionFeeView');

    Route::get('/edit-tuition-fee/{id}',[
        tuitionController::class, //edit tuition free
        'editTuitionFee'
    ])->name('editTuitionFee');

    Route::post('/update-tuition-fee',[
        tuitionController::class, //update tuition free
        'updateTuitionFee'
    ])->name('updateTuitionFee');

    Route::get('/delete-tuition-fee/{id}',[
        tuitionController::class,      // delete tuition free
        'dltTuitionFee'
    ])->name('dltTuitionFee');

    Route::get('/tuition-repot-generate/{id}',[
        tuitionController::class,   // tuition free tuitionReport
        'tuitionReport'
    ])->name('tuitionReport');

    Route::get('/student/fees/generate',[
        tuitionController::class, //edit Fees
        'feesReport'
    ])->name('feesReport');

    Route::post('/student/fees/generate/report',[
        tuitionController::class, //update tuition free
        'getFeesReport'
    ])->name('getFeesReport');
    //Tuition end

//Account part end

//Academic Part
Route::get('/cultivation/academic',[
    BackofficeController::class ,
    'index'
])->name('academicPart');
//Student route declaration
Route::get('/cultivation/student/admit',[
    admissionController::class ,
    'admitStudent'
])->name('admitStudent');
Route::post('/cultivation/student/admit/confirm',[
    admissionController::class ,
    'confirmAdmit'
])->name('confirmAdmit');
Route::get('/cultivation/student/edit/{stdId}',[
    admissionController::class ,
    'editStudent'
])->name('editStudent');
Route::post('/cultivation/student/edit/confirm',[
    admissionController::class ,
    'updateAdmit'
])->name('updateAdmit');


Route::post('/student/photo/update',[
    admissionController::class ,
    'stdPhotoUpdate'
])->name('stdPhotoUpdate');


Route::get('/cultivation/teacher/del/avatar/{stdId}',[
    admissionController::class ,
    'delStudentPhoto'
])->name('delStudentPhoto');

Route::get('/cultivation/student/del/{stdId}',[
    admissionController::class ,
    'delStudent'
])->name('delStudent');

Route::get('/cultivation/student/del/avatar/{stdId}',[
    admissionController::class ,
    'delStdAvatar'
])->name('delStdAvatar');

Route::get('/cultivation/student/list',[
    admissionController::class,
    'studentList'
])->name('studentList');

Route::get('/cultivation/student/idCard/{stdId}',[
    admissionController::class ,
    'stdIdCard'
])->name('stdIdCard');
Route::get('/cultivation/student/promotion',[
    admissionController::class ,
    'studentPromotion'
])->name('studentPromotion');

//Teacher route declaration

Route::get('/cultivation/teacher/admit',[
    TeacherController::class ,
    'addTeacher'
])->name('addTeacher');
Route::post('/cultivation/teacher/admit/confirm',[
    TeacherController::class ,
    'confirmTeacher'
])->name('confirmTeacher');
Route::get('/cultivation/teacher/edit/{profileId}',[
    TeacherController::class ,
    'editTeacher'
])->name('editTeacher');
Route::post('/cultivation/teacher/edit/confirm',[
    TeacherController::class ,
    'updateTeacher'
])->name('updateTeacher');
Route::get('/cultivation/teacher/del/{profileId}',[
    TeacherController::class ,
    'delTeacher'
])->name('delTeacher');
Route::get('/cultivation/teacher/del/avatar/{profileId}',[
    TeacherController::class ,
    'delTeacherPhoto'
])->name('delTeacherPhoto');

Route::get('/cultivation/teacher/list',[
    TeacherController::class ,
    'teacherList'
])->name('teacherList');

//Teacher route declaration

Route::get('/cultivation/staff/admit',[
    StaffController::class ,
    'addStaff'
])->name('addStaff');
Route::post('/cultivation/staff/admit/confirm',[
    StaffController::class ,
    'confirmStaff'
])->name('confirmStaff');
Route::get('/cultivation/staff/edit/{profileId}',[
    StaffController::class ,
    'editStaff'
])->name('editStaff');
Route::post('/cultivation/staff/edit/confirm',[
    StaffController::class ,
    'updateStaff'
])->name('updateStaff');
Route::get('/cultivation/staff/del/{profileId}',[
    StaffController::class ,
    'delStaff'
])->name('delStaff');
Route::get('/cultivation/staff/del/avatar/{profileId}',[
    StaffController::class ,
    'delStaffPhoto'
])->name('delStaffPhoto');

Route::get('/cultivation/staff/list',[
    StaffController::class ,
    'staffList'
])->name('staffList');


//Classes route declaration

Route::get('/cultivation/class/create',[
    individualController::class ,
    'createClass'
])->name('createClass');
Route::post('/cultivation/class/create/confirm',[
    individualController::class ,
    'confirmClass'
])->name('confirmClass');
Route::get('/cultivation/class/edit/{itemId}',[
    individualController::class ,
    ''
])->name('editClass');
Route::post('/cultivation/class/edit/confirm',[
    individualController::class ,
    'updateClass'
])->name('updateClass');
Route::get('/cultivation/class/del/{itemId}',[
    individualController::class ,
    'delClass'
])->name('delClass');

Route::get('/cultivation/class/list',[
    individualController::class ,
    'allClasses'
])->name('allClasses');


//Department route declaration

Route::get('/cultivation/department/create',[
    individualController::class ,
    'createDepartment'
])->name('createDepartment');
Route::post('/cultivation/department/create/confirm',[
    individualController::class ,
    'confirmDepartment'
])->name('confirmDepartment');
Route::get('/cultivation/department/edit/{itemId}',[
    individualController::class ,
    'editDepartment'
])->name('editDepartment');
Route::post('/cultivation/department/edit/confirm',[
    individualController::class ,
    'updateDepartment'
])->name('updateDepartment');
Route::get('/cultivation/department/del/{itemId}',[
    individualController::class ,
    'delDepartment'
])->name('delDepartment');

Route::get('/cultivation/department/list',[
    individualController::class ,
    'allDepartment'
])->name('allDepartment');

//Session route declaration

Route::get('/cultivation/session/create',[
    individualController::class ,
    'createSession'
])->name('createSession');
Route::post('/cultivation/session/create/confirm',[
    individualController::class ,
    'confirmSession'
])->name('confirmSession');
Route::get('/cultivation/session/edit/{itemId}',[
    individualController::class ,
    'editSession'
])->name('editSession');
Route::post('/cultivation/session/edit/confirm',[
    individualController::class ,
    'updateSession'
])->name('updateSession');
Route::get('/cultivation/session/del/{itemId}',[
    individualController::class ,
    'delSession'
])->name('delSession');

Route::get('/cultivation/session/list',[
    individualController::class ,
    'allSession'
])->name('allSession');

//Subject route declaration

Route::get('/cultivation/subject/create',[
    SubjectController::class ,
    'createSubject'
])->name('createSubject');
Route::post('/cultivation/subject/create/confirm',[
    SubjectController::class ,
    'confirmSubject'
])->name('confirmSubject');
Route::get('/cultivation/subject/edit/{itemId}',[
    SubjectController::class ,
    'editSubject'
])->name('editSubject');
Route::post('/cultivation/subject/edit/confirm',[
    SubjectController::class ,
    'updateSubject'
])->name('updateSubject');
Route::get('/cultivation/subject/del/{itemId}',[
    SubjectController::class ,
    'delSubject'
])->name('delSubject');

Route::get('/cultivation/subject/list',[
    SubjectController::class,
    'allSubject'
])->name('allSubject');


//Exam route declaration

Route::get('/cultivation/exam/create',[
    ExamController::class ,
    'createExam'
])->name('createExam');
Route::post('/cultivation/exam/create/confirm',[
    ExamController::class ,
    'confirmExam'
])->name('confirmExam');
Route::get('/cultivation/exam/edit/{itemId}',[
    ExamController::class ,
    'editExam'
])->name('editExam');
Route::post('/cultivation/exam/edit/confirm',[
    ExamController::class ,
    'updateExam'
])->name('updateExam');
Route::get('/cultivation/exam/del/{itemId}',[
    ExamController::class ,
    'delExam'
])->name('delExam');

Route::get('/cultivation/exam/list',[
    ExamController::class ,
    'allExam'
])->name('allExam');


//Marks route declaration

Route::get('/cultivation/marks/add',[
    MarksheetController::class ,
    'addMarks'
])->name('addMarks');
Route::post('/cultivation/marks/add/getData',[
    MarksheetController::class ,
    'getMarks'
])->name('getMarks');
Route::post('/cultivation/marks/add/confirm',[
    MarksheetController::class ,
    'confirmMarks'
])->name('confirmMarks');

Route::get('/cultivation/marksheet/create',[
    MarksheetController::class ,
    'createMarksheet'
])->name('createMarksheet');

Route::post('/cultivation/marksheet/generate',[
    MarksheetController::class ,
    'generateMarksheet'
])->name('generateMarksheet');


//Admit Card route declaration

Route::get('/admit/card/creation',[
    ExamController::class ,
    'admitCard'
])->name('admitCard');
Route::post('/admit/card/getData',[
    ExamController::class ,
    'getAdmitCard'
])->name('getAdmitCard');

Route::get('/admit/card/print/',[
    ExamController::class ,
    'printAdmitCard'
])->name('printAdmitCard');

//grade route declaration

Route::get('/cultivation/grade/create',[
    GradeListController::class ,
    'createGrade'
])->name('createGrade');
Route::post('/cultivation/grade/create/confirm',[
    GradeListController::class ,
    'confirmGrade'
])->name('confirmGrade');
Route::get('/cultivation/grade/edit/{itemId}',[
    GradeListController::class ,
    'editGrade'
])->name('editGrade');
Route::post('/cultivation/grade/edit/confirm',[
    GradeListController::class ,
    'updateGrade'
])->name('updateGrade');
Route::get('/cultivation/grade/del/{itemId}',[
    GradeListController::class ,
    'delGrade'
])->name('delGrade');

Route::get('/cultivation/grade/list',[
    GradeListController::class ,
    'allGrade'
])->name('allGrade');

// web font str 

//academic str
    Route::get('/syllabus',[
        AcademicController::class ,
        'newSyllabus'
    ])->name('newSyllabus');

    Route::get('/class/schedule',[
        AcademicController::class ,
        'newClassSchedule'
    ])->name('newClassSchedule');

    Route::get('/exam/schedule',[
        AcademicController::class,
        'newExamSchedule'
    ])->name('newExamSchedule');

    Route::get('/semister/plan',[
        AcademicController::class,
        'newSemister'
    ])->name('newSemister');
//academic end

//MarksheetController str
    Route::get('/internal/result',[
        MarksheetController::class,
        'internalResult'
    ])->name('internalResult');

    Route::get('/individual/result',[
        MarksheetController::class,
        'individualResult'
    ])->name('individualResult');
//MarksheetController end

//PlacementCellController str
    Route::get('/job/placement-cell',[
        PlacementCellController::class,
        'placementCellView'
    ])->name('placementCellView');

    Route::get('/job/needy-student',[
        PlacementCellController::class,
        'jobNeedyStudentView'
    ])->name('jobNeedyStudentView');
//PlacementCellController end

//GalleryController str
    Route::get('/video/gallary',[
        GalleryController::class,
        'videoPage'
    ])->name('videoPage');

    Route::get('/image/gallary',[
        GalleryController::class,
        'imagePage'
    ])->name('imagePage');
//GalleryController end

//InstituteController str
    Route::get('/about-us',[
    InstituteController::class,
    'institutePage'
    ])->name('institutePage');

    Route::get('/principal-speech',[
        InstituteController::class,
        'principalSpeechPage'
        ])->name('principalSpeechPage');

    Route::get('/exPrincipal',[
        InstituteController::class,
        'exprincipalPage'
        ])->name('exprincipalPage');

    Route::get('/our-teacher',[
        InstituteController::class,
        'teacherPage'
        ])->name('teacherPage');

    Route::get('/our-staff',[
        InstituteController::class,
        'staffPage'
        ])->name('staffPage');

    Route::get('/our-comittee',[
        InstituteController::class,
        'comitteePage'
        ])->name('comitteePage');
        

    Route::get('/contact-us',[
        InstituteController::class,
        'supportPage'
    ])->name('supportPage');

//InstituteController str

//web font end



