
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--@yield('title')-->
  <title>{{$metaTitle}}</title>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <i class="fas fa-user-circle"></i> {{auth()->user()->name}} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('admin.dashboard')}}">
              <i class="nav-icon fas fa-user"></i> {{ __('Dashboard') }}
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">J4's ADMIN PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
       <a class="d-block"> <i class="fas fa-user-circle fa-lg"></i> {{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{(request()->route()->getName()=='admin.dashboard')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p></a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.foodmenu')}}" class="nav-link {{(request()->route()->getName()=='admin.foodmenu')?'active':''}}">
            <i class="nav-icon fas fa-drumstick-bite"></i>
            <p>Food Menu</p></a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.foodpackage')}}" class="nav-link {{(request()->route()->getName()=='admin.foodpackage')?'active':''}}">
            <i class="nav-icon fas fa-box-open"></i>
            <p>Set Food Package</p></a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link {{(request()->route()->getName()=='pending.transaction' || request()->route()->getName()=='inprocess.transaction' || request()->route()->getName()=='completed.transaction' || request()->route()->getName()=='view.pending')?'active':''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Transaction
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('pending.transaction')}}" class="nav-link {{(request()->route()->getName()=='pending.transaction' || request()->route()->getName()=='view.pending')?'active':''}}">
                <i class="nav-icon fas fa-hourglass-end ml-3"></i>
                <p>Pending</p></a>
              </li>
              <li class="nav-item">
                <a href="{{route('inprocess.transaction')}}" class="nav-link {{(request()->route()->getName()=='inprocess.transaction' || request()->route()->getName()=='view.inprocess')?'active':''}}">
                <i class="nav-icon fas fa-history ml-3"></i>
                <p>In Process</p></a>
              </li>
              <li class="nav-item">
                <a href="{{route('completed.transaction')}}" class="nav-link {{(request()->route()->getName()=='completed.transaction' || request()->route()->getName()=='view.completed')?'active':''}}">
                <i class="nav-icon fas fa-calendar-check ml-3"></i>
                <p>Completed</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{(request()->route()->getName()=='business.setting')?'active':''}}">
              <i class="nav-icon fas fa-cog"></i>
              <p>Setting</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{route('business.setting')}}" class="nav-link {{(request()->route()->getName()=='business.setting')?'active':''}}">
                <i class="nav-icon fas fa-toolbox ml-3"></i>
                <p>Business Setting</p></a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt ml-3"></i>
                <p>Schedule Event</p></a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog ml-3"></i>
                <p>User Management</p></a>
              </li>
            </ul>
          </li>
          
          <hr>
          @guest @if (Route::has('login'))
          @endif @else
          <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
          @endguest
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$metaHeader}}</h1>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    J4s - Online Catering Reservation System
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(function () {
    $("#food_item").DataTable({
      "order":[[0,'desc']],
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "lengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
    });
  });
</script>

<script>
$('#editFoodModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  
  var foodID=$(opener).attr('id');
  var foodTitle=$(opener).attr('food-title');
  var description=$(opener).attr('description');
  var price=$(opener).attr('price');
  var categories=$(opener).attr('categories');

  $('#editForm').find('[name="foodID"]').val(foodID);
  $('#editForm').find('[name="food_title"]').val(foodTitle);
  $('#editForm').find('[name="description"]').val(description);
  $('#editForm').find('[name="price"]').val(price);
  $('#editForm').find('[name="categories"]').val(categories);
});
</script>

<script>
$('#showFoodModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var foodID=$(opener).attr('id');
  var foodTitle=$(opener).attr('food-title');
  var description=$(opener).attr('description');
  var price=$(opener).attr('price');
  var categories=$(opener).attr('categories');
  var imgsrc=$(opener).attr('image');

  $('#showForm').find('[name="foodID"]').val(foodID);
  $('#showForm').find('[name="description"]').val(description);
  $('#showForm').find('[name="categories"]').val(categories);
  $('#image').attr('src',imgsrc);
  document.getElementById("food_title").innerHTML = foodTitle;
  document.getElementById("price").innerHTML = price+' pesos';
  document.getElementById("description").innerHTML =description;

});
</script>

<script>
 $(".js-select-multiple").select2({
  theme: "classic"
});
</script>

<script>
$('#editFoodPackageModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  
  var packageID=$(opener).attr('id');
  var package_name=$(opener).attr('package-name');
  var price=$(opener).attr('price');

  $('#editForm').find('[name="packageID"]').val(packageID);
  $('#editForm').find('[name="package_name"]').val(package_name);
  $('#editForm').find('[name="price"]').val(price);

});
</script>

<script>
var tdp = document.getElementById("trans_d_payment").innerHTML;
tdp = tdp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("tdp").innerHTML ='₱'+tdp;

var ttp = document.getElementById("trans_t_payment").innerHTML;
ttp = ttp.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("ttp").innerHTML ='₱'+ttp;

var bal = document.getElementById("trans_t_payment").innerHTML - document.getElementById("trans_d_payment").innerHTML;
bal = bal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("bal").innerHTML ='₱'+bal;
</script>

<script>
$('#editBusinessModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var id=$(opener).attr('id');
  var btitle=$(opener).attr('btitle');
  var cpnumber=$(opener).attr('cpnumber');
  var email=$(opener).attr('email');
  var address=$(opener).attr('address');
  var image=$(opener).attr('image');
  $('#editBusinessForm').find('[name="business_id"]').val(id);
  $('#editBusinessForm').find('[name="btitle"]').val(btitle);
  $('#editBusinessForm').find('[name="cpnumber"]').val(cpnumber);
  $('#editBusinessForm').find('[name="email"]').val(email);
  $('#editBusinessForm').find('[name="address"]').val(address);
  $('#editBusinessForm').find('[name="image"]').val(image);
});
</script>
<script>
$('#editLinksModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var id=$(opener).attr('id');
  var fb=$(opener).attr('facebook');
  var twit=$(opener).attr('twitter');
  var insta=$(opener).attr('instagram');
  var yt=$(opener).attr('youtube');
  $('#editLinksForm').find('[name="link_id"]').val(id);
  $('#editLinksForm').find('[name="facebook"]').val(fb);
  $('#editLinksForm').find('[name="twitter"]').val(twit);
  $('#editLinksForm').find('[name="instagram"]').val(insta);
  $('#editLinksForm').find('[name="youtube"]').val(yt);
});
</script>
<script>
$('#editGcashModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var id=$(opener).attr('id');
  var gname=$(opener).attr('gname');
  var gnumber=$(opener).attr('gnumber');
  $('#editGcashForm').find('[name="id"]').val(id);
  $('#editGcashForm').find('[name="gname"]').val(gname);
  $('#editGcashForm').find('[name="gnumber"]').val(gnumber);

});
</script>

</body>
</html>
