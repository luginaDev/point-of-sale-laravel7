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
                    <h6 class="card-title">add new permission</h6>
                    
                <form class="forms-sample" action="{{ route('user.add_permission') }}" method="post">
                    @csrf
                      <div class="form-group">
                        <label for="kategori">name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" name="name" id="kategori" autocomplete="off" placeholder="Username" required>
                      </div>
                     
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     
                    </form>
                  </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">set permission</h6>
                  <form class="forms-sample" action="{{ route('users.roles_permission') }}" method="GET">
                 
                      <div class="form-group">
                        <label for="kategori">Roles</label>
                        <select name="role" id="form-controll">
                            @foreach ($roles as $item)
                                <option value="{{ $item }}"{{ request()->get('role') == $item ? 'selected': '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">check</button>
                    </form>

                    @if(!@empty($permissions))
                     <form action="{{ route('user.setRolePermission', request()->get('role')) }}" method="post">    
                     @csrf
                     @METHOD('PUT')
                     <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-line-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Permission</a>
                        </li>
                        
                      </ul>
                      <div class="tab-content mt-3" id="lineTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-line-tab">
                            @php $no=1; @endphp
                            @foreach ($permissions as $item => $key)
                                <input type="checkbox" name="permission[]" class="form-controll" value="{{ $key }}"{{--  CHECK, JIKA PERMISSION TERSEBUT SUDAH DI SET, MAKA CHECKED --}}
                                {{ in_array($key, $hasPermission) ? 'checked':'' }}
                                > {{ $key }} <br>
                            @if ($no++%4 == 0)
                            <br>
                            @endif                               
                            @endforeach 
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">set permission</button>
                      </div>
                    </form>
                    @endif
                  </div>
            </div>
        </div>
    </div> <!-- row -->
</div>
@endsection