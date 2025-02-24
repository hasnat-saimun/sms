@extends('cultivation.include')
@section('backTitle')
{{$singleData->fullName}} Profile
@endsection
@section('backIndex')
<div class="single-info-details">
    <div class="item-img">
        <img class="rounded:100" style="width:150px;height:150px;" src="{{ asset('/public/upload/image/student/') }}/{{$singleData->avatar}}" alt="student">
    </div>
    @php
        $sessionData =\App\Models\sessionManage::find($singleData->sessName);
        $classData   =\App\Models\classManage::find($singleData->className);
        $sectionData =\App\Models\sectionManage::find($singleData->sectionName);
    @endphp
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{$singleData->fullName}}</h3>
            <div class="header-elements">
                <ul>
                    <li><a href="{{route('studentList')}}"><i class="fa-regular fa-arrow-right-from-bracket fa-flip-horizontal"></i></a></li>
                    <li><a href="#"><i class="fas fa-print"></i></a></li>
                    <li><a href="#"><i class="fas fa-download"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="info-table table-responsive">
            <table class="table text-nowrap">
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->fullName}}</td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->gender}}</td>
                    </tr>
                    <tr>
                        <td>Father Name:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->father}}</td>
                    </tr>
                    <tr>
                        <td>Mother Name:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->mother}}</td>
                    </tr>
                    <tr>
                        <td>Date Of Birth:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->dob}}</td>
                    </tr>
                    <tr>
                        <td>Religion:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->religion}}</td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->mail}}</td>
                    </tr>
                    <tr>
                        <td>Admission Date:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->created_at->format('d-m-y')}}</td>
                    </tr>
                    <tr>
                        <td>Class:</td>
                        @if(!empty($classData))
                                <td class="font-medium text-dark-medium">{{$classData->className}}</td>
                                @else
                                <td>-</td>
                                @endif
                    </tr>
                    <tr>
                        <td>Section:</td>
                            @if(!empty($sectionData))
                                <td class="font-medium text-dark-medium">{{$sectionData->section}}</td>
                            @else
                                <td>-</td>
                            @endif
                    </tr>
                    <tr>
                        <td>Session:</td>
                            @if(!empty($sessionData))
                                <td class="font-medium text-dark-medium">{{$sessionData->session}}</td>
                                @else
                                <td>-</td>
                                @endif
                    </tr>
                    <tr>
                        <td>Roll:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->rollNumber}}</td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->address}}</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td class="font-medium text-dark-medium">{{$singleData->phone}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
