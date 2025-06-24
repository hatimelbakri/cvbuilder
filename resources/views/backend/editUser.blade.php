@extends('backend.dashboard')
@section('main')
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title">Edit User</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" action="{{route('updateUser')}}" novalidate>
                  @csrf
                  <input type="hidden" name="id" value="{{$user->id}}">

                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">Name</label>
                    <input type="text" value="{{$user->name}}" name="name" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your Name">
                  </div>
                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">email</label>
                    <input type="text" value="{{$user->email}}" name="name" id="address-wpalaceholder" class="form-control"
                      disabled>
                  </div>
                  <button class="btn btn-primary" type="submit">Update</button>
                </form>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div> <!-- end section -->
      </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection