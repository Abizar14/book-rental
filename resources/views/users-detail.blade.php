@extends('layouts.main')

@section('title', 'Add Category')

@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between mb-2">
      <div class="col-6 d-flex flex-column justify-content-start">
        <h3>Users Detail</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href={{ route('users') }}>Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
          </ol>
        </nav>
      </div>
      <a href="{{ route('users') }}" class="btn btn-primary h-10">Users List</a>
    </div>
    <div class="col-12">
      {{-- breadcumb --}}
      
    </div>
  </div>

  @if(session('success'))
        <div class="alert alert-success alertAdd">
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

<div class="col-md-12">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title fw-bold">User Details</h4>
      </div>
      
      <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username User" value="{{ $users->username }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim User" required value="{{ $users->nim }}" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone User" required value="{{ $users->phone }}" readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="Status User" required value="{{ $users->status }}" readonly>
                </div>

                <div class="form-group">
                  @if($users->status == 'inactived')
                  <a href="{{ route('approveUsers', $users->slug) }}" class="btn btn-success mt-2">Approve Users</a>
                  @endif
                </div>
              </div>

          </div>
      </div>

    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <x-rent-log-table :rent='$rent' />
        </div>
      </div>
    </div>
</div>
  
@endsection