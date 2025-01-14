@extends('cultivation.include')
@section('backTitle')
New Admission
@endsection
@section('backIndex')
@php
    $serverData = \App\Models\ServerConfig::orderBy('id','DESC')->limit(1)->first();
    if(!empty($serverData)):
        $serverId           = $serverData->id;
        $insName            = $serverData->institueName;
        $location           = $serverData->address;
        $stdIdPrefix        = $serverData->studentIdPrefix;
        $teacherIdPrefix    = $serverData->teacherIdPrefix;
        $staffIdPrefix      = $serverData->staffIdPrefix;
    else:
        $serverId           = "";
        $insName            = "Sonar Bangla College";
        $location           = "Poyat, Burichong, Cumilla";
        $stdIdPrefix        = "SBCSTID";
        $teacherIdPrefix    = "SBCTID";
        $staffIdPrefix      = "SBCSTFID";
    endif;
@endphp
                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20 mb-4">
                    <!-- Admit Form Area Start Here -->
                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success w-100">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger w-100">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="heading-layout1">
                                <div class="item-title">
                                    <h3>Add New Students</h3>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                        aria-expanded="false">...</a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-times text-orange-red"></i>Close</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i
                                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                                    </div>
                                </div>
                            </div>
                            <form class="new-added-form" action="{{ route('confirmAdmit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Admission ID</label>
                                        <input type="text" name="admitId" value="{{ $stdIdPrefix }}-@if(empty($chk)) 1 @else {{ $chk->id+1 }} @endif" placeholder="Example:- {{ $stdIdPrefix }}-124734" class="form-control" required readonly>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>First Name *</label>
                                        <input type="text" name="firstName" placeholder="Enter student first name" class="form-control" required>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Last Name *</label>
                                        <input type="text" name="lastName" placeholder="Enter student last name" class="form-control" required>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Father's Name *</label>
                                        <input type="text" name="fathersName" placeholder="Enter fathers name" class="form-control" required>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Mother's Name *</label>
                                        <input type="text" name="mothersName" placeholder="Enter mothers name" class="form-control" required>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Gender *</label>
                                        <select class="select2" name="gender" required>
                                            <option value="">Select *</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Date Of Birth *</label>
                                        <input type="text" name="dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                            data-position='bottom right' required>
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Roll</label>
                                        <input type="text" name="classRoll" placeholder="Enter student class roll" class="form-control" required>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Blood Group *</label>
                                        <select class="select2" name="blGroup">
                                            <option value="">Select *</option>
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
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Religion *</label>
                                        <select class="select2" name="religion" required>
                                            <option value="">Select *</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Buddish">Buddish</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>E-Mail</label>
                                        <input type="email" name="studentEmail" placeholder="Enter student email" class="form-control">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Session *</label>
                                        <select class="select2" name="sessionName" required>
                                            <option value="">Select *</option>
                                            @php
                                                $sessions = \App\Models\Session::orderBy('id','DESC')->get();
                                            @endphp
                                            @if(!empty($sessions))
                                                @foreach($sessions as $sess)
                                                <option value="{{ $sess->id }}">{{ $sess->sessionName }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Class *</label>
                                        <select class="select2" name="className" required>
                                            <option value="">Select *</option>
                                            @php
                                                $classes = \App\Models\Classes::orderBy('id','DESC')->get();
                                            @endphp
                                            @if(!empty($classes))
                                                @foreach($classes as $cls)
                                                <option value="{{ $cls->id }}">{{ $cls->className }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Section/Group *</label>
                                        <select class="select2" name="sectionName" required>
                                            <option value="">Select *</option>
                                            @php
                                                $department = \App\Models\Department::orderBy('id','DESC')->get();
                                            @endphp
                                            @if(!empty($department))
                                                @foreach($department as $dept)
                                                <option value="{{ $dept->id }}">{{ $dept->departmentName }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Phone</label>
                                        <input type="text" name="mobile" placeholder="Enter gurdian mobile number" class="form-control" required>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Student full address" name="address">
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group mg-t-30">
                                        <label class="text-dark-medium">Avatar (150px X 150px)</label>
                                        <input type="file" name="avatar" class="form-control-file">
                                    </div>
                                    <div class="col-12 form-group mg-t-8">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                        <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
@endsection