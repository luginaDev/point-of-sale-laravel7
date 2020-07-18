@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">@include('layouts.message')</div>
      <div class="col-lg-12 col-xl-12 grid-margin grid-margin-xl-0 stretch-card mb-5">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Stock</th>
                    <th>Harga</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($produk as $item)
                  <tr>
                      <td>{{ $item->code }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->description }}</td>
                      <td>{{ $item->category->name }}</td>
                      <td>{{ $item->stock }}</td>
                      <td>{{ $item->price }}</td>
                      <td>
                        <form action="{{ route('produk.destroy',  $item->id) }}" method="post">
                          @method('DELETE')
                          @csrf
                            <button type="button" class="btn btn-primary btn-icon" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                <i data-feather="edit"></i>
                            </button>   
                            <button type="submit" class="btn btn-danger btn-icon">
                                <i data-feather="delete"></i>
                            </button>
                        </form>
                      </td>
                    </tr>
                    <!-- modal untuk edit data -->
                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form class="forms-sample" action="{{ route('produk.update', $item->id) }}" method="post">
                                  @method('PUT')
                                  @csrf
                                  <div class="row">  
                                    <div class="col-lg-8 col-xl-8 grid-margin grid-margin-xl-0 stretch-card">
                                      <div class="card">
                                        <div class="card-body">
                                          <h6 class="card-title">Form Produk</h6>
                                            <form>
                                              <div class="row">
                                                <div class="col-sm-6">
                                                  <div class="form-group">
                                                    <label class="control-label">Kode Produk</label>
                                                  <input  type="text"  class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}" placeholder="Silahkan Kosongkan (otomatis)"  readonly value="{{ $item->code }}" name="code" >
                                                  </div>
                                                </div><!-- Col -->
                                                <div class="col-sm-6">
                                                  <div class="form-group">
                                                    <label class="control-label">Nama Produk</label>
                                                    <input required type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $item->name }}" placeholder="Enter Nama Produk">
                                                  </div>
                                                </div><!-- Col -->
                                              </div><!-- Row -->
                                              <div class="row">
                                                <div class="col-sm-6">
                                                  <div class="form-group">
                                                    <label class="control-label">Stock</label>
                                                    <input value="{{ $item->stock }}" required type="number" min="0" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}" placeholder="Enter stock">
                                                  </div>
                                                </div><!-- Col -->
                                                <div class="col-sm-6">
                                                  <div class="form-group">
                                                    <label class="control-label">Harga</label>
                                                    <input value="{{ $item->price }}" required type="number"  min="0" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" autocomplete="off" placeholder="Enter Harga">
                                                  </div>
                                                </div><!-- Col -->
                                              </div><!-- Row -->
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <div class="form-group">
                                                    <label class="control-label">Deskripsi Produk</label>
                                                    <textarea name="description" id="" cols="30" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" required>{{ $item->description }}</textarea>
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
                                                        @foreach ($kategori as $katego)
                                                            <option value="{{ $katego->id }}" {{ $katego->id == $item->category_id ? 'selected':'' }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    
                                                      <label for="exampleFormControlTextarea1">Foto Produk </label>
                                                        
                                                        <input required type="file" id="myDropifys" name="photo" class="border" data-max-file-size="2M" data-default-file="{{ asset('assets/product/' . $item->photo) }}"/>
                                                    
                                                  </div>
                                                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                              </div>
                                        </div>
                                    </div>
                                    </div
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                   
                                  </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  @endforeach
                </tbody>
              </table>
              {!! $produk->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
      <form class="forms-sample" action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">  
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