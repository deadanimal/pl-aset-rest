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
                <li class="breadcrumb-item"><a href="">Kewatk4</a></li>
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
            <h2 class="mb-0">Pendaftaran Harta Bukan Intelek</h2>
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
            <th scope="col">Agensi</th>
            <th scope="col">Bahagian</th>
            <th scope="col">Kategori</th>
            <th scope="col">Sub Kategori</th>
            <th scope="col">Staff Id</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk4 as $k4)
          <tr>
            <td scope="col">{{$k4->agensi}}</td>
            <td scope="col">{{$k4->bahagian}}</td>
            <td scope="col">{{$k4->kategori}}</td>
            <td scope="col">{{$k4->sub_kategori}}</td>
            <td scope="col">{{$k4->staff_id}}</td>


            @if ($k4->status=="DERAF") 
              <td scope="col"><span class="badge bg-warning">{{$k4->status}}</span></th>
            @elseif ($k4->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$k4->status}}</span></th>
            @elseif ($k4->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$k4->status}}</span></th>
            @elseif ($k4->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$k4->status}}</span></th>
            @endif
            
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk4" onclick="updateStatus({{$k4}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk4" onclick="updateStatus({{$k4}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk4pdf"><i class="fas fa-print"></i></a>
              @else
              <a href="/kewatk4" onclick="updateStatus({{$k4}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              
              <!-- disable edit after submit -->              
              @if($k4->status=="HANTAR")
              @else
              <a href="/kewatk4/{{$k4->id}}"><i class="fas fa-file"></i></a>
              <a href="#" onclick="updateData({{$k4}})"><i class="fas fa-pen"></i></a>
              @endif

              <a href="/kewatk4pdf"><i class="fas fa-print"></i></a>
              <a href="/kewatk4" onclick="deleteData({{$k4}})"><i class="fas fa-trash"></i></a>
              @endif
              </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="create" style="display: none;">
  <form method="POST" action="/kewatk4" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Harta Bukan Intelek</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0">
            <label for="">Agensi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="agensi" value="">
            </div>
            <label for="">Bahagian</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="bahagian" value="">
            </div>
            <label for="">Kategori</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kategori" value="">
            </div>
            <label for="">Sub Kategori</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="sub_kategori" value="">
            </div>
            <!--
            <label for="">No Rujukan Kewatk4</label>
            <div class="input-group">
              <select onchange="getInfoKewatk4(this)" class="form-control mb-3" name="no_rujukan_atk1">
                <option value=""></option>
                @foreach ($kewatk4 as $kew4)
                <option value="{{$kew4->id}}">Kewatk4 - No Rujukan: {{$kew4->id}}</option>
                @endforeach
              </select>
            </div>
            -->

            <div id="info_kewatk4_create"></div>

          <a id="button_tambah" class="btn btn-primary text-white" onclick="tambahInfoKewatk4()">Tambah Aset</a>
          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

<div id="updateDiv" style="display: none;">
  <form id="updateForm" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Sunting Harta Bukan Intelek</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0"> 
            <label for="">Agensi</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="agensi" value="">
            </div>
            <label for="">Bahagian</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="bahagian" value="">
            </div>
            <label for="">Kategori</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="kategori" value="">
            </div>
            <label for="">Sub Kategori</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="sub_kategori" value="">
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="staff_id" value="">
            </div>

            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="status" value="">
            </div>


            
          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>

</div>

<script type="text/javascript">
    
    var no_kod = [];

    $(document).ready(function () {
      initiateDatatable();
      $("#info_kewatk4_form").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=agensi]").val(obj.agensi);
      $("#updateForm input[name=bahagian]").val(obj.bahagian);
      $("#updateForm input[name=kategori]").val(obj.kategori);
      $("#updateForm input[name=sub_kategori]").val(obj.sub_kategori);

      $("#updateForm action").val("/kewatk4/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk4/" + obj.id)
      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      console.log(obj, mode)
      $("#updateForm input[name=agensi]").val(obj.agensi);
      $("#updateForm input[name=bahagian]").val(obj.bahagian);
      $("#updateForm input[name=kategori]").val(obj.kategori);

      $("#updateForm input[name=status]").val(mode);
      $("#updateForm input[name=sub_kategori]").val(obj.sub_kategori);
      $("#updateForm input[name=staff_id]").val(obj.staff_id);

      $("#updateForm action").val("/kewatk4/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk4/" + obj.id)
      
      var values = {};
      $.each($('#updateForm').serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });

      var url = $("#updateForm").attr('action');
      console.log("v", values);

      $.ajax({
        type: "POST",
        url: url,
        data: values, // serializes the form's elements.
        success: function(data)
        {

        }
      });
    }

    function deleteData(obj) {
      var id = obj.id;
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/kewatk4/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk4";;
				}
      })

    } 

    function tambahInfoKewatk4() {
      var option_data = ""
      for (let i=0; i < no_kod.length; i++) {
        option_data = option_data + `<option value=${no_kod[i].no_kod}>${no_kod[i].no_kod}</option>`
      }


     $("#info_kewatk4_create").append(
          `<div class="row">
              
            <div class="col">
                <label for="">Jenis</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="jenis[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">Tajuk</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="tajuk[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">No Pesanan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="no_pesanan[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">Tarikh Terima</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tarikh_terima[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">Kuantiti</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="kuantiti[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">Harga</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="harga[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">Tempoh Dari</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tempoh_dari[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">Tempoh Hingga</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="date" name="tempoh_hingga[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">Catatan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="catatan[]" value="">
                </div>
              </div>
              <div class="col">
                <label for="">Pegawai Penempatan</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="pegawai_penempatan[]" value="">
                </div>
              </div>
         </div>`

     )

    }

    function getInfoKewatk4(obj) {
      $("#button_tambah").show();

      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk4/" + obj.value,
        type: "GET",
        success: function (data) {
          no_kod = data;
				}
      })

    }


    function initiateDatatable() {
      const dataTableBasic = new simpleDatatables.DataTable("#table", {
          searchable: true,
          fixedHeight: true,
          sortable: false
      });
    }

        


</script>

@endsection
