<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>NobleUI Responsive Bootstrap 4 Dashboard Template</title>
    <link href="<?= base_url('assets/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/core/core.css')  ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fonts/feather-font/css/iconfont.css')  ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/flag-icon-css/css/flag-icon.min.css')  ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/demo_1/style.css')  ?>">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')  ?>" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="auth-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Review<span>Panel</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample"  method="POST" action="<?= base_url('Auth/CheckLogin') ?>">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="ex Alu-Man">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control"name="password" id="password" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="mt-3">
                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                        Login
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/vendors/core/core.js')  ?>"></script>
	<script src="<?php echo base_url('assets/vendors/feather-icons/feather.min.js')  ?>"></script>
	<script src="<?php echo base_url('assets/js/template.js')  ?>"></script>
    <script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js') ?>"></script>
    <script type="text/javascript">
        $(function() {
            var title = '<?= $this->session->flashdata("title") ?>';
            var type = '<?= $this->session->flashdata("type") ?>';
            var message = '<?= $this->session->flashdata("message") ?>';
            if (type && title && message) {
                swal({
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