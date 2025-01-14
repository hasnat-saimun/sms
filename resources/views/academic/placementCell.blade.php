@extends('academic.include')
@section('backTitle')
Placement Cell
@endsection
@section('backIndex')
@php 

    if(!empty($plcId)):
        $plcList       = \App\Models\PlacementCell::find($plcId);
        if(!empty($plcList)):
            $fullName       = $plcList->fullName;
            $mobileNumber   = $plcList->mobile;
            $emailAddress   = $plcList->email;
            $joinDate       = $plcList->startFrom;
            $sessionYear    = $plcList->sessionYear;
            $rollNumber     = $plcList->rollNumber;
            $designation    = $plcList->designation;
            $companyName    = $plcList->companyName;
            $jobDetails     = $plcList->jobDetails;
        endif;
    else:
        $plcId          = null;   
        $fullName       = "";
        $mobileNumber   = "";
        $emailAddress   = "";
        $joinDate       = "";
        $sessionYear    = "";
        $rollNumber     = "";
        $designation    = "";
        $companyName    = "";
        $jobDetails     = "";
    endif;
@endphp
<!-- Dashboard summery Start Here -->
<div class="row gutters-20 mb-4">
    <div class="col-10 mx-auto">
        <div class="card">
            <div class="card-header">@yield('backTitle')</div>
            <div class="card-body cultivation">
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
                <form action="{{ route('savePlacementCell') }}" class="form row" method="POST" enctype="multipart/form-data">
                    <div class="col-12 col-md-6">
                        <input type="hidden" name="plcId" value="{{ $plcId }}">
                        @csrf
                        <div class="mb-3">
                            <label for="fullName">Full Name</label>
                            <input type="text" name="fullName" class="form-control" placeholder="Enter the full name of the student" value="{{ $fullName }}">
                        </div>
                        <div class="mb-3">
                            <label for="mobileNumber">Mobile</label>
                            <input type="text" name="mobileNumber" class="form-control" placeholder="Enter mobile number" value="{{ $mobileNumber }}">
                        </div>
                        <div class="mb-3">
                            <label for="emailAddress">Email</label>
                            <input type="text" name="emailAddress" class="form-control" placeholder="Enter email address" value="{{ $emailAddress }}">
                        </div>
                        <div class="mb-3">
                            <label for="sessionYear">Session</label>
                            <input type="text" name="sessionYear" class="form-control" placeholder="Enter session year" value="{{ $sessionYear }}">
                        </div>
                        <div class="mb-3">
                            <label for="rollNumber">Roll Number</label>
                            <input type="text" name="rollNumber" class="form-control" placeholder="Enter roll number" value="{{ $rollNumber }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="companyName">Company Name</label>
                            <input type="text" name="companyName" class="form-control" placeholder="Enter company name" value="{{ $companyName }}">
                        </div>
                        <div class="mb-3">
                            <label for="joinDate">Join Date</label>
                            <input type="date" name="joinDate" class="form-control" placeholder="Enter company join date" value="{{ $joinDate }}">
                        </div>
                        <div class="mb-3">
                            <label for="designation">Designation/Position</label>
                            <input type="text" name="designation" class="form-control" placeholder="Enter your position/title/designation" value="{{ $designation }}">
                        </div>
                        <div class="mb-3">
                            <label for="jobDetails">Job Details</label>
                            <textarea class="form-control" name="jobDetails">{{ $jobDetails }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success btn-lg mx-2" type="submit">Save</button>
                        <a class="btn btn-primary btn-lg mx-2" href="{{ route('placementCell') }}">New Profile</a>
                    </div>
                </form>
            </div>
            <div class="card-header">Plcement List</div>
            <div class="card-body cultivation">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Designation</th>
                            <th>Roll Number</th>
                            <th>Session Year</th>
                            <th>Company Name</th>
                            <th>Join Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($plcStudent))
                        @php
                            $x = 1;
                        @endphp
                        @foreach($plcStudent as $plc)
                            <tr>
                                <td>{{ $x }}</td>
                                <td>{{ $plc->fullName }}</td>
                                <td>{{ $plc->email }}</td>
                                <td>{{ $plc->mobile }}</td>
                                <td>{{ $plc->designation }}</td>
                                <td>{{ $plc->rollNumber }}</td>
                                <td>{{ $plc->sessionYear }}</td>
                                <td>{{ $plc->companyName }}</td>
                                <td>{{ $plc->startFrom }}</td>
                                <td>
                                    <a href="{{ route('editPlc',['id'=>$plc->id]) }}"><i class="fa-light fa-pen-to-square fa-xl"></i></a>
                                    <a href="{{ route('delPlc',['id'=>$plc->id]) }}" onclick="return confirm('Are you sure to delete?')"><i class="fa-thin fa-circle-trash fa-xl"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td>1</td>
                                <td>Rasel Khondokar</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard summery End Here -->
@endsection