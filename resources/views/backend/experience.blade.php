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
                <strong class="card-title">Experience Details</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" action="{{route('save.experience')}}" novalidate>
                  @csrf
                  <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                      placeholder="Enter your Name of experience">
                  </div>
                  <div class="form-group mb-3">
                    <label for="name">company</label>
                    <input type="text" name="company_name" id="name" class="form-control"
                      placeholder="Enter your Name of Company">
                  </div>
                  <div class="form-group mb-3">
                    <label for="type">Type Experience</label>
                    <select class="form-control" name="type_employment" id="type">
                      <option>select type experience</option>
                      @foreach ($type as $name)
                        <option value="{{$name->experience_name}}">{{$name->experience_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="current_position">Current position</label>
                    <select class="form-control" name="current_position" id="current_position">
                        <option value="">Select</option>
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="custom-phone">Start Date</label>
                      <input type="text" name="start_date" class="form-control drgpicker" id="date-input1" value="04/24/2020" aria-describedby="button-addon2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address-wpalaceholder">End Date</label>
                        <input type="text" name="end_date" class="form-control drgpicker" id="date-input1" value="05/24/2020" aria-describedby="button-addon2">
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                  </div> 
                  <button class="btn btn-primary" type="submit">Save</button>
                  <div class="d-flex justify-content-end">
                    <a class="button btn btn-danger" href="{{route('user.skills')}}">Add Skills</a>
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