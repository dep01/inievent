<div class="card">
    <div class="card-body">
		<h6 class="card-title">Edit Form</h6>
		<form class="forms-sample" id="formuser"   method="POST" action="<?= base_url('EventType/update') ?>">
			<div class="form-group">
				<input type="hidden" class="form-control" value="<?= $data->id ?>" id="id" name="id" autocomplete="off" placeholder="ex admin">
                <label for="name">Name</label>
				<input type="text" class="form-control" name="name" value="<?= $data->name ?>" id="name" autocomplete="off" placeholder="ex Alucard van houten">
			</div>
			<div class="form-group">
				<label for="uom">UOM</label>
                <select id="uom" name="uom" class="select2" style="width: 100%;">
                    <option value="hour" <?= $data->uom =="hour"?"selected":"" ?>>Hour</option>
                    <option value="day" <?= $data->uom =="day"?"selected":"" ?>>Day</option>
                </select>
			</div>
           
            <a href="<?= base_url('EventType') ?>" class="btn btn-light mr-2">Back</a>
			<button type="submit" class="btn btn-primary mr-2">Submit</button>
		</form>
	</div>
</div>

        