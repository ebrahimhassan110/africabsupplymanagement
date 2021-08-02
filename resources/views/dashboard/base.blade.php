<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ "Burhani Associates" }}</title>

    <meta name="msapplication-TileColor" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/brand/favlogo.png"> -->
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin_lte.css') }}" rel="stylesheet">
    <link href="{{ asset('css/skin-blue.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-default.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/datatables.min.css') }}"/>


    <style>
        .select2-container--open {
          z-index: 9999999 !important;

        }
    </style>
    @yield('css')

    <!-- Global site tag (gtag.js) - Google Analytics-->



    <!-- <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet"> -->
  </head>



  <body class="c-app"  onload="myFunction()">
    <div id="loader"></div>
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

      @include('dashboard.shared.nav-builder')

      @include('dashboard.shared.header')

      <div class="c-body"  id="content">

        <main class="c-main animate-bottom">
          <!-- <div style="display:none"  class=""> -->

          @yield('content')


        </main>
        @include('dashboard.shared.footer')
      </div>
    </div>

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('datatable/datatables.min.js') }}"></script>
    <script>
      function myFunction() {
          setTimeout(showPage, 150);
      }
      function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("content").style.display = "block";
      }

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $(document).ajaxSend(function() {
         
          $("#loader").show();
      });

      $(document).ajaxComplete(function() {
          initSelect2();
          datepicker();
          $("#loader").hide();
      });

      function showToastr(type, message){
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
          };

        switch(type){
          case "info": body = "<span> <i class='fa fa-spinner fa-pulse'></i></span>";
              break;
          default: body = '';
        }
        const content = message + body;
        toastr[type](content, "Alert")
      }

      function initSelect2(){
        $('.select2').select2({
          theme: 'bootstrap4',
          width: '100%',

       });
      }
      initSelect2();

       function datepicker(){
         $('.date').datepicker({
          format: 'dd/mm/yyyy',
          autoclose: true,
          orientation: 'bottom auto',
         });
         $('.date').mask('00/00/0000');
       }

       datepicker();

       $('.datatable').DataTable();
    </script>
    @yield('javascript')




  </body>
</html>
