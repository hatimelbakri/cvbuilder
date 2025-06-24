@extends('backend.dashboard')
@section('main')
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        @if($cvId && $info && $info->cv_id == $cvId)
        <div class="row">
          <div class="col-md-8">
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title">Edit image profile</strong>
              </div>
              <div class="card-body">
                <form class="needs-validation" method="POSt" enctype="multipart/form-data" action="{{route('update.image')}}" novalidate>
                  @csrf
                  <div class="form-group mb-3">
                      @if($info && $info->image)
                            <img src="{{ asset('storage/upload/' . $info->image) }}" 
                                alt="Profile Image" 
                                class="img-fluid mb-3" 
                                style="max-width: 200px; max-height: 200px;">
                        @else
                            <p>No profile image uploaded yet.</p>
                        @endif
                  </div>
                  <div class="form-group mb-3">
                    <label for="example-fileinput">upload new image</label>
                    <input type="file" name="image" id="example-fileinput" class="form-control-file">
                  </div>
                  <button class="btn btn-primary" type="submit">update</button>
                </form>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div> <!-- end section -->
        @else
        {{-- If no CV exists --}}
        <div class="alert alert-warning text-center">
          <h4>No CV found</h4>
          <p>Please <a href="{{ route('user.image') }}">Upload Image</a> to create your CV.</p>
        </div>
        @endif
      </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection