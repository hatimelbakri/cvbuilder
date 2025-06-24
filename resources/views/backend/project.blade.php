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
                <strong class="card-title">Upload Projects</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" enctype="multipart/form-data" action="{{route('save.project')}}" novalidate>
                  @csrf
                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">Name of project</label>
                    <input type="text" name="title" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your project name">
                  </div>
                  <div class="form-group mb-3">
                    <label for="example-fileinput">input your project</label>
                    <input type="file" name="url" id="example-fileinput" class="form-control-file">
                  </div>
                  <div class="form-group mb-3">
                      <label for="example-textarea">Description</label>
                      <textarea class="form-control" name="description" id="example-textarea" rows="4"></textarea>
                  </div>
                  <button class="btn btn-primary" type="submit">Save</button>
                  <div class="d-flex justify-content-end">
                    <a class="button btn btn-danger" href="{{route('user.showcv')}}">Show the CV</a>
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