@extends('layouts.main')

@section('title', 'Users')

@section('content')

    <style>
        .actionA a:hover {
            color: rgb(53, 52, 52);
        }
    </style>

    <div class="row">
        <div class="col-12 d-flex justify-content-between mb-2">
            <div class="col-6 d-flex flex-column justify-content-start">
                <h3>Users Banned</h3>


                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href={{ route('users') }}>Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href={{ route('users') }} class="btn btn-dark h-10 me-2">Users Data</a>
                {{-- <a href="#" class="btn btn-primary h-10">ADD DATA</a> --}}
            </div>
        </div>
        @if (session('successBan'))
            <div class="alert alert-success alertBan">
                {{ session('successBan') }}
            </div>

            <script>
                // Setelah 3 detik, sembunyikan pesan alert
                setTimeout(function() {
                    var alertElement = document.querySelector('.alertBan');
                    alertElement.style.display = 'none';
                }, 3000); // 3000 milidetik (3 detik)
            </script>
        @endif
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

            <h4 class="card-title fw-bold">Users List Banned / Unnbanned</h4>
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
                            <th>Username</th>
                            <th>NIM</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($banUser->isEmpty())
                        <tr>
                          <td width = "30%" colspan="5" style="text-align: center;">
                             Not Found
                          </td>
                      </tr>
                        @else
                            @foreach ($banUser as $index => $data)
                                <tr>
                                    <td>{{ $index + $banUser->firstItem() }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ $data->nim }}</td>
                                    <td>
                                        <span class="badge bg-danger">Banned</span>
                                    </td>
                                        
                                    <td width="20%">
                                        <a href="{{ route('usersRestore', $data->slug) }}"class="badge bg-warning actionA">Unbanned Data</a>
                                        <a href="{{ route('bannedUsers', $data->slug) }}"
                                            class="badge bg-danger actionA">Ban Data</a>

                                            
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        

                    </tbody>
                </table>
                
                <div class="mt-2 float-end">

                    {{ $banUser->links() }}
                </div>
            </div>
        </div>
    </div>

    

@endsection
