@extends('layouts.base_stor') @section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="">{{$title}}</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>



<div class="container-fluid mt--6">
  <div class="card">
    <div class="card-body">
      <iframe src="{{$url}}" style="width:100%;height:800px;" title="{{ $title }}"></iframe>
    </div>
  </div>
</div>



@endsection
