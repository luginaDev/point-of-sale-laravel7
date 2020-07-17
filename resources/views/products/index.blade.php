@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>
    <form class="forms-sample" action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col-md-12">  @include('layouts.message')</div>
    
      
        <div class="col-lg-8 col-xl-8 grid-margin grid-margin-xl-0 stretch-card">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Form Produk</h6>
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label">Kode Produk</label>
                        <input  type="text"  class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}" placeholder="Silahkan Kosongkan (otomatis)"  name="code" >
                      </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label">Nama Produk</label>
                        <input required type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Enter Nama Produk">
                      </div>
                    </div><!-- Col -->
                  </div><!-- Row -->
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label">Stock</label>
                        <input required type="number" min="0" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}" placeholder="Enter stock">
                      </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="control-label">Harga</label>
                        <input required type="number" min="0" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" autocomplete="off" placeholder="Enter Harga">
                      </div>
                    </div><!-- Col -->
                  </div><!-- Row -->
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="control-label">Deskripsi Produk</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" required></textarea>
                      </div>
                    </div><!-- Col -->
                    

                  </div><!-- Row -->

               
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-xl-4 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">buat produk baru</h6>
                      
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Kategori</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        
                          <label for="exampleFormControlTextarea1">Foto Produk </label>
                            
                            <input required type="file" id="myDropify" name="photo" class="border"/>
                        
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </div>
            </div>
        </div>
    </form>
    </div> <!-- row -->
</div>
@endsection