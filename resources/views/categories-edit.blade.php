@extends('layouts.main')

@section('title', 'Edit Category')

@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between mb-2">
      <div class="col-6 d-flex flex-column justify-content-start">
        <h3>Categories Edit</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href={{ route('categories') }}>Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
      <a href="{{ route('categories') }}" class="btn btn-primary h-10">Category List</a>
    </div>
    <div class="col-12">
      {{-- breadcumb --}}
      
    </div>
  </div>

<div class="col-md-12">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title fw-bold">Edit Category</h4>
      </div>
      
      <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <form action={{ route('categoriesUpdate', $category->id) }} method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name Category</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name Category" required value="{{ old('name', $category->name) }}">
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
  
@endsection