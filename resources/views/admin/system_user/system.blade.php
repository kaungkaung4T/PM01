@extends('admin.dashboard')

@section('content')

    <div class="page-content">


    <button class="btn btn-sm border dropdown-toggle" type="button" data-bs-toggle="dropdown-menu" aria-expanded="false">
              wef
            </button>
    <div class="dropdown-menu">
  <form class="px-4 py-3">
    <div class="mb-3">
      <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
    </div>
    <div class="mb-3">
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="dropdownCheck">
        <label class="form-check-label" for="dropdownCheck">
          Remember me
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <div class="dropdown-divider"></div>
  <a class="dropdown-item" href="#">New around here? Sign up</a>
  <a class="dropdown-item" href="#">Forgot password?</a>
</div>

        <div class="table-responsive">
                <!-- <table  id="dataTableExample" class="table table-dark table-image mb-2"> -->
                <table id="" class="display table table-image mb-2">

            <thead>
                <tr>
                <th scope="col" class="text-dark">ID</th>
                <th scope="col" class="text-dark">Username</th>
                <th scope="col" class="text-dark">Name</th>
                <th scope="col" class="text-dark">Role</th>
                <th scope="col" class="text-dark">Updated At</th>
                <th scope="col" class="text-dark">Created At</th>
                <th scope="col" class="text-dark">Status</th>
                <th scope="col" class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $i=1 ?>

                @foreach ($all_user as $each_user)

                <tr>
            <th scope="row">{{ $i }}</th>
            <td class="text-secondary">{{ $each_user->username }}</td>
            <td class="text-secondary">{{ $each_user->name }}</td>
            <td class="text-secondary">{{ $each_user->role }}</td>
            <td class="text-secondary">{{ $each_user->updated_at }}</td>
            <td class="text-secondary">{{ $each_user->created_at }}</td>
            <td class="text-secondary">{{ $each_user->status }}</td>
            <td class="text-secondary">{{ Str::limit($each_services->text, 25, $end='...') }}</td>
            <td class="text-secondary"><a href="" class="btn btn-sm btn-outline-primary">Edit</a></td>
            </tr>
                
            <?php $i++ ?>

                @endforeach

                </tbody>
            </table>
        </div>

        <!-- display table -->
        <script src="{{asset('assets/admin/js/table_display.js')}}"></script>

    </div>

@endsection
