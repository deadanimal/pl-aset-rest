@extends('layouts.base_stor') @section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive py-4">
                        <table class="table table-custom-simplified table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Value</th>
                                    <th>Nama</th>
                                    <th>Main Text</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kaedahPelupusan as $kp)
                                    <tr>
                                        <td>{{ $kp->id }}</td>
                                        <td>{{ $kp->value }}</td>
                                        <td>{{ $kp->text }}</td>
                                        <td>{{ $kp->main_text }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#exampleModal-{{ $kp->id }}"> <span
                                                    class="fas fa-edit"></span>
                                            </button>
                                            <form action="{{ route('fixing.destroy', $kp->id) }}" method="post"
                                                class="d-inline-flex">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger"><span
                                                        class="fas fa-trash-alt"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $kp->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $kp->id }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('fixing.update', $kp->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <input type="text" name="value" value="{{ $kp->value }}"
                                                            class="form-control mb-3">
                                                        <input type="text" name="text" value="{{ $kp->text }}"
                                                            class="form-control mb-3">
                                                        <input type="text" name="main_text" value="{{ $kp->main_text }}"
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive py-4">
                        <table class="table table-custom-simplified table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Kaedah Pelupusan ID</th>
                                    <th>text</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subKaedah as $sub)
                                    <tr>
                                        <td>{{ $sub->id }}</td>
                                        <td>{{ $sub->kaedah_pelupusan_id }}</td>
                                        <td>{{ $sub->text }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#exampleModal-{{ $sub->id }}"> <span
                                                    class="fas fa-edit"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $sub->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $sub->id }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('fixing.update', $sub->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <input type="hidden" name="sub" value="YES">
                                                        <input type="text" name="value" value="{{ $sub->value }}"
                                                            class="form-control mb-3">
                                                        <input type="text" name="text" value="{{ $sub->text }}"
                                                            class="form-control mb-3">
                                                        <input type="text" name="main_text" value="{{ $sub->main_text }}"
                                                            class="form-control mb-3">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                TAMBAH SUB
            </div>
            <div class="card-body">
                <form action="{{ route('fixing.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="">Kaedah Pelupusan ID</label>
                            <select name="kaedah_pelupusan_id" class="form-control">
                                <option selected disabled hidden>Pilih</option>
                                @foreach ($kaedahPelupusan as $kp)
                                    <option {{ $kp->value == 6 ? 'selected' : '' }} value="{{ $kp->id }}">
                                        {{ $kp->text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="">Text</label>
                            <input type="text" name="text" class="form-control">
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
