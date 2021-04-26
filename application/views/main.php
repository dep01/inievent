<!DOCTYPE html>

<html lang="en">
<head>
<?php include('templates/header.php') ?>
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
	<nav class="sidebar">
    <?php include('templates/sidebar.php') ?>
    </nav>
		<div class="page-wrapper">
        <?php include('templates/navbar.php') ?>

			<div class="page-content">

      <?php $this->load->view($content) ?>

			</div>

            <?php include('templates/footer.php') ?>
		
		</div>
	</div>

  <script src="<?= base_url('assets/vendors/core/core.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/chartjs/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/jquery.flot/jquery.flot.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/jquery.flot/jquery.flot.resize.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/apexcharts/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/progressbar.js/progressbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/feather-icons/feather.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/template.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
  <script src="<?= base_url('assets/js/datepicker.js') ?>"></script>
  <script src="<?= base_url('assets/js/dropzone.js')?>"></script>
  <script src="<?= base_url('loadingoverlay.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/sweetalert2/sweetalert2.min.js')?>"></script>

	<script src="<?= base_url('assets/vendors/jquery-validation/jquery.validate.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/inputmask/jquery.inputmask.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/select2/select2.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/typeahead.js/typeahead.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/jquery-tags-input/jquery.tagsinput.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/dropzone/dropzone.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/dropzone.js') ?>"></script>
	<script src="<?= base_url('assets/js/dropify.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/dropify/dist/dropify.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/moment/moment.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') ?>"></script>
	<script src="<?= base_url('assets/js/form-validation.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap-maxlength.js') ?>"></script>
	<script src="<?= base_url('assets/js/inputmask.js') ?>"></script>
	<script src="<?= base_url('assets/js/select2.js') ?>"></script>
	<script src="<?= base_url('assets/js/typeahead.js') ?>"></script>
	<script src="<?= base_url('assets/js/tags-input.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap-colorpicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/datepicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/timepicker.js') ?>"></script>

	<!-- end custom js for this page -->
  <script type="text/javascript">
        $(function() {
            var title = '<?= $this->session->flashdata("title") ?>';
            var type = '<?= $this->session->flashdata("type") ?>';
            var message = '<?= $this->session->flashdata("message") ?>';
            if (type && title && message) {
                swal.fire({
                    title: title,
                    type: type,
                    text: message,
                    timer: 3000,
                    showConfirmButton: true
                });
            };
        });
    </script>
</body>
</html>    