@extends('layouts.base_umum') @section('content')

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Perbadanan Labuan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/comments"><i class="fas fa-file"></i></a></li>
                                <li class="breadcrumb-item"><a href="/comments">Maklum Balas</a></li>
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
                            <h2 class="mb-0">Senarai Maklum Balas</h2>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">

                    <table class="table table-custom-simplified table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Bil</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email </th>
                                <th scope="col">Komen</th>
                                <th scope="col">Tindakan</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>

                                    <td scope="col">{{ $loop->index + 1 }}</td>
                                    <td scope="col">{{ $comment->name }}</td>
                                    <td scope="col">{{ $comment->email }}</td>
                                    <td scope="col">{{ $comment->komen }}</td>

                                    <td scope="col">
                                        <a href="{{ route('comments.update', $comment->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-reply"></i></a>
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post"
                                            class=" d-inline-flex">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
