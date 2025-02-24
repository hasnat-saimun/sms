@extends('cultivation.include')
@section('backTitle')
{{$singleData->firstName}} Profile
@endsection
@section('backIndex')
    <div class=" row gutters-20 mb-4 mx-auto">
        <div class="card height-auto mb-4">
            <div class="card-body">
                <div class="mb-3 text-center">
                    <u class="h2">{{$singleData->firstName}} Profile</u>
                </div>
                <table class=" table   rounded" >
                    <tbody class="">
                        <th class="mx-auto">
                            <td>
                            <img class="" style="width:150px;height:150px;" src="{{ asset('/public/upload/image/teacher/') }}/{{$singleData->avatar}}" alt="$singleData->firstName">
                            </td>
                        </th>
                        <tr>
                            <th>ID</th>
                            <td>{{$singleData->teacherId}}</td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td>{{$singleData->firstName}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$singleData->address}}</td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>{{$singleData->blGroup}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$singleData->firstName}}</td>
                        </tr>
                        <tr>
                            <th >E-Mail</th>
                            <td>{{$singleData->email}}</td>
                        </tr>
                        <tr>
                            <th >join Date</th>
                            <td>{{$singleData->joinDate}}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
                <div class="mt-3">
                    <a href="{{route('teacherList')}}"class="btn-fill-lg bg-blue-dark btn-hover-bluedark">Back</a>
                    <button type="print" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Print</button>
                </div>
        </div>
    </div>

@endsection