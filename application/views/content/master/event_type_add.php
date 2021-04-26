<div class="card">
    <div class="card-body">
		<h6 class="card-title">Add Form</h6>
		<form class="forms-sample" id="formuser"   method="POST" action="<?= base_url('EventType/add') ?>">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Event type name...">
			</div>
            <div class="form-group">
				<label for="uom">UOM</label>
                <select id="uom" name="uom" class="select2" style="width: 100%;">
                    <option value="hour" selected>Hour</option>
                    <option value="day" >Day</option>
                </select>
			</div>
            <a href="<?= base_url('EventType') ?>" class="btn btn-light mr-2">Back</a>
			<button type="submit" class="btn btn-primary mr-2">Submit</button>
		</form>
	</div>
</div>

        