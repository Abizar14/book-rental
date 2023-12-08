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
      <h3>Books</h3>
      
      
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-0 m-0">
          <li class="breadcrumb-item"><a href={{ route('books') }}>Books</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
    </div>
    <div class="col-6 d-flex justify-content-end">
      <a href="/books/softdelete" class="btn btn-danger h-10 me-2">Recycle Book</a>
      <a href="{{ route('booksAdd') }}" class="btn btn-primary h-10">Add Book</a>
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
    
      <h4 class="card-title fw-bold">Book Lists</h4>
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
                      <th>Category Book</th>
                      <th>Stok</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                {{-- @if ($books->isEmpty())
                        <tr>
                          <td width = "30%" colspan="3" style="text-align: center;">
                             Not Found
                          </td>
                      </tr>
                @else --}}
                @foreach ($books as $index => $data)  
                <tr>
                    <td>{{ $index + $books->firstItem() }}</td>
                    <td>{{ $data->kode_buku }}</td>
                    <td>{{ $data->judul }}</td>
                    @if ($data->cover == null)
                    <td>
                      <img src="{{ asset('images/cover default.png') }}" alt="" height="100px" width="100px"> 
                    </td>
                    @else
                    <td>
                      <img src="{{ asset('/storage/cover/'.$data->cover) }}" alt="" height="100px" width="100px">
                    </td>
                    @endif
                    <td>{{ $data->slug }}</td>
                    <td>
                      @foreach ($data->categories as $category)
                        {{ $category->name }}
                      @endforeach
                    </td>
                    <td>{{ $data->stok }}</td>
                    @if($data->stok > 0 )
                    <td>
                      <span class="badge bg-success">{{ $data->status }}</span>
                    </td>
                    @else
                    <td>
                      <span class="badge bg-danger">No stock</span>
                    </td>
                    @endif
                    <td width="15%">
                        <a href='books/edit/{{ $data->id }}'  class="badge bg-warning actionA">Edit</a>
                        
                         {{-- // Delete sementara (Soft Deletes) --}}
                        <a href='/books/delete/{{ $data->id }}'  class="badge bg-danger actionA">Hapus</a>
                    </td>
                </tr>
                @endforeach
                {{-- @endif --}}

              </tbody>
          </table>
          <div class="mt-2 float-end">

            {{ $books->links() }}
          </div>
      </div>
  </div>
</div>

@endsection