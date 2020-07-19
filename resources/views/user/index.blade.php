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
                    <h6 class="card-title">buat user baru</h6>
                    
                <form class="forms-sample" action="{{ route('user.store') }}" method="post">
                    @csrf
                      <div class="form-group">
                        <label for="kategori">name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" name="name" id="kategori" autocomplete="off" placeholder="Username" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">email</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" name="email" id="kategori" autocomplete="off" placeholder="email" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">password</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" name="password" id="kategori" autocomplete="off" placeholder="password" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">role</label>
                        <select name="role" id="" class="form-controll">
                            @foreach ($role as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
                        <h6 class="card-title mb-0">User</h6>
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
                                    <th class="pt-0">Nama</th>
                                    <th class="pt-0">Email</th>
                                    <th class="pt-0">Role</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($user as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @foreach ($item->getRoleNames() as $role)
                                        <span class="badge badge-primary">  {{ $role }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($item->status)
                                        <span class="badge badge-success">Aktive</span>
                                        @else
                                        <span class="badge badge-danger">Suspend</span>
                                        @endif
                                    </td>
                                    <td>
                                    <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                    @method('DELETE')
                                      @csrf
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-icon" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                            <i data-feather="edit"></i>
                                        </button>   
                                        <button type="submit" class="btn btn-danger btn-icon">
                                            <i data-feather="delete"></i>
                                          </button>
                                        
                                      </div>
                                   
                                    </form> 
                                </td>    
                                    
                                </tr> 
                               
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="forms-sample" action="{{ route('user.update', $item->id) }}" method="post">
                                                @method('PUT')
                                                @csrf
                                                  <div class="form-group">
                                                    <label for="kategori">Name</label>
                                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" name="name" value="{{ $item->name }}" id="kategori" autocomplete="off" placeholder="Username" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Email</label>
                                                    <input type="email" class="form-control {{ $errors->has('Email') ? 'is-invalid':'' }}" name="email" value="{{ $item->email }}" id="kategori" autocomplete="off" placeholder="Email" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Password</label>
                                                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" name="password" value="" id="kategori" autocomplete="off" placeholder="password" required>
                                                    <span>Biarkan kosong jika tidak ingin mengganti password</span>
                                                  </div>
                                                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                 
                                                </form>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                                
                            </tbody>
                        </table>
                        {!! $user->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</div>
@endsection