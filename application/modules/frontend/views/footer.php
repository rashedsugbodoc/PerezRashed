    <footer class="footer">
      <div class="container">
        <div class="row row-grid align-items-center mb-5">
          <div class="col-lg-6">
            <h3 class="text-primary font-weight-light mb-2">SugboDoc</h3>
            <h4 class="mb-0 font-weight-light">Manage Healthcare Anywhere</h4>
          </div>
          <div class="col-lg-6 text-lg-center btn-wrapper">
            <button target="_blank" href="https://twitter.com/sugbodoc" rel="nofollow" class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
              <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
            </button>
            <button target="_blank" href="https://www.facebook.com/sugbodoc/" rel="nofollow" class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip" data-original-title="Like us">
              <span class="btn-inner--icon"><i class="fa fa-facebook"></i></span>
            </button>
            <button target="_blank" href="https://instagram.com/sugbodoc" rel="nofollow" class="btn btn-icon-only btn-instagram rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
              <span class="btn-inner--icon"><i class="fa fa-instagram"></i></span>
            </button>
          </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
          <div class="col-md-6">
            <div class="copyright">
              &copy; 2021 <a href="" target="_blank">SugboDoc</a>.
            </div>
          </div>
          <div class="col-md-6">
            <ul class="nav nav-footer justify-content-end">
              <li class="nav-item">
                <a href="https://rygel.biz" class="nav-link" target="_blank">Rygel</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="terms-and-conditions" class="nav-link" target="_blank">Terms and Conditions</a>
              </li>
              <li class="nav-item">
                <a href="privacy-policy" class="nav-link" target="_blank">Privacy Policy</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
    <script src="front/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="front/js/core/popper.min.js" type="text/javascript"></script>
    <script src="front/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="front/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="front/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="front/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the Carousel, full documentation here: http://jedrzejchalubek.com/ -->
    <script src="front/js/plugins/glide.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://flatpickr.js.org/ -->
    <script src="front/js/plugins/moment.min.js"></script>
    <!--  Plugin for Select, full documentation here: https://joshuajohnson.co.uk/Choices/ -->
    <script src="front/js/plugins/choices.min.js" type="text/javascript"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://flatpickr.js.org/ -->
    <script src="front/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="front/js/plugins/jasny-bootstrap.min.js"></script>
    <!-- Plugin for Headrom, full documentation here: https://wicky.nillia.ms/headroom.js/ -->
    <script src="front/js/plugins/headroom.min.js"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="front/js/argon-design-system.min.js?v=1.0.3" type="text/javascript"></script>
    <script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
    <script>
    // Carousel
    new Glide('.presentation-cards', {
      type: 'carousel',
      startAt: 0,
      focusAt: 2,
      perTouch: 1,
      perView: 5
    }).mount();
    </script>

    <script type="text/javascript">
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });        
    </script>
    <script>
        $(document).ready(function () {
            var error = "<?php echo $this->session->flashdata('error') ?>";
            var success = "<?php echo $this->session->flashdata('success') ?>";
            var notice = "<?php echo $this->session->flashdata('notice') ?>";
            var warning = "<?php echo $this->session->flashdata('warning') ?>";


            if (success) {
                event.preventDefault();
                event.stopPropagation();
                return $.growl.success({
                    message: success
                });
            }
            if (error) {
                event.preventDefault();
                event.stopPropagation();
                return $.growl.error({
                    message: error
                });
            }
            if (warning) {
                event.preventDefault();
                event.stopPropagation();
                return $.growl.warning({
                    message: warning
                });
            }
            if (notice) {
                event.preventDefault();
                event.stopPropagation();
                return $.growl.notice({
                    message: notice
                });
            }

            var error = "<?php unset($_SESSION['error']); ?>";
            var success = "<?php unset($_SESSION['success']); ?>";
            var warning = "<?php unset($_SESSION['warning']); ?>";
            var notice = "<?php unset($_SESSION['notice']); ?>";

        });
    </script>  
</body>

</html>




