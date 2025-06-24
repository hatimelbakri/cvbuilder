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
                <strong class="card-title">Template</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" action="{{route('save.template')}}" novalidate>
                  @csrf
                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">Name CV</label>
                    <input type="text" name="name" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your cv name">
                  </div>
                  <button class="btn btn-primary" type="submit">Save</button>
                  <div class="d-flex justify-content-end">
                    <a class="button btn btn-sanger" href="{{route('user.info')}}">Add Persenal Information</a>
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