@extends('layouts.main')

@section('title', 'Rent Log')

@section('content')

  
<div class="row">
  <div class="col-12 d-flex justify-content-between mb-2">
    <div class="col-6 d-flex flex-column justify-content-start">
      <h3>Rent Log Detail</h3>
      
      
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0 m-0">
          <li class="breadcrumb-item"><a href="#">Rent Log</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
    
      <h4 class="card-title fw-bold">Rent Log Details</h4>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
  
  <div class="card-body px-0 pb-0">
      <div class="table-responsive">
          <x-rent-log-table :rent='$rent' />
          <div class="mt-2 float-end">
            {{ $rent->links() }}
          </div>
      </div>
  </div>
</div>

@endsection