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
                <strong class="card-title">Edit Projects</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" enctype="multipart/form-data" action="{{route('update.project')}}" novalidate>
                <input type="hidden" name="id" value="{{$project->id}}">  
                @csrf
                  <div class="form-group mb-3">
                    <label for="address-wpalaceholder">Name of project</label>
                    <input type="text" name="title" value="{{$project->title}}" id="address-wpalaceholder" class="form-control"
                      placeholder="Enter your project name">
                  </div>
                  <div class="form-group mb-3">
                      <label for="example-fileinput">Current Project File</label>
                      
                      @if($project->url)
                          <p>
                              <a href="{{ asset('storage/upload/' . $project->url) }}" target="_blank">
                                  View Current File
                              </a>
                          </p>
                      @else
                          <p>No file uploaded.</p>
                      @endif

                      <label for="example-fileinput">Upload New File (Optional)</label>
                      <input type="file" name="url" id="example-fileinput" class="form-control-file">
                  </div>

                  <div class="form-group mb-3">
                      <label for="example-textarea">Description</label>
                      <textarea class="form-control" name="description" id="example-textarea" rows="4">{{$project->description}}</textarea>
                  </div>
                  <button class="btn btn-primary" type="submit">update</button>
                  
                  <a href="{{ route('user.project') }}" class="btn btn-link">Insert More Projects</a>
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