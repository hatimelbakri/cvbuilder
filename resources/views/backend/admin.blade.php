<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/simplebar.css')}}">
  <!-- Fonts CSS -->
    <link
      href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('backend/css/app-dark.css')}}" id="darkTheme" disabled>
    <style>
      #cvChart {
        max-width: 100%;
        height: auto;
      }

      .card-title {
        font-weight: 600;
        color: #333;
        margin-bottom: 1rem;
      }

      .chart-container {
        position: relative;
        width: 100%;
        padding: 20px;
      }

      @media (max-width: 768px) {
        #cvChart {
          height: 250px !important;
        }
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

        </nav>
      </aside>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">Welcome, {{ Auth::user()->name }}!</h2>
                </div>
                <div class="col-auto">
                  <form class="form-inline">
                    <div class="form-group d-none d-lg-inline">
                      <label for="reportrange" class="sr-only">Date Ranges</label>
                      <div id="reportrange" class="px-2 py-2 text-muted">
                        <span class="small"></span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- widgets -->
              <div class="row my-4">
                <div class="col-md-4">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                          <small class="text-muted mb-1">CV created</small>
                          <h3 class="card-title mb-0">{{$finishedCount}}</h3>
                        </div>
                      </div> <!-- /. row -->
                    </div> <!-- /. card-body -->
                  </div> <!-- /. card -->
                </div> <!-- /. col -->

              </div> <!-- end section -->
              <!-- linechart -->
              <div class="card shadow rounded mb-4">
                <div class="card-body">
                  <h5 class="card-title">CVs Created in Last 10 Days</h5>
                  <canvas id="cvChart" height="100"></canvas>
                </div>
              </div>

              <!-- count by city -->
              <div class="row">
                <div class="col-md-4">
                  <div class="card shadow eq-card  mb-4">
                    <div class="card-header">
                      <strong>City</strong>
                    </div>
                    <div class="card-body">
                      @foreach ($topCities as $city)
                        <div class="row align-items-center my-2">
                          <div class="col">
                            <p class="mb-0">{{ $city->city ?? 'Unknown' }}</p>
                          </div>
                          <div class="col-auto text-right">
                            <p class="mb-0">{{ $city->user_count }}</p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div> <!-- .col -->
              </div>
            </div> <!-- /.col -->
          </div> <!-- .row -->
        </div>
      </main> <!-- main -->
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

    <script src="{{asset('backend/js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const labels = {!! json_encode($labels) !!};
      const cvData = {!! json_encode($cvData) !!};
      const usersData = {!! json_encode($usersData) !!};

      const ctx = document.getElementById('cvChart').getContext('2d');
      new Chart(ctx, {
          type: 'line',
          data: {
              labels: labels,
              datasets: [
                  {
                      label: 'CVs Created in Last 10 Days',
                      data: cvData,
                      borderColor: 'rgba(75, 192, 192, 1)',
                      backgroundColor: 'rgba(75, 192, 192, 0.2)',
                      borderWidth: 2,
                      tension: 0.3,
                      fill: true,
                      pointStyle: 'circle', // circle shape
                      pointRadius: 6,       // size of circle
                      pointHoverRadius: 8   // on hover
                  },
                  {
                      label: 'Users Registered in Last 10 Days',
                      data: usersData,
                      borderColor: 'rgba(255, 99, 132, 1)',
                      backgroundColor: 'rgba(255, 99, 132, 0.2)',
                      borderWidth: 2,
                      tension: 0.3,
                      fill: true,
                      pointStyle: 'rect',    // keep this one as square
                      pointRadius: 5,
                      pointHoverRadius: 7
                  }
              ]
          },
          options: {
              responsive: true,
              scales: {
                  y: {
                      beginAtZero: true,
                      min: 0,
                      max: 100,
                      ticks: {
                          stepSize: 10
                      },
                      title: {
                          display: true,
                          text: 'Count'
                      }
                  },
                  x: {
                      title: {
                          display: true,
                          text: 'Date'
                      }
                  }
              }
          }
      });
  </script>

  </body>
</html>