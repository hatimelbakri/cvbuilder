<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Show CV</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/simplebar.css')}}">
  <!-- Fonts CSS -->
  <link
    href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/feather.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/uppy.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/jquery.steps.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/jquery.timepicker.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/quill.snow.css')}}">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/daterangepicker.css')}}">
  <!-- App CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/app-light.css')}}" id="lightTheme">
  <link rel="stylesheet" href="{{asset('backend/css/app-dark.css')}}" id="darkTheme" disabled>
  <link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  <!-- skills -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script src=" https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;

        }

        body {
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 1000px;
            min-height: 1000px;
            background: #fff;
            margin: 50px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            box-shadow: 0 35px 55px rgba(211, 68, 68, 0.1);
        }

        .container .left_Side {
            position: #fff;
            background: #fff;
            padding: 40px;
        }

        .profileText {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(179, 46, 46, 0.2);
        }

        .profileText .imgBx {
            position: relative;
            width: 200px;
            height: 250px;
            border-radius: 20%;
            overflow: hidden;

        }

        .profileText .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profileText h2 {
            color: black;
            font-size: 1.5em;
            margin-top: 20px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 600;
            line-height: 1.4em;
        }

        .profileText h2 span {
            font-size: 0.8em;
            font-style: 300;
        }

        .contactInfo {
            padding-top: 40px;
        }

        .title {
            color: black;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 20px;

        }

        .contactInfo ul {
            position: relative;
        }

        .contactInfo ul li {
            position: relative;
            list-style: none;
            margin: 10px 0;
            cursor: pointer;
        }

        .contactInfo ul li .icon {
            display: inline-block;
            width: 30px;
            font-size: 18px;
            color: #e37b7d;
        }

        .contactInfo ul li span {
            color: black;
            font-weight: 300;
        }

        .contactInfo.project li {
            margin-bottom: 15px;

        }

        .contactInfo.project h5 {
            color: black;
            font-weight: 500;
        }

        .contactInfo.project h4 {
            color: black;
            font-weight: 500;
        }

        .contactInfo.project h4:nth-child(2) {
            color: black;
            font-weight: 300;
        }

        .contactInfo.language .percent {
            position: relative;
            width: 100%;
            height: 6px;
            background: #fff;
            display: block;
            margin-top: 5px;
        }

        .contactInfo.language .percent div {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: #fff;
        }

        .container .right_Side {
            position: relative;
            background: #fff;
            padding: 40px;
        }

        .about {
            margin-bottom: 50px;

        }

        .about:last-child {
            margin-bottom: 0;
        }

        .title2 {
            color: #003147;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        p {
            color: #333;
        }
        .about .title2 {
            margin-bottom: 20px;
        }
        .about .box {
            display: flex;
            flex-direction: row;
        }

        .about .box .year_company {
            min-width: 150px;
        }

        .about .box .year_company h5 {
            text-transform: uppercase;
            color: #848c90;
            font-weight: 600;
        }

        .about .box .text h4 {
            text-transform: uppercase;
            color: rgb(148, 8, 8);
            font-size: 16px;
        }

        .skills .title-skill {
            margin-bottom: 20px;
        }
        .skills .box-skill {
            position: relative;
            width: 100%;
            display: grid;
            grid-template-columns: 150px 1fr;
            justify-content: center;
            align-items: center;
        }

        .skills .box-skill h4 {
            text-transform: uppercase;
            color: #848c99;
            font-weight: 500;

        }

        .skills .box-skill .percent {
            position: relative;
            width: 100%;
            height: 10px;
            background: #c1baba;
        }

        .skills .box-skill .percent div {
            position: absolute;
            top: 0;
            left: 00;
            height: 100%;
            background: rgb(148, 8, 8);
        }

        .about .titleproject {
            margin-bottom: 20px;
        }

        .about .box-project {
            display: flex;
            flex-direction: row;
        }

        .about .box-project .year_company {
            min-width: 150px;
        }

        .about .box-project .text h4 {
            text-transform: uppercase;
            color: rgb(148, 8, 8);
            font-size: 16px;
        }
        .contactInfo language {
            color: black;
        }
        h6 {
            color: black;
            font-weight: 500;
        }
    </style>
</head>

<body class="vertical  light  ">
  <div class="wrapper">
    <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        </button>
        <form class="form-inline mr-auto text-muted">
        </form>
        <ul class="nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="{{asset('backend/assets/avatars/face-1.jpg')}}" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Log out</button>
                </form>
            </div>

          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <img src="{{asset('frontend/images/sidebar.png')}}" alt="#" />
            </a>
          </div>
          @auth
            @if(Auth::user()->role === 'admin')
              <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                  <a href="{{ route('admin') }}" class="nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
              </ul>
              <p class="text-muted nav-heading mt-4 mb-1">
                <span>Apps</span>
              </p>
              <ul class="navbar-nav flex-fill w-100 mb-2">

                <li class="nav-item dropdown">
                  <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">Messages</span>
                  </a>
                  <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                    <a class="nav-link pl-3" href="{{route('listMessage')}}"><span class="ml-1">Messages List</span></a>
                  </ul>
                </li>
              </ul>
              <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                  <a href="{{ route('listCVAdmin') }}" class="nav-link">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">list cv</span>
                  </a>
                </li>
              </ul>
            @endif               
            @if(Auth::user()->role === 'user')
              <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                  <a href="{{ route('listCV') }}" class="nav-link">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">list cv</span>
                  </a>
                </li>
              </ul>
            @endif
          @endauth
        </nav>
      </aside>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-danger" href="{{route('user.downloadcv')}}"><i class="fa-solid fa-download"></i></a>
                        </div>
                        <div class="container">
                            <div class="left_Side">
                                <div class="profileText">
                                    <div class="imgBx">
                                            @if($info && $info->image)
                                                <img src="{{ asset('storage/upload/' . $info->image) }}" alt="Profile Image">
                                            @else
                                                <img src="{{ asset('backend/img/default-avatar.png') }}" alt="No Image">
                                            @endif
                                    </div>
                                    <h2>{{ $info->name ?? 'Your Name' }}<br><span>{{ $cv->name ?? 'Your specialite' }}</span></h2>
                                </div>
                                <div class="contactInfo">
                                    <h3 class="title">Contact Info</h3>
                                    <ul>
                                        <li>
                                            <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                            <span class="text">{{ $info->phone ?? 'Your Phone' }}</span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            <span class="text">{{ $info->email ?? 'Your Email' }}</span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                            <span class="text">{{ $info->adress ?? 'Your Address' }}</span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                            <span class="text">{{ $info->city ?? 'Your City' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="contactInfo project">
                                    @if($projects->count())    
                                        <h3 class="title">PROJECTS</h3>
                                        @foreach($projects as $project)
                                            <h6>{{ $project->title }}</h6>
                                            <p>{{ $project->description }}</p>
                                        @endforeach
                                    @endif    
                                </div>
                                <div class="contactInfo project">
                                    <h3 class="title">LANGUAGES</h3>
                                    <ul>
                                        @foreach($languages as $lang)
                                            <li>{{ $lang->language }} : {{ $lang->proficiency }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <div class="right_Side">
                                <div class="about">
                                    <h2 class="title2">Profile</h2>
                                    <p>{{ $profile->profile }}</p>
                                </div>
                                <div class="about">
                                    <h2 class="title2">Education</h2>
                                    @foreach($educations as $edu)
                                    <div class="box">
                                        <div class="year_company">
                                            <h5>{{ \Carbon\Carbon::parse($edu->from_year)->format('Y') }} - {{ $edu->to_year ? \Carbon\Carbon::parse($edu->to_year)->format('Y') : 'Present' }}</h5>
                                            <h5>{{ $edu->specialite }}</h5>
                                        </div>
                                        <div class="text">
                                            <h4>{{ $edu->name }}</h4>
                                            <p>{{ $edu->degree }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @if($experiences->count())
                                    <div class="about">
                                        <h2 class="title2">Experience</h2>
                                        @foreach($experiences as $exp)
                                        <div class="box">
                                            <div class="year_company">
                                                <h5>{{ \Carbon\Carbon::parse($exp->start_date)->format('Y') }} - {{ $exp->end_date ? \Carbon\Carbon::parse($exp->end_date)->format('Y') : 'Present' }}</h5>
                                                <h5>{{ $exp->company_name }}</h5>
                                            </div>
                                            <div class="text">
                                                <h4>{{ $exp->name }}</h4>
                                                <p>{{ $exp->description }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                                @if($skills->count())
                                    <div class="about skills">
                                        <h2 class="title2 title-skill">Professional Skills</h2>
                                        @foreach($skills as $skill)
                                            <div class="box-skill">
                                                <h4>{{ $skill->name }}</h4>
                                                <div class="percent"><div style="width: {{ $skill->level * 20 }}%;"></div></div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  </div> <!-- .wrapper -->
  <script src="{{asset('backend/js/jquery.min.js')}}"></script>
  <script src="{{asset('backend/js/popper.min.js')}}"></script>
  <script src="{{asset('backend/js/moment.min.js')}}"></script>
  <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('backend/js/simplebar.min.js')}}"></script>
  <script src="{{asset('backend/js/daterangepicker.js')}}"></script>
  <script src="{{asset('backend/js/jquery.stickOnScroll.js')}}"></script>
  <script src="{{asset('backend/js/tinycolor-min.js')}}"></script>
  <script src="{{asset('backend/js/config.js')}}"></script>
  <script src="{{asset('backend/js/d3.min.js')}}"></script>
  <script src="{{asset('backend/js/topojson.min.js')}}"></script>
  <script src="{{asset('backend/js/datamaps.all.min.js')}}"></script>
  <script src="{{asset('backend/js/datamaps-zoomto.js')}}"></script>
  <script src="{{asset('backend/js/datamaps.custom.js')}}"></script>
  <script src="{{asset('backend/js/Chart.min.js')}}"></script>
  <script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
  </script>
  <script src="{{asset('backend/js/gauge.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('backend/js/apexcharts.min.js')}}"></script>
  <script src="{{asset('backend/js/apexcharts.custom.js')}}"></script>
  <script src="{{asset('backend/js/jquery.mask.min.js')}}"></script>
  <script src="{{asset('backend/js/select2.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.steps.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.timepicker.js')}}"></script>
  <script src="{{asset('backend/js/dropzone.min.js')}}"></script>
  <script src="{{asset('backend/js/uppy.min.js')}}"></script>
  <script src="{{asset('backend/js/quill.min.js')}}"></script>
  <script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/js/dataTables.bootstrap4.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(function(){
      $(document).on('click','#delete_education',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
          title: 'Are you sure?',
          text: "Want to Delete This education?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Deleted!',
              'Your education has been deleted.',
              'success'
            )
          }
        })
      });
    });
    $(function(){
      $(document).on('click','#delete_experience',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
          title: 'Are you sure?',
          text: "Want to Delete This experience?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Deleted!',
              'Your experience has been deleted.',
              'success'
            )
          }
        })
      });
    });
    $(function(){
      $(document).on('click','#delete_project',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
          title: 'Are you sure?',
          text: "Want to Delete That project?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'Deleted!',
              'Your project has been deleted.',
              'success'
            )
          }
        })
      });
    });
  </script>
  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
    }
    @endif 
  </script>

  <script>
    $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
    $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
    $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
    $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
    /** date range picker */
    if ($('.datetimes').length) {
      $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
    $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
    $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
    // editor
    var editor = document.getElementById('editor');
    if (editor) {
      var toolbarOptions = [
        [
          {
            'font': []
          }],
        [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [
          {
            'header': 1
          },
          {
            'header': 2
          }],
        [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
        [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
        [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
        [
          {
            'direction': 'rtl'
          }], // text direction
        [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
        [
          {
            'align': []
          }],
        ['clean'] // remove formatting button
      ];
      var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg) {
      var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
          {
            endpoint: 'https://master.tus.io/files/'
          });
      uppy.on('complete', (result) => {
        console.log('Upload complete! We’ve uploaded these files:', result.successful)
      });
    }
  </script>
  <script src="js/apps.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
  </script>
</body>

</html>