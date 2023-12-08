@extends('layouts.main')

@section('title', 'User')

@section('content')

<style>
  .actionA a:hover {
    color: rgb(53, 52, 52);
  }
</style>
  
<div class="row">
  <div class="col-12 d-flex justify-content-between mb-2">
    <div class="col-6 d-flex flex-column justify-content-start">
      <h3>Users</h3>
      
      
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0 m-0">
          <li class="breadcrumb-item"><a href="#">Users</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
    </div>
    <div class="col-6 d-flex justify-content-end">
      <a href="{{ route('usersBannedView') }}" class="btn btn-danger h-10 me-2">View Banned User</a>
      <a href="{{ route('usersActived') }}" class="btn btn-success h-10">View Activated</a>
    </div>
  </div>
  @if(session('success'))
        <div class="alert alert-success w-10 alertAdd">
          {{ session('success') }}
        </div>

        <script>
          // Setelah 3 detik, sembunyikan pesan alert
          setTimeout(function(){
              var alertElement = document.querySelector('.alertAdd');
              alertElement.style.display = 'none';
          }, 3000); // 3000 milidetik (3 detik)
      </script>
      @endif
  @if(session('successBan'))
        <div class="alert alert-success  alertBan">
          {{ session('successBan') }}
        </div>

        <script>
          // Setelah 3 detik, sembunyikan pesan alert
          setTimeout(function(){
              var alertElement = document.querySelector('.alertBan');
              alertElement.style.display = 'none';
          }, 3000); // 3000 milidetik (3 detik)
      </script>
      @endif
      @if(session('successEdit'))
      <div class="alert alert-success alertEdit">
        {{ session('successEdit') }}
      </div>
      
      <script>
        // Setelah 3 detik, sembunyikan pesan alert
        setTimeout(function(){
          var alertElement = document.querySelector('.alertEdit');
          alertElement.style.display = 'none';
        }, 3000); // 3000 milidetik (3 detik)
        </script>
      @endif
      
</div>

<div class="card">
  
  <div class="card-header d-flex justify-content-between align-items-center">
    
      <h4 class="card-title fw-bold">Users List</h4>
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
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @if ($users->isEmpty())
                        <tr>
                          <td width = "30%" colspan="4" style="text-align: center;">
                             Not Found
                          </td>
                      </tr>
                @else
                @foreach ($users as $index => $data)  
                <tr>
                    <td>{{ $index + $users->firstItem() }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->nim }}</td>
                    <td>{{ $data->phone }}</td>
                    @if ($data->status != 'active')
                    <td>
                        <span class="badge bg-danger">{{ $data->status }}</span>
                    </td>
                    @else
                    <td>
                      <span class="badge bg-success">{{ $data->status }}</span>
                    </td>
                    @endif
                    <td width="15%">
                        <a href='{{ route('usersDetail', $data->slug) }}'  class="badge bg-warning actionA">Detail</a>
                        {{-- Delete sementara (Soft Deletes) --}}
                        <a href='{{ route('usersBanned', $data->slug) }}'  class="badge bg-danger actionA">Banned</a>
                    </td>
                </tr>
                @endforeach
                @endif
              </tbody>
          </table>
          <div class="mt-2 float-end">
            {{ $users->links() }}
          </div>
      </div>
  </div>
</div>

@endsection