@extends('layouts.base_atk') @section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-8">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="">Kewatk21</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid mt--6">
  <div id="show">
    <div class="card mt-4">
      <div class="card-header">
        <div class="row">
          <div class="col">
            <h2 class="mb-0">Sijil Pelupusan</h2>
          </div>
          <div class="text-end mr-2">
            <button class="align-self-end btn btn-sm btn-primary" id="tambah">Tambah</button>
          </div>
        </div>
      </div>

      <div class="table-responsive py-4">

      <table class="table table-custom-simplified table-flush" id="table">
        <thead class="thead-light">
          <tr>
              <th scope="col">Bil</th>
              <th scope="col">Bilangan Item</th>
              <th scope="col">No Resit</th>
              <th scope="col">Dihadiahkan Kepada</th>
              <th scope="col">Dokumen Berkaitan</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($kewatk21 as $k21)
          <tr>

            <td scope="col">{{$loop->index + 1}}</td>
            
            <td scope="col">{{$k21->bilangan_item}}</td>
            <td scope="col">{{$k21->no_resit}}</td>
            <td scope="col">{{$k21->hadiah_kepada->name}}</td>
            <td scope="col">{{$k21->dokumen_berkaitan}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$k21}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk21" onclick="deleteData({{$k21}})"><i class="fas fa-trash"></i></a>
              <a href="/kewatk21pdf/{{$k21->id}}" ><i class="fas fa-print"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk21" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h2 class="mb-0">Tambah Lantikan</h2>
                  </div>
                </div>
              </div>
          </br>
          <div class="card-body pt-0">
          <div class="row">
            <div class="col-4">
              <label for="Borang Pelupusan"></label>
              <div class="input-group">
                  <select class="form-control" name="kewatk19_id">
                    <option value="" selected disabled hidden>Pilih No.Rujukan</option>
                    @foreach ($kewatk19 as $k19)
                    <option value="{{$k19->id}}">No.Rujukan {{$k19->id}}</option>
                    @endforeach
                  </select>
                </div>
            </div>

            <div class="col-4">
              <label for="">Bilangan Item</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="bilangan_item" value="">
              </div>
            </div>
            <div class="col-4">
              <label for="">No Resit</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_resit" value="">
              </div>
            </div>
            <div class="col-4">
              <label for="">Dihadiahkan Kepada</label>
              <div class="input-group">
                <select class="form-control mb-3" name="dihadiahkan_kepada">

                  <option value="" selected disabled hidden>Pilih Pengguna</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-4">
              <label for="">Dokumen Berkaitan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="file" name="dokumen_berkaitan" value="">
              </div>
            </div>
            <div class="col-4">
              <label for="">Hasil Perbelanjaan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="hasil_perbelanjaan" value="">
              </div>
            </div>
            <div class="col-4">
              <label for="">Penerima Syarikat</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="penerima_syarikat" value="">
              </div>
            </div>
          </div>

      <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
        </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" action="/kewatk21" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h2 class="mb-0">Sunting Lantikan</h2>
                  </div>
                </div>
              </div>
          </br>
          <div class="card-body pt-0">
            <div class="row">
            <div class="col-4">
              <label for="Borang Pelupusan"></label>
              <div class="input-group">
                  <select class="form-control" name="kewatk19_id">
                    <option value="" selected disabled hidden>Pilih No.Rujukan</option>
                    @foreach ($kewatk19 as $k19)
                    <option value="{{$k19->id}}">No.Rujukan {{$k19->id}}</option>
                    @endforeach
                  </select>
                </div>
            </div>

            <div class="col-4">
              <label for="">Bilangan Item</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="bilangan_item" value="">
              </div>
            </div>
            <div class="col-4">
              <label for="">No Resit</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="no_resit" value="">
              </div>
            </div>
            <div class="col-4">
              <label for="">Dihadiahkan Kepada</label>
              <div class="input-group">
                <select class="form-control mb-3" name="dihadiahkan_kepada">

                  <option value="" selected disabled hidden>Pilih Pengguna</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-4">
              <label for="">Dokumen Berkaitan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="file" name="dokumen_berkaitan" value="">
              </div>
            </div>
            <div class="col-4">
              <label for="">Hasil Perbelanjaan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="hasil_perbelanjaan" value="">
              </div>
            </div>
            <div class="col-4">
              <label for="">Penerima Syarikat</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="penerima_syarikat" value="">
              </div>
            </div>
          </div>


              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<script type="text/javascript">

  $(document).ready(function() {
    initiateDatatable();
    $("#info_kewatk21_form").hide();
    $("#button_tambah").hide();
  })

  $("#tambah").click(function() {
    $("#show").hide();
    $("#create").show();
  });

  function updateData(obj) {
    $("#show").hide();

    $("#updateForm input[name=bilangan_item]").val(obj.bilangan_item);
    $("#updateForm input[name=no_resit]").val(obj.no_resit);
    $("#updateForm select[name=dihadiahkan_kepada]").val(obj.dihadiahkan_kepada);
    $("#updateForm input[name=dokumen_berkaitan]").val(obj.dokumen_berkaitan);
    $("#updateForm input[name=hasil_perbelanjaan]").val(obj.hasil_perbelanjaan);
    $("#updateForm input[name=penerima_syarikat]").val(obj.penerima_syarikat);
    $("#updateForm select[name=kewatk19_id]").val(obj.kewatk19_id);


    $("#updateForm action").val("/kewatk21/" + obj.id);      
    $("#updateForm").attr('action', "/kewatk21/" + obj.id)
    $("#updateDiv").show();

  }

  function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk21/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk21";;
				}
      })
    } 



</script>




@endsection
