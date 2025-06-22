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
                <strong class="card-title">Education Details</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" action="{{route('save.education')}}" novalidate>
                  @csrf
                  <div class="form-group mb-3">
                    <label for="name">University / School / Institute</label>
                    <input type="text" name="name" id="name" class="form-control"
                      placeholder="Enter your Name of University / School / Institute">
                  </div>
                  <div class="form-group mb-3">
                    <label for="specialite">Specialite</label>
                    <input type="text" name="specialite" id="specialite" class="form-control"
                      placeholder="Enter your Name of specialite">
                  </div>  
                  <div class="form-group mb-3">
                    <label for="degree">Degree</label>
                    <select class="form-control" name="degree" id="degree">
                      <option>select degree</option>
                      @foreach ($degree as $level)
                        <option value="{{$level->level_name}}">{{$level->level_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="custom-phone">Start Date</label>
                      <input type="text" name="from_year" class="form-control drgpicker" id="date-input1" value="04/24/2020" aria-describedby="button-addon2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address-wpalaceholder">End Date</label>
                        <input type="text" name="to_year" class="form-control drgpicker" id="date-input1" value="05/24/2020" aria-describedby="button-addon2">
                    </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Save</button>
                  <div class="d-flex justify-content-end">
                    <a class="btn btn-danger" href="{{route('user.experience')}}">Add Experience</a>
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