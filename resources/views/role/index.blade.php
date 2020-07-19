@extends('layouts.main')
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">  @include('layouts.message')</div>
        <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">buat kategori baru</h6>
                    
                <form class="forms-sample" action="{{ route('role.store') }}" method="post">
                    @csrf
                      <div class="form-group">
                        <label for="kategori">Role</label>
                        <input type="text" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" name="name" id="kategori" autocomplete="off" placeholder="Username" required>
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     
                    </form>
                  </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Role</h6>
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
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Role</th>
                                    <th class="pt-0">Guard</th>
                                    <th class="pt-0">Created at</th>
                                    <th class="pt-0">Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($role as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->guard_name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="post">
                                    @method('DELETE')
                                      @csrf
                                      <div class="btn-group">
                                          
                                        <button type="submit" class="btn btn-danger btn-icon">
                                            <i data-feather="delete"></i>
                                          </button>
                                        
                                      </div>
                                   
                                    </form> 
                                </td>    
                                    
                                </tr> 

                                @endforeach
                                
                            </tbody>
                        </table>
                        {!! $role->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div>
@endsection