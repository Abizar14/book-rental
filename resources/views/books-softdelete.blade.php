@extends('layouts.main')

@section('title', 'Books')

@section('content')

    <style>
        .actionA a:hover {
            color: rgb(53, 52, 52);
        }
    </style>

    <div class="row">
        <div class="col-12 d-flex justify-content-between mb-2">
            <div class="col-6 d-flex flex-column justify-content-start">
                <h3>Books Soft Deletes</h3>


                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href={{ route('books') }}>Books</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href={{ route('books') }} class="btn btn-dark h-10 me-2">Books Data</a>
                <a href="{{ route('booksAdd') }}" class="btn btn-primary h-10">ADD DATA</a>
            </div>
        </div>
        @if (session('successRes'))
            <div class="alert alert-success alertRes">
                {{ session('successRes') }}
            </div>

            <script>
                // Setelah 3 detik, sembunyikan pesan alert
                setTimeout(function() {
                    var alertElement = document.querySelector('.alertRes');
                    alertElement.style.display = 'none';
                }, 3000); // 3000 milidetik (3 detik)
            </script>
        @endif
        @if (session('successDel'))
            <div class="alert alert-warning alertDel">
                {{ session('successDel') }}
            </div>

            <script>
                // Setelah 3 detik, sembunyikan pesan alert
                setTimeout(function() {
                    var alertElement = document.querySelector('.alertDel');
                    alertElement.style.display = 'none';
                }, 3000); // 3000 milidetik (3 detik)
            </script>
        @endif
    </div>

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="card-title fw-bold">Book List Soft Deletes</h4>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>

        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class='table mb-0' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Cover</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($softDeleteBooks->isEmpty())
                            <tr>
                                <td width="30%" colspan="8" style="text-align: center;">
                                    Not Found
                                </td>
                            </tr>
                        @else
                            @foreach ($softDeleteBooks as $index => $data)
                                <tr>
                                    <td>{{ $index + $softDeleteBooks->firstItem() }}</td>
                                    <td>{{ $data->kode_buku }}</td>
                                    <td>{{ $data->judul }}</td>
                                    @if ($data->cover == '')
                                        <td>
                                            <span class="badge bg-secondary">Cover Not Found</span>
                                        </td>
                                    @else
                                        <td>
                                            <img src="{{ asset('images/cover default.png') }}" alt="" height="100px"
                                                width="100px">
                                        </td>
                                    @endif
                                    <td>{{ $data->slug }}</td>
                                    <td>
                                        @foreach ($data->categories as $category)
                                            {{ $category->name }}
                                        @endforeach
                                    </td>
                                    @if ($data->status == 'in stock')
                                        <td>
                                            <span class="badge bg-success">{{ $data->status }}</span>
                                        </td>
                                    @elseif ($data->status == 'in stock')
                                        <td>
                                            <span class="badge bg-danger">{{ $data->status }}</span>
                                        </td>
                                    @endif
                                    <td width="15%">
                                        <a href='/books/restore/{{ $data->id }}' class="badge bg-warning actionA">Restore</a>

                                        {{-- // Delete sementara (Soft Deletes) --}}
                                        <a href='/books/deletePermanent/{{ $data->id }}'
                                            class="badge bg-danger actionA">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif



                    </tbody>
                </table>

                <div class="mt-2 float-end">

                    {{ $softDeleteBooks->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
