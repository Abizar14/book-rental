@extends('layouts.main')

@section('title', 'Book List')

@section('content')
<div class="row">
  <div class="col-12 d-flex justify-content-between mb-2">
    <div class="col-6 d-flex flex-column justify-content-start">
      <h3>Books List</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0 m-0">
          <li class="breadcrumb-item"><a href={{ route('books') }}>Books</a></li>
          <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
      </nav>
    </div>
    <a href="{{ route('books') }}" class="btn btn-primary h-10  me-4">Books List</a>
  </div>
  <div class="col-12">
    {{-- breadcumb --}}
    
  </div>
</div>
<form action="" method="get">
  <div class="col-lg-12">
    <div class="card p-4">
      <h2 class="text-center fw-bold">Books List</h2>
      <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur aliquam nesciunt voluptatem provident cupiditate optio beatae quisquam officia dolore ab?</p>
      <div class="col-12 d-flex justify-content-center mb-3 gap-2">
        <input class="form-control w-50" name="judul" type="search" placeholder="Search A Book" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
      <div class="row">
        @if(Auth::user()->role_id == 1)
        @iF($books->isEmpty())
          <h3 class="text-center">
            Not Found
          </h3>
        @else
          @foreach ($books as $data)
          <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card">
            <div class="card-content h-100 ">
              <div class="w-full d-flex align-items-center justify-center">
              @if($data->cover == null)
              <img class="card-img-top p-2 w-75 mx-auto h-auto " src="{{ asset('images/cover default.png') }}" alt="Card image cap" draggable="false">
              @else
              <img class="card-img-top p-2 w-75 mx-auto h-auto " src="{{ asset('/storage/cover/'.$data->cover) }}" alt="Card image cap" draggable="false">
              @endif
              </div>
              <div class="card-body">
                <h4 class="card-title">{{ $data->kode_buku }} <span class="h5 fw-light">{{ '('.$data->stok.')' }}</span></h4>
                <p class="card-text">
                    {{ $data->judul }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                <p class="d-flex gap-1">
                <a href="{{ route('booksEdit', $data->id) }}" class='bg-yellow p-2 rounded-1 d-flex align-items-center justify-center'>
                  <i data-feather="edit" class="  text-white" width="20"></i>
                </a>
                <a href="/book-lists" class='bg-danger p-2 rounded-1 d-flex align-items-center justify-center '>
                    <i data-feather="trash" class=" text-white" width="20"></i>
                  </a>
                </p>
                @if($data->stok > 0)
                <p><span class="badge bg-success">{{ $data->status }}</span></p>
                @else
                <p><span class="badge bg-danger">No Stock</span></p>
                @endif
                </div>
                </div>
              </div>
            </div>
        </div>
        @endforeach
        @endif
        @else
        @foreach ($books as $data)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card">
            <div class="card-content h-100 ">
              <div class="w-full d-flex align-items-center justify-center">
              @if($data->cover == null)
              <img class="card-img-top p-2 w-75 mx-auto h-auto " src="{{ asset('images/cover default.png') }}" alt="Card image cap" draggable="false">
              @else
              <img class="card-img-top p-2 w-75 mx-auto h-auto " src="{{ asset('/storage/cover/'.$data->cover) }}" alt="Card image cap" draggable="false">
              @endif
              </div>
              <div class="card-body">
                <h4 class="card-title">{{ $data->kode_buku }} <span class="h5 fw-light">{{ '('.$data->stok.')' }}</span></h4>
                <p class="card-text">
                    {{ $data->judul }}
                </p>
                <div class="d-flex justify-content-between align-items-center">
                <p class="d-flex gap-1">
                <a href="{{ route('bookRent') }}" class='bg-yellow p-2 rounded-3 d-flex align-items-center justify-center'>
                  <span class="text-white fw-bold">Pinjam</span>
                </a>
                </p>
                @if($data->stok > 0)
                <p><span class="badge bg-success">{{ $data->status }}</span></p>
                @else
                <p><span class="badge bg-danger">No Stock</span></p>
                @endif
                </div>
                </div>
              </div>
            </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
</form>
      @endsection