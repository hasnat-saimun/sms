@extends('includePage')
@section('body')

<div class="container">
    <div class="row mb-4">
        <h4 class="text-uppercase">New admission entry</h4>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <form class="new-added-form" action="{{ route('updateAdmission') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="admissionId" value="{{$editData->id}}">
        <div class="row mb-2">
            <h5 class="fw-semibold">Personal Information</h5>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="fullName" class="form-label ">Full Name</label>
                <input type="text" class="form-control " id="fullName" name="fullName" placeholder="Enter student full name" required value="{{$editData->fullName}}">
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="lastName"class="form-label ">Sure Name </label>
                <input type="text" name="sureName" for="lase-name" placeholder="Enter student last name" class="form-control" id="lastName" require value="{{$editData->sureName}}">
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="fatherName"class="form-label ">Father's Name </label>
                <input type="text" name="fatherName" placeholder="Enter fathers name" class="form-control" id="fatherName"value="{{$editData->father}}">
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="mothername"  class="form-label ">Mother's Name </label>
                <input type="text" name="motherName" placeholder="Enter Mothers name" class="form-control" id="mothername"value="{{$editData->mother}}" required>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="gender" class="form-lavel">Gender </label>
                <select class="form-select" name="gender" aria-label="Default select example" required>
                    <option value="{{$editData->gender}}">{{$editData->gender}}</option> 
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="birthDate" class="form-lavel">Date Of Birth </label>
                <input type="date" name="dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                    data-position='bottom right' id="birthDate" class="form-confrol" required value="{{$editData->dob}}">
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="bloodgroup" class="form-lavel">Blood group </label>
                <select class="form-select" name="blGroup" id="bloodgroup" aria-label="Default select example"required >
                    <option value="{{$editData->blGroup}}">{{$editData->blGroup}}</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="regligion" class="form-lavel">regligion</label>
                <select class="form-select" name="religion" id="regligion" aria-label="Default select example"required>
                    <option value="{{$editData->religion}}">{{$editData->religion}}</option>
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Christian">Christian</option>
                    <option value="Buddish">Buddish</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="address" class="form-lavel">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Student full address" name="address" value="{{$editData->address}}" >
            </div>
        
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="email" class="form-lavel">E-Mail</label>
                <input type="email" name="mail" id="email" placeholder="Enter student email" class="form-control" value="{{$editData->mail}}">
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="phone" class="form-lavel">Phone</label>
                <input type="text" name="phone" placeholder="Enter gurdian mobile number" id="phone" class="form-control" value="{{$editData->phone}}" required>
            </div>
            
            <div class="col-xl-3 col-lg-6 col-12 form-group mg-t-30">
                <label for="image" class="text-dark-medium">Avatar (150px X 150px)</label>
                <input type="file" name="avatar" id="image"class="form-control-file" value="{{$editData->avatar}}">
            </div>
        </div>
        <div class="row mb-2 mt-5">
        <h5 class="fw-semibold">Academic Information</h5>
    </div>
        <div class="row ">
        @php 
            $sessionDetails = \App\Models\sessionManage::all();
            $sessionData  = \App\Models\sessionManage::find($editData->sessName);
            $classData  = \App\Models\classManage::find($editData->className);
            $sectionData  = \App\Models\sectionManage::find($editData->sectionName);
        @endphp
        <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="session" class="form-lavel">Session </label>
                <select name="sessName" class="form-control">
                    @if(!empty($sessionData))
                    <option value="{{$sessionData->id}}">{{$sessionData->session}}</option>
                    @endif
                        @if(!empty($sessionDetails) && count($sessionDetails)>0)
                        @foreach($sessionDetails as $sd)
                            <option value="{{ $sd->id }}">{{ $sd->session}}</option>
                            @endforeach
                        @endif
                </select>
                    
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="class" class="form-lavel">Class </label>
                <select  name="className" class="form-control" id="class">
                    @if(!empty($classData))
                    <option value="{{$classData->id}}">{{$classData->className}} </option>
                    
                    @endif
                        @if(!empty($classDetails) && count($classDetails)>0)
                            @foreach($classDetails as $cd)
                            <option value="{{ $cd->id }}">{{ $cd->className}}</option>
                            @endforeach
                        @endif
                </select>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="section">Section/Group </label>
                <select class="form-control" name="sectionName" id="section">
                    @if(!empty($sectionData))
                    <option value="{{$sectionData->id}}">{{$sectionData->section}} </option>
                    
                    @endif
                    @if(!empty($sectionDatails) && count($sectionDatails)>0)
                    @foreach($sectionDatails as $sec)
                    <option value="{{$sec->id}}">{{$sec->section}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="roll" class="form-lavel">Roll</label>
                <input type="text"  name="rollNumber" placeholder="Enter student class roll" id="roll" class="form-control" required value="{{$editData->rollNumber}}">
            </div>
        </div>

        <div class="row mb-2 mt-5">
        <h5 class="fw-semibold">Guardian Information</h5>
    </div>
        <div class="row "> 
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="G-name" class="form-label ">Guardian Name</label>
                <input type="text" class="form-control " id="G-name" name="gurdian" placeholder="Enter Guardian name" required value="{{$editData->gurdianName}}">
            </div>
            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="G-phone" class="form-lavel">Mobile No</label>
                <input type="text" name="gurdianPhone" placeholder="Enter gurdian mobile number" id="G-phone" class="form-control" required value="{{$editData->gurdianMobile}}">
            </div>

            <div class="col-xl-3 col-lg-6 col-12 form-group mb-3">
                <label for="relation" class="form-lavel">Relation</label>
                <select class="form-select" id="relation" aria-label="Default select example" name="relationWithStd" >
                    <option value="{{$editData->relationGurdian}}">{{$editData->relationGurdian}} </option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Brother">Brother</option>
                    <option value="Sister">Sister</option>
                    <option value="Uncle">Uncle</option>
                    <option value="Aunty">Aunty</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class=" col-12 mx-auto mb-5  gap-2 mt-5">
            <button class="btn btn-primary btn-color btn-sm" type="submit">Update</button>
            <button class="btn mx-2 btn-danger btn-color btn-sm" type="reset">Reset</button>
            <a href="{{route('studentList')}}"class="btn btn-success btn-color btn-sm">Back</a>
        </div>
        
    </form>
</div>

@endsection