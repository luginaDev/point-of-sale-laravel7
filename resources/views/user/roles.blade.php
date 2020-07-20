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
        <div class="col-lg-7 col-xl-8 stretch-card">
            <form action="{{ route('users.set_role', $user->id) }}" method="post">
                @csrf
                @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Set role</h6>
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
                                    <th class="pt-0">Name</th>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th class="pt-0">Email</th>
                                    <td>:</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                </tr>
                                <tr>
                                    <th class="pt-0">Role</th>
                                    <td>:</td>
                                    <td>
                                        @foreach ($roles as $item)
                                           <input type="radio" name="role" value="{{ $item }}" {{ $user->hasRole($item) ? 'checked':'' }}>
                                        {{ $item }} <br>
                                        @endforeach
                                    </td>
                                </tr>
                            </thead>

                        </table>
                      
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Set Role</button>
                </div>
            </div>
           </form>
        </div>
    </div> <!-- row -->
</div>
@endsection