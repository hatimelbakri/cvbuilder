@extends('backend.dashboard')
@section('main')
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <div class="col-md-8">
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title">Upload image profile</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" enctype="multipart/form-data" action="{{route('save.image')}}" novalidate>
                  @csrf
                  <div class="form-group mb-3">
                    <label for="example-fileinput">Default file input</label>
                    <input type="file" name="image" id="example-fileinput" class="form-control-file">
                  </div>
                  <button class="btn btn-primary" type="submit">Save</button>
                  <div class="d-flex justify-content-end">
                    <a class="button btn btn-danger" href="{{route('user.profile')}}">Add Profile</a>
                  </div>
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