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
                <strong class="card-title">Send Message</strong>
              </div>
                 <div id="contact" class="contact">
                    <div class="container">
                        <div class="row">
                            <form class="main_form " method="POSt" action="{{route('sendMessage')}}" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <input class="form_contril" placeholder="Subject " type="text" name="subject">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="textarea" placeholder="Message" type="text" name="message"></textarea>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="send_btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div> <!-- end section -->
      </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection