<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/back') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/back') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/back') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/back') }}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/back') }}/vendor/chart.js/Chart.min.js"></script>
<script src="{{ asset('assets/back') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/back') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/back') }}/js/demo/chart-area-demo.js"></script>
<script src="{{ asset('assets/back') }}/js/demo/chart-pie-demo.js"></script>
<script charset="utf-8">
	$(document).ready(function() {
		var menu = $('ul.navbar-nav li.nav-item');
		
		for (var i = 0, len = menu.length; i < len; i++) {
			console.table([menu.find('a').eq(i).attr('href'), window.location.href])
			if (menu.find('a').eq(i).attr('href') == window.location.href) {
				menu.eq(i).addClass('active');
			}
		}

		// delete handler
		$('body').on('click', '.btn-delete', function() {
			var url = $(this).data('url');
			var form = $('form#form-delete');

			form.attr('action', url);
			form.submit();
		})
	})
</script>
