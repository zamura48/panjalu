<!-- Footer -->
    <div class="container-fluid">
      <footer class="main-footer my-footer">
        Copyright © 2021 Kejaksaan Negeri Kota Kediri All rights reserved.
      </footer>
    </div>
  </section>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/chart.js/Chart.min.js"></script>

<!-- bs-custom-file-input -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- Toastr -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/toastr/toastr.min.js"></script>

<!-- jquery-validation -->
<script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- <script src="{{asset('vendor')}}/AdminLTE-3.1.0/plugins/jquery-validation/additional-methods.min.js"></script> -->

@yield('js')

<!-- <script type="text/javascript">
  $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
</script> -->
</script>
</body>
</html>