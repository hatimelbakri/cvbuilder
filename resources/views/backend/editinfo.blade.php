@extends('backend.dashboard')
@section('main')
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        @if($latestCv && $info && $info->cv_id == $latestCv->id)

        {{-- If CV exists, show edit form --}}
        <div class="row">
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title">Edit Basic Information</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" action="{{route('update.info')}}" novalidate>
                  @csrf
                  <input type="hidden" name="id" value="{{$info->id}}">

                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">Name</label>
                    <input type="text" value="{{$info->name}}" name="name" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your Name">
                  </div>
                  <div class="form-row">
                    <div class="col-md-8 mb-3">
                      <label for="exampleInputEmail2">Email address</label>
                      <input type="email" value="{{$info->email}}" name="email" class="form-control" id="exampleInputEmail2"
                        aria-describedby="emailHelp1" required>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="custom-phone">Phone Number</label>
                      <input class="form-control input-phoneus" value="{{$info->phone}}" name="phone" id="custom-phone" maxlength="14" required>
                    </div>
                  </div> <!-- /.form-row -->
                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">Address</label>
                    <input type="text" value="{{$info->adress}}" name="adress" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your address">
                  </div>
                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">city</label>
                    <input type="text" value="{{$info->city}}" name="city" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your city">
                  </div>
                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">Code Postal</label>
                    <input type="text" name="codepostal" value="{{$info->codepostal}}" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your code postal">
                  </div>
                  <button class="btn btn-primary" type="submit">Update</button>
                </form>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div> <!-- end section -->
        @else
          {{-- If no CV exists --}}
          <div class="alert alert-warning text-center">
            <h4>No CV found</h4>
            <p>Please <a href="{{ route('user.info') }}">insert info</a> to create your CV.</p>
          </div>
        @endif
      </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection