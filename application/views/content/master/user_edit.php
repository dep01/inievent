<div class="card">
    <div class="card-body">
		<h6 class="card-title">Basic Form</h6>
		<form class="forms-sample" id="formuser"   method="POST" action="<?= base_url('User/update') ?>">
			<div class="form-group">
				<input type="hidden" class="form-control" value="<?= $data->id ?>" id="id" name="id" autocomplete="off" placeholder="ex admin">
				<input type="hidden" class="form-control" value="<?= $data->image ?>" id="image_path" name="image_path" autocomplete="off" placeholder="ex admin">
                <label for="fullname">Firstname</label>
				<input type="text" class="form-control" name="first_name" value="<?= $data->first_name ?>" id="first_name" autocomplete="off" placeholder="ex Alucard van houten">
			</div>
			<div class="form-group">
				<label for="last_name">Lastname</label>
				<input type="text" class="form-control" name="last_name" value="<?= $data->last_name ?>" id="last_name" autocomplete="off" placeholder="Your lastname...">
			</div>
            <div class="form-group">
				<label for="gender">Gender</label>
                <select id="gender" name="gender" class="select2" style="width: 100%;">
                    <option value="M"  <?= $data->gender =="M"?"selected":"" ?> >Male</option>
                    <option value="F" <?= $data->gender =="F"?"selected":"" ?> >Female</option>
                </select>
			</div>
            <div class="form-group">
				<label for="phone">Phone</label>
				<input type="text" class="form-control"name="phone"  value="<?= $data->phone ?>"  id="phone" placeholder="ex 08199288">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control"name="email" value="<?= $data->email ?>"  id="email" placeholder="Your email...">
			</div>
            <div class="form-group">
				<label for="codes">Role</label>
                <select id="codes" name="codes"  class="select2" style="width: 100%;">
                    <?php foreach ($userType as $value) : ?>
                        <option value="<?= $value->codes  ?>" <?= $data->user_type_code ==$value->codes?"selected":'' ?>><?= $value->name ?></option>
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

        