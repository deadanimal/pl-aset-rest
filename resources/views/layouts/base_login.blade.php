<!--
=========================================================
* Argon Dashboard PRO - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Pipeline Network">

  <title>
    Perbadanan Labuan - Pengurusan Aset & Stor  
  </title>

  <!-- Favicon -->
  <link rel="icon" href="/assets/img/logo-labuan.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  
  <!-- Icons -->
  <link rel="stylesheet" href="/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/regular.min.css" integrity="sha512-1yhsV5mlXC9Ve9GDpVWlM/tpG2JdCTMQGNJHvV5TEzAJycWtHfH0/HHSDzHFhFgqtFsm1yWyyHqssFERrYlenA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">

  <!-- Specific Page CSS goes HERE  -->  
  @yield('styles')

  <!-- Argon CSS -->
  <link rel="stylesheet" href="/assets/css/argon.css?v=1.2.0" type="text/css">

  <!-- Datatables CSS -->
  <link rel="stylesheet" href="/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

  <!-- JQuery -->
  <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

  <!-- Moment JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>

  <!-- Datepicker -->
  <link rel="stylesheet" href="/assets/vendor/bootstrap-datetimepicker/sass/bootstrap-datetimepicker-build.css">
  <script src="/assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="/assets/css/custom-style.css" type="text/css">

</head>
<style>
  .footer {
     bottom: 0;
     position: fixed;
     width: 90%;
     color: white;
     text-align: center;
  }
  .sidebar-custom {
    position: absolute;
    left: 0;
    height: 100vh;
    color: white;
    text-align: center;
  }


  .sidenav {
  height: 100%;
  width: 100px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgba(248,249,254);
  overflow-x: hidden;
  padding-top: 20px;
  border-right: 1px solid rgba(0, 0, 0, .1);
  
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

  </style>

<body class="">

 
  
  
  <!-- Main content -->

  <div class="sidenav">
    @include('layouts.sidebar_landing')
  </div>
  <div class="main-content" style="margin-left: 100px;">
    

      @yield('content')

    <!-- Page content -->
    <div class="footer">
      @include('layouts.footer')
    </div>
    
  </div>

 

  
  <!-- Argon Scripts -->
  <!-- Core -->
  
  <script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>

  <!-- Specific Page JS goes HERE  -->
  @yield('scripts')
  
  <!-- Argon JS -->
  <script src="/assets/js/argon.js?v=1.2.0"></script>

  <!-- Datatables JS -->
  <script src="/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script>
    function FilterTableData(filter, col) {
      var table = $('.table-custom-simplified').DataTable();
      if ( table.column(col).search() !== filter ) {
        table
          .column(col)
          .search( filter )
          .draw();
      }
    }
    $(document).ready( function () {
      // initialization for custom datatables
      if ($("table").hasClass("table-custom")){
        var options = {
          lengthChange: !1,
          dom: 'Bfrtip',
          "order": [],
          buttons: ['copy', 'pdf', 'excel', 'print'],
          // select: {
          // 	style: "multi"
          // },
          language: {
            paginate: {
              previous: "<i class='fas fa-angle-left'></i>",
              next: "<i class='fas fa-angle-right'></i>"
            }
          }
        };
        $('.table-custom').DataTable(options);
        $('.dt-buttons').children().removeClass('btn-secondary').addClass('btn-sm btn-dark');
      }
      if ($("table").hasClass("table-custom-simplified")){
        var options = {
          lengthChange: !1,
          dom: 'frtip',
          // select: {
          // 	style: "multi"
          // },
          "order": [],
          language: {
            paginate: {
              previous: "<i class='fas fa-angle-left'></i>",
              next: "<i class='fas fa-angle-right'></i>"
            }
          }
        };
        $('.table-custom-simplified').DataTable(options);
        $('.dt-buttons').children().removeClass('btn-secondary').addClass('btn-sm btn-dark');
      }

      // Change nav-link to active if currently is relevant page
      var location = window.location.pathname;
      $(".navbar-nav .nav-item a[href='"+location+"']").addClass('active');

      $('.phone-input').keypress(function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[0-9]|\-|\+/)) {
          return false;
        }
      });
      $('.ic-input').keypress(function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[0-9]|\-/)) {
          
          return false;
        }
      });
      $('.number-input').keypress(function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[0-9]/)) {
          return false;
        }
      });
      $('.decimal-input').keypress(function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/^[0-9]*?\.?([0-9]*)$/)) {
          return false;
        }
      });
      $('.character-input').keypress(function (e) {
        var txt = String.fromCharCode(e.which);
        if (!txt.match(/[a-zA-Z ]|\'|\/|\@|\.|\-|\(|\)/)) {
          return false;
        }
      });
    });
  </script>
  <script>
      $('.dateinput').datetimepicker({
        format: 'DD/MM/YYYY',
        icons: {
            time: 'fas fa-clock-o',
            date: 'fas fa-calendar',
            up: 'fas fa-chevron-up text-dark',
            down: 'fas fa-chevron-down text-dark',
            previous: 'fas fa-chevron-left text-dark',
            next: 'fas fa-chevron-right text-dark',
            today: 'fas fa-crosshairs',
            clear: 'fas fa-trash-o',
            close: 'fas fa-times'
        },
      });
      $('.timeinput').datetimepicker({
        format: 'LT',
        icons: {
            time: 'fas fa-clock-o',
            date: 'fas fa-calendar',
            up: 'fas fa-chevron-up text-dark',
            down: 'fas fa-chevron-down text-dark',
            previous: 'fas fa-chevron-left text-dark',
            next: 'fas fa-chevron-right text-dark',
            today: 'fas fa-crosshairs',
            clear: 'fas fa-trash-o',
            close: 'fas fa-times'
        },
      });
  </script>
</body>


</html>
