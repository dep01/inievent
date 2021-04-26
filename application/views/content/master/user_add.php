<div class="card">
    <div class="card-body">
		<h6 class="card-title">Basic Form</h6>
		<form class="forms-sample" id="formuser"   method="POST" action="<?= base_url('User/add') ?>">
			<div class="form-group">
				<label for="first_name">Firstname</label>
				<input type="text" class="form-control" name="first_name" id="first_name" autocomplete="off" placeholder="Your firstname...">
			</div>
			<div class="form-group">
				<label for="last_name">Lastname</label>
				<input type="text" class="form-control" name="last_name" id="last_name" autocomplete="off" placeholder="Your lastname...">
			</div>
            <div class="form-group">
				<label for="gender">Gender</label>
                <select id="gender" name="gender" class="select2" style="width: 100%;">
                    <option value="M" selected>Male</option>
                    <option value="F" >Female</option>
                </select>
			</div>
            <div class="form-group">
				<label for="phone">Phone</label>
				<input type="text" class="form-control"name="phone" id="phone" placeholder="ex 08199288">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control"name="email" id="email" placeholder="Your email...">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" autocomplete="off">
			</div>
            <div class="form-group">
				<label for="codes">Roles</label>
                <select id="codes" name="codes" class="select2" style="width: 100%;">
                    <option value="" selected disabled>Pilih Role</option>
                    <?php foreach ($userType as $value) : ?>
                        <option value="<?= $value->codes ?>"><?= $value->name ?></option>
                    <?php endforeach; ?>
                </select>
			</div>
			<!-- <div class="form-group"> -->
				
			<!-- </div> -->
            <a href="<?= base_url('User') ?>" class="btn btn-light mr-2">Back</a>
			<button type="submit" class="btn btn-primary mr-2">Submit</button>
		</form>
	</div>
	<div class="card-body">
		<h6 class="card-title">Pick Image Profile</h6>
		<p class="card-description">Image File JPG, JPEG</p>
		<form action="<?= base_url('user/fileUpload') ?>" class="dropzone" id="exampleDropzone"></form>
	</div>
</div>

        