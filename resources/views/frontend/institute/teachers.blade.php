@extends('frontend.include')
@section('fronttitle')
Syllabus
@endsection
@section('frontcontent')
<style>

   .teachersImg{
        width:200px;
        height:180px;
        border-radius:5px;
        text-align:center;
        border:5px solid #a6a6a6;
       
        
    }
    .imgbox{
        width:270px;
        height:150;
        border-radius:10px;
        border:1px solid #a6a6a6;
        text-align:center;
        font-family:Raleway;
        font-size:15px;
        padding-top:30px;
        margin:10px;
    }
    table th,td{
        text-align:left !important;
        vertical-align:center;
    }
    table th{
        font-weight:bold;
    }
</style>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-center con-title">
            <h2 class=" hedingAbout wow fadeInLeft animated" data-wow-delay=".60s">Teacher<span> List</span> </h2>
        </div>
    </div>
    <div class="row align-items-center">
         <div class="col-12">
             <table class="table table-bordered">
                 <td style="width:10%"><img  class="w-100 img-thumbnail" src=""></td>
                 <td style="width:90%">
                     <table class="table table-bordered">
                         <tr>
                             <th style="width:15%">Name</th>
                             <td colspan="3">:</td>
                         </tr>
                         <tr>
                             <th style="width:15%">Designation</th>
                             <td colspan="3">: </td>
                         </tr>
                         <tr>
                             <th style="width:15%">Mobile</th>
                             <td style="width:35%">: </td>
                             <th style="width:15%">Email</th>
                             <td style="width:35%">: </td>
                         </tr>
                     </table>
                 </td>
             </table>
         </div>
    </div>
</div>





























@endsection