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

    <div class="row">
      <div class="col-lg-12">
        <div class="row">

          <div class="col-lg-3 col-md-3 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item One</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets') }}/front/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
