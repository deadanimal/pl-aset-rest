@extends('layouts.base_pa') @section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/plpk_pa_0201">plpk_pa_0201</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div id="updateDiv">
            <form id="updateForm" action="/plpk_pa_0201/{{ $plpk_pa_0201->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                            
                            <h2 class="mb-0">Sunting PLPK PA 0201 </h2>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-4">
                                <label for="">No Wo</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="no_wo" value="{{ $plpk_pa_0201->no_wo }}" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="">Jabatan</label>
                                <select class="form-control mb-3" name="jabatan" required>
                                    <option value="{{ $plpk_pa_0201->jabatan }}" required required selected disabled hidden>{{ $plpk_pa_0201->jabatan }}
                                    </option required>
                                    @foreach ($kod_jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}{{ $jabatan->nama_jabatan }}">
                                            {{ $jabatan->nama_jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="">No Plet/Jenis Kenderaan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="plet_no_jenis_kenderaan" value="{{ $plpk_pa_0201->plet_no_jenis_kenderaan }}"
                                        required>
                                </div>
                            </div>

                            <div class="col-4">
                                <label for="">Pengguna Terakhir</label>
                                <div class="input-group">
                                    <select class="form-control mb-3" name="pengguna_terakhir" required>
                                        <option value="{{ $plpk_pa_0201->pengguna_terakhir }}" required required selected disabled hidden>{{$plpk_pa_0201->pg_terakhir->name}}
                                        </option required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Tarikh Rosak</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="date" name="tarikh_rosak" value="{{ $plpk_pa_0201->tarikh_rosak }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Bil</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="bil" value="{{ $plpk_pa_0201->bil }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Perihal Kerosakan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="perihal_rosak" value="{{ $plpk_pa_0201->perihal_rosak }}" required>
                                </div>
                            </div>

                            @if (auth()->user()->jawatan == "superadmin") 
                            <div class="col-4">
                                <label for="">Kos Penyelenggaraan Dahulu</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="kos_penyelenggaraan_dulu" value="{{ $plpk_pa_0201->kos_penyelenggaraan_dulu }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Anggaran Kos Penyelenggaraan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="anggaran_kos_penyelenggaraan"
                                        value="{{ $plpk_pa_0201->anggaran_kos_penyelenggaraan }}" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Syor Ulasan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="syor_ulasan" value="{{ $plpk_pa_0201->syor_ulasan }}" required>
                                </div>
                            </div>
                            @endif

                            



                            @if (auth()->user()->jawatan == "pemeriksa") 
                            {{-- <div class="col-4">
                                <label for="">Tarikh Lulus Tak</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="date" value="{{ $plpk_pa_0201->tarikh_lulus_tak }}" required>
                                </div>
                            </div> --}}
                            
                            <div class="col-4">
                                <label for="">Pembaikan Dalaman Luar</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="pembaikan_dalaman_luar" value="{{ $plpk_pa_0201->pembaikan_dalaman_luar }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="">Alat Ganti</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="alatganti" value="{{ $plpk_pa_0201->alatganti }}" required>
                                </div>
                            </div>
                            
                            @endif
                            @if (auth()->user()->jawatan == "ketuajabatan") 
                            <div class="col-4">
                                <label for="">Ulasan</label>
                                <div class="input-group">
                                    <input class="form-control mb-3" type="text" name="ulasan" value="{{ $plpk_pa_0201->ulasan }}" required>
                                </div>
                            </div>

                            <br/>
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="radio" name="status" value="LULUS" required>
                                    <label for="html">Diluluskan</label><br>
                                    <input type="radio" name="status" value="DITOLAK" required>
                                    <label for="html">Ditolak</label><br>
                                </div>
                            </div>
                            <br/>

                            @endif
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                    </div>
            </form>
        </div>

        
    </div>

    <script type="text/javascript">
        function deleteData(obj) {
            var id = obj.id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/info_plpk_pa_0201/" + id,
                type: "DELETE",
                success: function() {
                }
            })
        }
    </script>
@endsection
