<!DOCTYPE html>
<html lang="en">

<head>
@include('front.modules.meta')
</head>

<body>

  <!-- Navigation -->
	@include('front.modules.nav')
  <!-- Page Content -->
  <div class="container pt-5">

		@yield('content')

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

	@include('front.modules.script')
</body>

</html>
