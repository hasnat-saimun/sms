@extends('frontend.include')
@section('fronttitle')
Syllabus
@endsection
@section('frontcontent')
<style>
body {
    background-image: url("/public/frontend/assets/images/bg/bg.png");
}
#myTable th{
    text-align:center;
}

</style>

 <section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center con-title">
                <h2 class="wow fadeInLeft animated" data-wow-delay=".60s"> Former <span>Principal</span></h2>
           </div>
        </div>
            <!-- On tables -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Ex-Principals List
                    </div>
                    <div class="card-body">
                <table id="myTable" class="display border" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start From</th>
                            <th>End To</th>
                            <th>Photo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr class="text-center">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> <img src="" style="width:70px; height:70px;"/></td>
                              
                        </tr>
                        
                        
                    </tbody>
                </table>                         
                    </div>
                </div>
                                
            </div>
        </div>
    </div>
</section>

   


@endsection