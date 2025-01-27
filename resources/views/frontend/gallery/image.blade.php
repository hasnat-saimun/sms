@extends('frontend.include')
@section('fronttitle')
Syllabus
@endsection
@section('frontcontent')
<section>
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-12 text-center con-title">
                <h2 class=" wow fadeInLeft animated" data-wow-delay=".60s">Photo <span>Galery</span></h2>
                <p class=" wow fadeInLeft animated" data-wow-delay=".60s">Fusce id sem at ligula laoreet hendrerit venenatis sed purus. Ut pellentesque maximus lacus, nec pharetra augue.</p>
            </div>
        </div>
        <div class="row">
           
            <div class="col-md-4 mb-4  ">
                <a class="wow fadeIn animated" data-wow-delay=".60s" href="{{ asset('/') }}public/storage/frontend/uploads/photogallery/" data-lightbox="mygallery" data-toggle="modal" data-target="#">
                    <img data-bs-toggle="modal" data-bs-target="#staticBackdrop" src="{{ asset('/') }}public/storage/frontend/uploads/photogallery/" alt="" class="img-responsiv img-rounded"/>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection