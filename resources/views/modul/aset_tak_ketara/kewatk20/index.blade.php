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
                <li class="breadcrumb-item"><a href="">Kewatk20</a></li>
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
            <h2 class="mb-0">Sijil Penyaksian Pemusnahan</h2>
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
              <th scope="col">Agensi</th>
              <th scope="col">Tajuk Harta</th>
              <th scope="col">Secara</th>
              <th scope="col">Tarikh</th>
              <th scope="col">Tempat</th>
              <th scope="col">Borang Pelupusan</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($kewatk20 as $k20)
          <tr>

            <td scope="col">{{$loop->index + 1}}</td>
            <td scope="col">{{$k20->agensi}}</td>
            <td scope="col">{{$k20->tajuk_harta}}</td>
            <td scope="col">{{$k20->secara}}</td>
            <td scope="col">{{$k20->tarikh}}</td>
            <td scope="col">{{$k20->tempat}}</td>
            <td scope="col">No. Rujukan {{$k20->kewatk19_id}}</td>

            <td scope="col">
              <a href="#" onclick="updateData({{$k20}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk20" onclick="deleteData({{$k20}})"><i class="fas fa-trash"></i></a>
              <a href="/kewatk20pdf/{{$k20->id}}" ><i class="fas fa-print"></i></a>
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk20" enctype="multipart/form-data">
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
                <label for="">Agensi</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="agensi" value="">
                </div>
              </div>

              <div class="col-4">
                <label for="">Tajuk Harta</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="tajuk_harta">
                    <option value="" selected disabled hidden>Pilih Tajuk Harta</option>
                    @foreach ($kewatk3a as $k3)
                    <option value="{{$k3->kategori}}">{{$k3->kategori}}</option>
                    @endforeach
                  </select>

                </div>
              </div>


              <div class="col-4">
                <label for="">Secara</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="secara">
                    <option value="" selected disabled hidden>Pilih Cara</option>
                    <option value="Hapus">Hapus</option>
                    <option value="Musnah">Musnah</option>
                  </select>

                </div>
              </div>

              <div class="col-4">
                <label for="">Tarikh</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh" value="">
                </div>
              </div>

              <div class="col-4">
                <label for="">Tempat</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="tempat" value="">
                </div>
              </div>

              <div class="col-4">
              <label for="">No.Rujukan (Kewatk19)</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="kewatk19_id">
                    <option value="" selected disabled hidden>Pilih No.Rujukan</option>
                    @foreach ($kewatk19 as $k19)
                    <option value="{{$k19->id}}">No.Rujukan {{$k19->id}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" action="/kewatk20" enctype="multipart/form-data">
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
                <label for="">Agensi</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="agensi" value="">
                </div>
              </div>

              <div class="col-4">
                <label for="">Tajuk Harta</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="tajuk_harta">
                    <option value="" selected disabled hidden>Pilih Tajuk Harta</option>
                    @foreach ($kewatk3a as $k3)
                    <option value="{{$k3->kategori}}">{{$k3->kategori}}</option>
                    @endforeach
                  </select>

                </div>
              </div>


              <div class="col-4">
                <label for="">Secara</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="secara">
                    <option value="" selected disabled hidden>Pilih Cara</option>
                    <option value="Hapus">Hapus</option>
                    <option value="Musnah">Musnah</option>
                  </select>

                </div>
              </div>

              <div class="col-4">
                <label for="">Tarikh</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh" value="">
                </div>
              </div>

              <div class="col-4">
                <label for="">Tempat</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="tempat" value="">
                </div>
              </div>

              <div class="col-4">
              <label for="">No.Rujukan (Kewatk19)</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="kewatk19_id">
                    <option value="" selected disabled hidden>Pilih No.Rujukan</option>
                    @foreach ($kewatk19 as $k19)
                    <option value="{{$k19->id}}">No.Rujukan {{$k19->id}}</option>
                    @endforeach
                  </select>
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
    $("#info_kewatk20_form").hide();
    $("#button_tambah").hide();
  })

  $("#tambah").click(function() {
    $("#show").hide();
    $("#create").show();
  });

  function updateData(obj) {
    $("#show").hide();

    $("#updateForm select[name=pegawai]").val(obj.pegawai);
    $("#updateForm input[name=tempoh]").val(obj.tempoh);
    $("#updateForm input[name=tarikh_mula]").val(obj.tarikh_mula);
    $("#updateForm input[name=tarikh_tamat]").val(obj.tarikh_tamat);
    $("#updateForm input[name=created_by]").val(obj.created_by);

    $("#updateForm action").val("/kewatk20/" + obj.id);      
    $("#updateForm").attr('action', "/kewatk20/" + obj.id)
    $("#updateDiv").show();

  }

  function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk20/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk20";;
				}
      })
    } 



</script>




@endsection
