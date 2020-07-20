 @extends('layouts.main')
@section('content')
<div class="page-content" id="dw">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">  @include('layouts.message')</div>
        <div class="col-lg-4 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Transaksi</h6>
                    
                    <form action="#" @submit.prevent="addToCart">
                       
                      <div class="form-group">
                        <label for="kategori">produk</label>
                        <select name="produk_id" id="produk_id"  v-model="cart.product_id" class="form-controll">
                            @foreach ($products as $item)
                                <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->name }}</option>   
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="kategori">qty</label>
                        <input type="number" v-model="cart.qty" id="qty" min="1" value="1" class="form-controll">
                      </div>

                      <button :disabled="submitCart" class="btn btn-primary " >
                        <i data-feather="shopping-bag"></i> @{{ submitCart ? 'Loading...':'Ke Keranjang' }}
                      </button> 
                    </form>
                
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-5 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Category</h6>
                        <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" v-if="product.name">
                        
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">kode</th>
                                    <td>:</td>
                                    <td>@{{ product.code }}</td>
                                </tr>
                                <tr>
                                    <th class="pt-0">produk</th>
                                    <td>:</td>
                                    <td>@{{ product.name }}</td>
                                </tr>
                                <tr>
                                    <th class="pt-0">harga</th>
                                    <td>:</td>
                                    <td>@{{ product.price | currency }}</td>
                                </tr>
                            </thead>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3" v-if="product.photo">
            <img :src="'/assets/product/' + product.photo" 
                height="150px" 
                width="150px" 
                :alt="product.name">
        </div>
        <div class="col-lg4 col-xl-5 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>produk</th>
                                    <th>harga</th>
                                    <th>qty</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(row, index) in shoppingCart">
                                        <td>@{{ row.name }} (@{{ row.code }})</td>
                                        <td>@{{ row.price | currency }}</td>
                                        <td>@{{ row.qty }}</td>
                                        <td>
                                           
                                            <button 
                                                @click.prevent="removeCart(index)"    
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
    <script src="{{ asset('js/transaksi.js') }}"></script>
@endsection