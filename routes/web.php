<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackofficeController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CultivationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GradeListController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\MarksheetController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PlacementCellController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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

Route::get('/', function () {
    return view('frontend.index');
});

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

Route::get('/cultivation/placement/placementCell/edit/{id}',[
    PlacementCellController::class ,
    'editPlc'
])->name('editPlc');

Route::get('/cultivation/placement/placementCell/delete/{id}',[
    PlacementCellController::class ,
    'delPlc'
])->name('delPlc');

Route::post('/cultivation/placement/placementCell/save',[
    PlacementCellController::class ,
    'savePlacementCell'
])->name('savePlacementCell');

Route::get('/cultivation/placement/needyStudentPanel/',[
    PlacementCellController::class ,
    'needyStudentPanel'
])->name('needyStudentPanel');
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

//Academic Part
Route::get('/cultivation/academic',[
    BackofficeController::class ,
    'academicPart'
])->name('academicPart');
//Student route declaration
Route::get('/cultivation/student/admit',[
    StudentController::class ,
    'admitStudent'
])->name('admitStudent');
Route::post('/cultivation/student/admit/confirm',[
    StudentController::class ,
    'confirmAdmit'
])->name('confirmAdmit');
Route::get('/cultivation/student/edit/{stdId}',[
    StudentController::class ,
    'editStudent'
])->name('editStudent');
Route::post('/cultivation/student/edit/confirm',[
    StudentController::class ,
    'updateAdmit'
])->name('updateAdmit');
Route::get('/cultivation/student/del/{stdId}',[
    StudentController::class ,
    'delStudent'
])->name('delStudent');
Route::get('/cultivation/student/del/avatar/{stdId}',[
    StudentController::class ,
    'delStudent'
])->name('');

Route::get('/cultivation/student/list',[
    StudentController::class ,
    'studentList'
])->name('studentList');

Route::get('/cultivation/student/idCard/{stdId}',[
    StudentController::class ,
    'stdIdCard'
])->name('stdIdCard');
Route::get('/cultivation/student/promotion',[
    StudentController::class ,
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
    ClassController::class ,
    'createClass'
])->name('createClass');
Route::post('/cultivation/class/create/confirm',[
    ClassController::class ,
    'confirmClass'
])->name('confirmClass');
Route::get('/cultivation/class/edit/{itemId}',[
    ClassController::class ,
    ''
])->name('editClass');
Route::post('/cultivation/class/edit/confirm',[
    ClassController::class ,
    'updateClass'
])->name('updateClass');
Route::get('/cultivation/class/del/{itemId}',[
    ClassController::class ,
    'delClass'
])->name('delClass');

Route::get('/cultivation/class/list',[
    ClassController::class ,
    'allClasses'
])->name('allClasses');


//Department route declaration

Route::get('/cultivation/department/create',[
    DepartmentController::class ,
    'createDepartment'
])->name('createDepartment');
Route::post('/cultivation/department/create/confirm',[
    DepartmentController::class ,
    'confirmDepartment'
])->name('confirmDepartment');
Route::get('/cultivation/department/edit/{itemId}',[
    DepartmentController::class ,
    'editDepartment'
])->name('editDepartment');
Route::post('/cultivation/department/edit/confirm',[
    DepartmentController::class ,
    'updateDepartment'
])->name('updateDepartment');
Route::get('/cultivation/department/del/{itemId}',[
    DepartmentController::class ,
    'delDepartment'
])->name('delDepartment');

Route::get('/cultivation/department/list',[
    DepartmentController::class ,
    'allDepartment'
])->name('allDepartment');

//Session route declaration

Route::get('/cultivation/session/create',[
    SessionController::class ,
    'createSession'
])->name('createSession');
Route::post('/cultivation/session/create/confirm',[
    SessionController::class ,
    'confirmSession'
])->name('confirmSession');
Route::get('/cultivation/session/edit/{itemId}',[
    SessionController::class ,
    'editSession'
])->name('editSession');
Route::post('/cultivation/session/edit/confirm',[
    SessionController::class ,
    'updateSession'
])->name('updateSession');
Route::get('/cultivation/session/del/{itemId}',[
    SessionController::class ,
    'delSession'
])->name('delSession');

Route::get('/cultivation/session/list',[
    SessionController::class ,
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



