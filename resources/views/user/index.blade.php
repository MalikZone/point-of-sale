@extends('layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <div class="table ml-3">
            <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">
                Create
            </button>
            @if (session()->has('pesan'))
                <div class="alert alert-success">
                  {{ session()->get('pesan') }}
                </div>
            @endif
            <table class="table mt-5">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $item)
                  <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal">
                        <i class="fa fa-edit"></i>
                      </button>
                      <form action="{{ url('/user/delete', $item->id) }}" class="d-inline" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/user/create" method="POST">
          @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
              </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="phone" class="form-control" id="phone" placeholder="phone" name="phone" required>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="address" class="form-control" id="address" placeholder="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role">
                  <option value="admin">Admin</option>
                  <option value="supervisor">Supervisor</option>
                  <option value="kasir">Kasir</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/user/create" method="POST">
          @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
              </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="phone" class="form-control" id="phone" placeholder="phone" name="phone" required>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="address" class="form-control" id="address" placeholder="address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection