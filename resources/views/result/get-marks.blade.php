@extends('result.include')
@section('backTitle')
Get Mark
@endsection
@section('backIndex')
    @if($studentList->count()>0)
        <form method="POST" class="card-body form form-group" action="">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Std ID</th>
                            <th>Roll</th>
                            <th>Student Name</th>
                            <th>CQ</th>
                            <th>MCQ</th>
                            <th>Practical</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($studentList->count()>0)
                        @foreach($studentList as $std)
                        <tr>
                            <td>{{ $std->stdId }}</td>
                            <td>{{ $std->rollNumber }}</td>
                            <td>{{ $std->fullName.' '.$std->sureName }}</td>
                            <td><input type="text" class="form-control" name="cqMarks" value="" id="" placeholder="Enter CQ Marks"></td>
                            <td><input type="text" class="form-control" name="mcqMarks" value="" id="" placeholder="Enter MCQ Marks"></td>
                            <td><input type="text" class="form-control" name="practical" value="" id="" placeholder="Enter Practical Marks"></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">Sorry! No data found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </form>
    @else
    <div class="alert alert-info">
        Sorry! No data found
    </div>
    @endif
@endsection