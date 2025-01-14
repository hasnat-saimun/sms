@extends('cultivation.include')
@section('backTitle')
Student List
@endsection
@section('backIndex')
                <!-- Social Media Start Here -->
                <div class="row gutters-20 mt-4">
                    <div class="col-12 col-md-10 mx-auto">
                        <div class="card card-default">
                            <div class="card-header bg-light">
                                <h3>Student List</h3>
                            </div>
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
                                                <a href="{{ route('delStudent',['stdId'=>$std->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-thin fa-circle-trash fa-xl"></i></a>
                                                <a href="{{ route('stdIdCard',['stdId'=>$std->id]) }}" title="Get Id Card"><i class="fa-light fa-id-card fa-xl"></i></a>
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