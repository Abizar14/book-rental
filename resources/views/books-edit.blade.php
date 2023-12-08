@extends('layouts.main')

@section('title', 'Edit Books')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

<div class="row">
    <div class="col-12 d-flex justify-content-between mb-2">
      <div class="col-6 d-flex flex-column justify-content-start">
        <h3>Categories Edit</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href={{ route('books') }}>Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
      <a href="{{ route('books') }}" class="btn btn-primary h-10">Books List</a>
    </div>
    <div class="col-12">
      {{-- breadcumb --}}
      
    </div>
  </div>
{{ $books }}
<div class="col-md-12">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title fw-bold">Edit Books</h4>
      </div>
      
      <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <form action={{ route('booksUpdate', $books->id) }} method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="kode_buku">Kode Buku</label>
                  <input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder="Kode Buku" required value="{{ old('kode_buku', $books->kode_buku) }}">
                </div>

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku" required value="{{ old('judul', $books->judul) }}">
                </div>
                <div class="form-group">
                    <label for="image">Cover</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Cover Buku"  value="{{ old('cover', $books->cover) }}">
                </div>

                <div class="form-group">
                  <label for="cover" style="display: block;">Current Image</label>
                  @if ($books->cover == null & $books->cover == '')
                  <img src="{{ asset('images/cover default.png') }}" alt="" width="100px" height="100px">
                  @else
                  <img src="{{ asset('/storage/cover/'.$books->cover) }}" alt="" width="100px" height="100px">
                  @endif
                </div>
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug Buku" required value="{{ old('slug', $books->slug) }}">
                </div>

                <div class="form-group">
                  <label for="categories">CATEGORY BOOK</label>
                  <select class="choices form-select multiple-remove" name="categories[]" multiple="multiple">
                      <optgroup label="Category">
                        @foreach ($categories as $data)
                        <option value={{ $data->id }}>{{ $data->name }}</option>
                        @endforeach
                      </optgroup>
                  </select>
              </div>

              <div class="form-group">
                <label for="categories">Category: 
                  @foreach ($books->categories as $category)
                    <span class="text-uppercase">
                      {{ $category->name }}
                    </span>
                    @endforeach
                </label>
              </div>

              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok Buku" required value="{{ old('stok', $books->stok) }}">
              </div>

              <div class="form-group">
                  <label for="status">Status</label>
                  <input type="text" class="form-control" name="status" id="status" placeholder="Status Buku" required value="{{ old('status', $books->status) }}">
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.choices').select2();
  });
</script>
  
@endsection