@extends('layouts.baseUser')
@section('content')

<div id="loginPage" class="pt-7 container-fluid d-flex justify-content-center" style="height: 100vh;">
    <div class="card card-frame" style="width: 60%; height: 70%; margin: auto;">
        <div class="card-body">

          <div class="row h-100 ">
            <div class="align-items-center col-7 h-100" style="margin: auto; border-right: 0.1rem solid;">
              <br>
              <br>
              <div class="form-group row text-center">
                <img style="width: 40%; margin: auto;" src="/assets/img/pl-logo.png">
              </div>
              <div class="text-center">
                <h1>Perbadanan Labuan</h1>
                <h3>Sistem Pengurusan Aset</h3>
              </div>

            </div>

            <div class="col-5 allign-items-center">
              <div class="text-center">
                <h3>Log Masuk</h3>
              </div>
              <form>
                  @csrf
                  <div class="container mt-2">
                    <div class="form-group mt-3">
                          <div class="input-group mb-4">

                              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              <input class="form-control" placeholder="Masukkan emel" type="text" name="no_kp">
                          </div>
                      </div>
                      
                      <div class="form-group mt-3">
                          <div class="input-group mb-4">

                              <span class="input-group-text"><i class="fas fa-lock"></i></span>
                              <input class="form-control" placeholder="Masukkan kata laluan" type="password" name="password">
                          </div>
                      </div>
                      <div class="form-group mt-3">
                          <div class="input-group mb-4 d-flex justify-content-end">
                              <a href="/lupa-kata-laluan">
                                  <small>
                                      Lupa Kata Laluan?
                                  </small>
                              </a>
                          </div>
                      </div>
                      <div class="form-group mt-3">
                          <div class="input-group">
                              <input type="submit" class="btn bg-gradient-info btn-lg w-100 text-capitalize" value="Log Masuk">
                          </div>
                      </div>

                  </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>

@stop
