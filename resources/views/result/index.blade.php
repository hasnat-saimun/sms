@extends('result.include')
@section('backTitle')
Dashboard
@endsection
@section('backIndex')
                <!-- Dashboard summery Start Here -->
                <div class="row gutters-20 mb-4">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-green ">
                                        <i class="flaticon-classmates text-green"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Students</div>
                                        <div class="item-number"><span class="counter" data-num="150000">1,50,000</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="flaticon-multiple-users-silhouette text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Teachers</div>
                                        <div class="item-number"><span class="counter" data-num="2250">2,250</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="flaticon-couple text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Parents</div>
                                        <div class="item-number"><span class="counter" data-num="5690">5,690</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="dashboard-summery-one mg-b-20">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red">
                                        <i class="flaticon-money text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Earnings</div>
                                        <div class="item-number"><span>$</span><span class="counter" data-num="193000">1,93,000</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard summery End Here -->
                <!-- Dashboard Content Start Here -->
                <div class="row my-4 intro-box text-center">
                    <div class="col-2">
                        <a href="{{ route('createClass') }}" class="btn btn-secondary btn-lg p-3 h3"><i class="fa-sharp fa-solid fa-book-open-cover"></i> New Class</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('createDepartment') }}" class="btn btn-secondary btn-lg p-3 h3"><i class="fa-sharp fa-solid fa-rhombus"></i> New Section</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('createSession') }}" class="btn btn-secondary btn-lg p-3 h3"><i class="fa-sharp fa-solid fa-graduation-cap"></i> New Session</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('createSubject') }}" class="btn btn-secondary btn-lg p-3 h3"><i class="fa-sharp fa-solid fa-book-open-reader"></i> New Subject</a>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('createExam') }}" class="btn btn-secondary btn-lg p-3 h3"><i class="fa-sharp fa-solid fa-diploma"></i> New Examination</a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="btn btn-secondary btn-lg p-3 h3"><i class="fa-sharp fa-solid fa-display-chart-up-circle-dollar"></i> Fees Collection</a>
                    </div>
                </div>
                <!-- Social Media Start Here -->
                <div class="row gutters-20 mt-4">
                    <div class="col-12 col-md-10 mx-auto">
                        <div class="card card-default">
                            <div class="card-header bg-light">
                                <h3>Student List</h3>
                            </div>
                            <div class="card-body">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Session</th>
                                            <th>Section</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($studentData))
                                        @foreach($studentData as $std)
                                        <tr>
                                            <td>{{ $std->admitId }}</td>
                                            <td>{{ $std->firstName." ".$std->lastName }}</td>
                                            <td>{{ $std->session }}</td>
                                            <td>{{ $std->section }}</td>
                                            <td>{{ $std->mobile }}</td>
                                            <td>
                                                <a href="{{ route('editStudent',['stdId'=>$std->id]) }}"><i class="fa-light fa-pen-to-square fa-xl"></i></a>
                                                <a href="{{ route('delStudent',['stdId'=>$std->id]) }}"><i class="fa-thin fa-circle-trash fa-xl"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td>SBC02</td>
                                            <td>Rasek Khondokar</td>
                                            <td>2023-2024</td>
                                            <td>Science</td>
                                            <td>01234567890</td>
                                            <td>Edit</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection