@extends('layouts.main')

@section('title', 'Return Book')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

<div class="row">
    <div class="col-12 d-flex justify-content-between mb-2">
      <div class="col-6 d-flex flex-column justify-content-start">
        <h3>Return Book</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href={{ route('books') }}>Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Return</li>
          </ol>
        </nav>
      </div>
      <a href="{{ route('books') }}" class="btn btn-primary h-10">Books List</a>
    </div>
    <div class="col-12">
      {{-- breadcumb --}}
      
    </div>
  </div>

<div class="col-md-12">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title fw-bold">Return Books</h4>
      </div>

  @if(session('success'))
      <div class="alert alert-success successReturn">
        {{ session('success') }}
      </div>

      <script>
        // Setelah 3 detik, sembunyikan pesan alert
        setTimeout(function(){
            var alertElement = document.querySelector('.successReturn');
            alertElement.style.display = 'none';
        }, 3000); // 3000 milidetik (3 detik)
    </script>
    @endif

      <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <form action="{{ route('saveReturnBook') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="user_id">User</label>
                  <select class="form-control" name="user_id" readonly>
                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->username }}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="books_id">Buku</label>
                  <select class="form-control bookbox" name="books_id">
                    <option value="">Pilih Buku</option>
                    @foreach ($book as $data)
                    <option value={{ $data->id }}> {{ $data->kode_buku }}  {{ $data->judul }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
               
                </form>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.bookbox').select2();
    $('.userbox').select2();
  });
</script>
@endsection