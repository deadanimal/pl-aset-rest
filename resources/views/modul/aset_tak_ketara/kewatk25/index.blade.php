@extends('layouts.base_atk') @section('content') 
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                <li class="breadcrumb-item"><a href="">Kewatk25</a></li>
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
            <h2 class="mb-0">Laporan Akhir</h2>
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
              <th scope="col">Laporan Awal</th>
              <th scope="col">Rumusan Siasatan</th>
              <th scope="col">Tindakan Diambil</th>
              <th scope="col">Pegawai Langsung</th>
              <th scope="col">Pegawai Penyelia</th>
              <th scope="col">Pegawai Bertanggungjawab</th>
              <th scope="col">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kewatk25 as $k25)
            <tr>

              <td scope="col">{{$loop->index + 1}}</td>
              <td scope="col">Laporan {{$k25->kewatk23_id}}</td>
              <td scope="col">{{$k25->rumusan_siasatan}}</td>
              <td scope="col">{{$k25->tindakan}}</td>
              <td scope="col">{{$k25->pg_langsung->name}}</td>
              <td scope="col">{{$k25->pg_penyelia->name}}</td>
              <td scope="col">{{$k25->pg_bertanggungjawab->name}}</td>

              <td scope="col">
              <a href="#" onclick="updateData({{$k25}})"><i class="fas fa-pen"></i></a>
              <a href="/kewatk25pdf/{{$k25->id}}" ><i class="fas fa-print"></i></a>
              <a href="/kewatk25" onclick="deleteData({{$k25}})"><i class="fas fa-trash"></i></a>
              </td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk25" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Laporan</h2>
               </div>
             </div>
           </div>

          </br>
          <div class="card-body pt-0">

              <label for="">Laporan</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="kewatk23_id">
                  <option value="" selected disabled hidden>Pilih Laporan</option>
                  @foreach ($kewatk23 as $k23)
                  <option value="{{$k23->id}}">Laporan No: {{$k23->id}}</option>
                  @endforeach
                </select>
              </div>


              <label for="">Tatacara Dipatuhi</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tatacara_dipatuhi" value="">
              </div>
              <label for="">Peraturan Tatacara</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="peraturan_tatacara" value="">
              </div>
              <label for="">Langkah Diambil</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="langkah_diambil" value="">
              </div>
              <label for="">Rumusan Siasatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="rumusan_siasatan" value="">
              </div>
              <label for="">Tindakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tindakan" value="">
              </div>
              <label for="">Pegawai Langsung</label>
              <div class="input-group">
                <select class="form-control mb-3" name="pegawai_langsung">
                  <option value="" selected disabled hidden>Pilih Pegawai</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>
              <label for="">Pegawai Penyelia</label>
              <div class="input-group">
                <select class="form-control mb-3" name="pegawai_penyelia">
                  <option value="" selected disabled hidden>Pilih Pegawai</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>
              <label for="">Pegawai Bertanggungjawab</label>
                <div class="input-group">
                <select class="form-control mb-3" name="pegawai_bertanggungjawab">
                  <option value="" selected disabled hidden>Pilih Pegawai</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>


              <button class="btn btn-primary" type="submit">Simpan</button>

          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" action="/kewatk9" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Sunting Laporan</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0">

              <label for="">Laporan</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="kewatk23_id">
                  <option value="" selected disabled hidden>Pilih Laporan</option>
                  @foreach ($kewatk23 as $k23)
                  <option value="{{$k23->id}}">Laporan No: {{$k23->id}}</option>
                  @endforeach
                </select>
              </div>


              <label for="">Tatacara Dipatuhi</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tatacara_dipatuhi" value="">
              </div>
              <label for="">Peraturan Tatacara</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="peraturan_tatacara" value="">
              </div>
              <label for="">Langkah Diambil</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="langkah_diambil" value="">
              </div>
              <label for="">Rumusan Siasatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="rumusan_siasatan" value="">
              </div>
              <label for="">Tindakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="tindakan" value="">
              </div>
              <label for="">Pegawai Langsung</label>
              <div class="input-group">
                <select class="form-control mb-3" name="pegawai_langsung">
                  <option value="" selected disabled hidden>Pilih Pegawai</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>
              <label for="">Pegawai Penyelia</label>
              <div class="input-group">
                <select class="form-control mb-3" name="pegawai_penyelia">
                  <option value="" selected disabled hidden>Pilih Pegawai</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>
              <label for="">Pegawai Bertanggungjawab</label>
                <div class="input-group">
                <select class="form-control mb-3" name="pegawai_bertanggungjawab">
                  <option value="" selected disabled hidden>Pilih Pegawai</option>
                  @foreach ($users as $pg)
                  <option value="{{$pg->id}}">{{$pg->name}}</option>
                  @endforeach
                </select>
              </div>


              <button class="btn btn-primary" type="submit">Simpan</button>

          </div>
      </div>
  </form>
</div>




</div>


<script type="text/javascript">

    $(document).ready(function () {
      initiateDatatable();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk25/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk25";;
				}
      })
    } 

    function updateData(obj) {
      $("#show").hide();
      // kewatk9 assign data to input 
      $("#updateForm select[name=kewatk23_id]").val(obj.kewatk23_id);
      $("#updateForm input[name=tatacara_dipatuhi]").val(obj.tatacara_dipatuhi);
      $("#updateForm input[name=peraturan_tatacara]").val(obj.peraturan_tatacara);
      $("#updateForm input[name=langkah_diambil]").val(obj.langkah_diambil);
      $("#updateForm input[name=rumusan_siasatan]").val(obj.rumusan_siasatan);
      $("#updateForm input[name=tindakan]").val(obj.tindakan);
      $("#updateForm select[name=pegawai_langsung]").val(obj.pegawai_langsung);
      $("#updateForm select[name=pegawai_penyelia]").val(obj.pegawai_penyelia);
      $("#updateForm select[name=pegawai_bertanggungjawab]").val(obj.pegawai_bertanggungjawab);

      $("#updateForm action").val("/kewatk25/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk25/" + obj.id)
      $("#updateDiv").show();
    }


</script>

@endsection
