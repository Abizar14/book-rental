@extends('layouts.main')

@section('title', 'Add Category')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

<div class="row">
    <div class="col-12 d-flex justify-content-between mb-2">
      <div class="col-6 d-flex flex-column justify-content-start">
        <h3>Books Add</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href={{ route('books') }}>Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
          </ol>
        </nav>
      </div>
      <a href="{{ route('books') }}" class="btn btn-primary h-10">Books List</a>
    </div>
    <div class="col-12">
      {{-- breadcumb --}}
      
    </div>
  </div>

  @if(session('success'))
      <div class="alert alert-success alertEdit">
        {{ session('success') }}
      </div>
      
      <script>
        // Setelah 3 detik, sembunyikan pesan alert
        setTimeout(function(){
          var alertElement = document.querySelector('.alertEdit');
          alertElement.style.display = 'none';
        }, 3000); // 3000 milidetik (3 detik)
        </script>
      @endif

<div class="col-md-12">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title fw-bold">Add Books</h4>
      </div>
      
      <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <form action={{ route('booksStore') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="kode_buku">Kode Buku</label>
                    <input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder="Kode Buku" required>
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Cover Buku">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug Buku" required>
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
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" id="status" placeholder="Status Buku" required value='in stock' readonly>
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