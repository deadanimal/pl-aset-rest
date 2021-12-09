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
                <li class="breadcrumb-item"><a href="">Kewatk2</a></li>
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
            <h2 class="mb-0">Penolakan Aset</h2>
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
            <th scope="col">Tindakan Diterima</th>
            <th scope="col">Pegawai Penerima</th>
            <th scope="col">Pembekal</th>
            <th scope="col">No Rujukan Kewatk1</th>
            <th scope="col">Status</th>
            <th scope="col">Tindakan</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($kewatk2 as $kewatk2)
          <tr>
            <td scope="col">{{$kewatk2->tindakan_diterima}}</td>
            <td scope="col">{{$kewatk2->pg_penerima->name}}</td>
            <td scope="col">{{$kewatk2->pembekal}}</td>
            <td scope="col">{{$kewatk2->no_rujukan_atk1}}</td>


            @if ($kewatk2->status=="DRAFT") 
              <td scope="col"><span class="badge bg-warning">{{$kewatk2->status}}</span></th>
            @elseif ($kewatk2->status=="HANTAR") 
              <td scope="col"><span class="badge bg-primary">{{$kewatk2->status}}</span></th>
            @elseif ($kewatk2->status=="LULUS") 
              <td scope="col"><span class="badge bg-success">{{$kewatk2->status}}</span></th>
            @elseif ($kewatk2->status=="DITOLAK") 
              <td scope="col"><span class="badge bg-danger">{{$kewatk2->status}}</span></th>
            @endif
            
            <td scope="col">
              @if (Auth::user()->jawatan=="superadmin")
              <a href="/kewatk2" onclick="updateStatus({{$kewatk2}}, 'LULUS')"><i class="fas fa-check-circle"></i></a>
              <a href="/kewatk2" onclick="updateStatus({{$kewatk2}}, 'DITOLAK')"><i class="fas fa-times-circle"></i></a>
              <a href="/kewatk2pdf/"><i class="fas fa-print"></i></a>
              @else
              <a href="/kewatk2" onclick="updateStatus({{$kewatk2}}, 'HANTAR')"><i class="fas fa-arrow-up"></i></a>
              
              <!-- disable edit after submit -->              
              @if($kewatk2->status=="HANTAR")
              @else
              <a href="/kewatk2/{{$kewatk2->id}}" ><i class="fas fa-pen"></i></a>
              @endif

              <a href="/kewatk2pdf/{{$kewatk2->id}}"><i class="fas fa-print"></i></a>
              <a href="/kewatk2" onclick="deleteData({{$kewatk2}})"><i class="fas fa-trash"></i></a>
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
  <form method="POST" action="/kewatk2" enctype="multipart/form-data">
      @csrf
      <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Info Penolakan Aset</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-4">
                <label for="">Tindakan Diterima</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="tindakan_diterima" value="" required>
                </div>
              </div>
                  


              <div class="col-4">
                <label for="">Pembekal</label>
                <div class="input-group">
                  <input class="form-control mb-3" type="text" name="pembekal" value="" required>
                </div>
              </div>

              <div class="col-4">
                <label for="">Jenis Penolakan</label>
                <div class="input-group">
                  <select class="form-control mb-3" name="jenis_penolakan">
                    <option value="" required selected disabled hidden>Pilih Jenis</option required>
                    <option value="ditolak">ditolak</option>
                    <option value="kurang">kurang</option>
                    <option value="lebih">lebih</option>
                  </select>
                </div>
              </div>

              <div class="col-4">
              <label for="">No Rujukan Kewatk1</label>
                <div class="input-group">
                  <select onclick="getInfoKewatk1(this)" class="form-control mb-3" name="no_rujukan_atk1" required>
                    <option value="" required selected disabled hidden>Pilih Rujukan ATK1</option>
                    @foreach ($kewatk1 as $kew1)
                    <option value="{{$kew1->id}}">Kewatk1 - No Rujukan: {{$kew1->id}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          


          <a id="button_tambah" class="btn-sm btn btn-primary text-white" onclick="tambahAsetUntukDitolak()">Tambah Aset</a>
          <button class="btn-sm btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>

     <div id="info_kewatk2_create"></div>
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
                 <h2 class="mb-0">Info Penolakan Aset</h2>
               </div>
             </div>
           </div>
          </br>
          <div class="card-body pt-0"> <label for="">Tindakan Diterima</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="tindakan_diterima" value="" required>
            </div>
            <label for="">Pembekal</label>
            <div class="input-group">
              <input class="form-control mb-3" type="text" name="pembekal" value="" required>
            </div>
            <label for="">Jenis Penolakan</label>
            <div class="input-group">
              <select class="form-control mb-3" name="jenis_penolakan" required>
                <option value="" required></option>
                <option value="ditolak">Kuantiti Ditolak</option>
                <option value="kurang">Kuantiti Kurang</option>
                <option value="lebih">Kuantiti Lebih</option>
              </select>
            </div>

            <label for="">No Rujukan Kewatk1</label>
            <div class="input-group">
              <select class="form-control mb-3" name="no_rujukan_atk1" required>
                <option value="" required></option>
                @foreach ($kewatk1 as $kew1)
                  <option value="{{$kew1->id}}">Kewatk1 - No Rujukan: {{$kew1->id}}</option>
                @endforeach
              </select>
            </div>
            <div class="input-group">
              <input class="form-control mb-3" type="hidden" name="status" value="" required>
            </div>

            
          <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
      </div>
  </form>
</div>
</div>


<script type="text/javascript">
    
    var no_kod = [];
    var selected_kewatk1 = {'id' : '1'};

    $(document).ready(function () {
      initiateDatatable();
      $("#info_kewatk2_form").hide();
      $("#button_tambah").hide();
    })

    $( "#tambah" ).click(function() {
      $("#show").hide();
      $("#create").show();
      tambahAsetUntukDitolak();
    });

    function updateData(obj) {

      $("#show").hide();

      $("#updateForm input[name=tindakan_diterima]").val(obj.tindakan_diterima);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pembekal]").val(obj.pembekal);
      $("#updateForm select[name=jenis_penolakan]").val(obj.jenis_penolakan);
      $("#updateForm select[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);
      $("#updateForm input[name=status]").val(obj.status);

      $("#updateForm action").val("/kewatk2/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk2/" + obj.id)

      $("#updateDiv").show();

    }

    function updateStatus(obj, mode) {
      $("#updateForm input[name=tindakan_diterima]").val(obj.tindakan_diterima);
      $("#updateForm input[name=pegawai_penerima]").val(obj.pegawai_penerima);
      $("#updateForm input[name=pembekal]").val(obj.pembekal);
      $("#updateForm input[name=status]").val(mode);
      $("#updateForm select[name=jenis_penolakan]").val(obj.jenis_penolakan);
      $("#updateForm select[name=no_rujukan_atk1]").val(obj.no_rujukan_atk1);


      $("#updateForm action").val("/kewatk2/" + obj.id);      
      $("#updateForm").attr('action', "/kewatk2/" + obj.id)
      
      var values = {};
      $.each($('#updateForm').serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });
      console.log(values);

      var url = $("#updateForm").attr('action');

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
        url: "/kewatk2/" + id,
        type: "DELETE",
        success: function () {
				  location.replace = "/kewatk2";;
				}
      })

    } 

    function tambahAsetUntukDitolak() {
      var option_data = ""
      getInfoKewatk1(selected_kewatk1);
     

     $("#info_kewatk2_create").append(

       `
        <div class="card mt-4" id="basic-info">
          <div class="card-header">
             <div class="row">
               <div class="col">
                 <h2 class="mb-0">Tambah Info Penolakan</h2>
               </div>
              <div class="text-end mr-2">
                <a class="align-self-end btn btn-sm btn-primary text-white" onclick="$(this).closest('.card').remove()">Buang</a>
              </div>

             </div>
           </div>

          <div class="card-body pt-0">

          <br>

          <div class="row">

              
            <div class="col">
              <label for="">No Kod</label>
              <div class="input-group">
                <select id="no_kod_select" class="form-control mb-3" name="no_kod[]">
                </select>
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Ditolak</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_ditolak[]" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Kuantiti Kurang Lebih</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="kuantiti_kurang_lebih[]" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Sebab Penolakan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="sebab_penolakan[]" value="" required>
              </div>
            </div>

            <div class="col">
              <label for="">Catatan</label>
              <div class="input-group">
                <input class="form-control mb-3" type="text" name="catatan[]" value="" required>
              </div>
            </div>

            </div>

            </div>

            </div>

         </div>`

     )

    }

    function getInfoKewatk1(obj) {
      selected_kewatk1 = obj;
      $("#button_tambah").show();

      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/info_kewatk1/" + obj.value,
        type: "GET",
        success: function (data) {
          no_kod = data;

          let option_data = "";
          for (let i=0; i < no_kod.length; i++) {
            option_data = option_data + `<option value=${no_kod[i].id}>${no_kod[i].no_kod}</option>`
          }


          $("select[name='no_kod[]'] option").remove();
          $("select[name='no_kod[]']").append(option_data);

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
