@extends('layouts.base_login')
@section('content')
@if(session()->has('message'))
    <div id="errorMsg" class="alert alert-success">
        <div class="row">
            <div class="col-1">
                <a onclick="tutupErrorMsg()">x</a>
            </div>
            <div class="col">
                {{ session()->get('message')}}

            </div>
        </div>
    </div>
@endif
    <section>
        <div class="row pb-4">
            <div class="col-1"></div>
            <div class="col-2 d-flex align-items-center">
                <a class="navbar-brand">
                    <img src="/assets/img/logo-labuan.png" class="mt-3 ml-3 navbar-brand-img" style="max-height: 6rem;">
                </a>
            </div>

            <div class="col-9"
                style="display: flex; justify-content: flex-end; border-bottom-left-radius: 300px; background: rgba(24,79,121)">
                <div class="mx-auto my-auto">
                    <h1 class="text-white text-center" style="font-size: 30px;">SISTEM PENGURUSAN ASET DAN STOR</h1>
                    <h1 class="text-white text-center" style="font-size: 30px;">PERBADANAN LABUAN</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-xl col-lg col-sm-0"></div>
            <div class="col-xl-4 col-lg-6 col-sm-12">
                <div class="card shadow-lg" style="border-radius: 20px;">
                    <div class="card-body">
                        <div class="text-center">
                            <h1 style="color: rgba(24,79,121)"><strong>MAKLUM BALAS</strong></h1>
                        </div>
                        <form method="POST" action="/comments">
                        @csrf
                        <div class="row mt-3 px-3" style="color: rgba(24,79,121)">
                            <div class="col-12">
                                <label for=""><strong>Nama</strong></label>
                            </div>
                            <div class="col-12 mb-3 input-group">
                                <input class="form-control" type="text" name="name" type="text" value="" required>
                            </div>
                            <div class="col-12">
                                <label for=""><strong>E-mel</strong></label>
                            </div>
                            <div class="col-12 mb-3 input-group">
                                
                                <input class="form-control" name="email" type="email" value="" required>
                            </div>

                            <div class="col-12">
                                <label for=""><strong>Komen</strong></label>
                            </div>
                            <div class="col-12 mb-3 input-group">
                                
                                <textarea class="form-control" name="komen" type="text" value="" rows="3" required></textarea>
                            </div>
                            
                            
                            <div class="col-12 mt-3 text-center">
                                <input class="btn btn-md btn-primary" type="submit" value="Hantar"></input>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl col-lg col-sm-0"></div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#maklum-balas").css("border-left", "5px solid rgba(24,79,121)");
        });

        function tutupErrorMsg() {
            $("#errorMsg").css("display","none");
        }
        
    </script>
@endsection
