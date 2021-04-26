<div class="card">
              <div class="card-body">
								<h6 class="card-title">User</h6>
                                <a href="<?= base_url('User/showFormAdd') ?>"><button  class="btn btn-primary mr-2">Add User</button></a>
								<div class="table-responsive">
                                <table class="table">
											<thead>
												<tr>
													<th>Fullname</th>
													<th>Gender</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php  foreach($data as $val){ ?>
													<tr>
													<td><?= $val->first_name.$val->last_name ?></td>
													<td><?= $val->gender == 'M'?'Male':'Female' ?></td>
													<td><?= $val->email ?></td>
													<td><?= $val->phone ?></td>
													<td>
														<button type="button" onClick="showAlertConfirm('<?= $val->id ?>')" class="btn btn-danger btn-icon">
															<i data-feather="trash"></i>
														</button>
														<a href="<?= base_url('User/showFormEdit/'.$val->id) ?>">
															<button type="button" class="btn btn-primary btn-icon">
																<i data-feather="edit"></i>
															</button>
														</a>
													</td>
												</tr>
												<?php }; ?>
											</tbody>
										</table>
								</div>
              </div>
            </div>
			<script type="text/javascript">
			function showAlertConfirm(id){
				swal.fire({
					title: 'Are you sure to delete this data?',
					icon: 'info',
					showCancelButton: true,
					focusConfirm: false,
					showCloseButton: true,
					confirmButtonText:'<a class="btn btn-primary" >NO</a>',
					cancelButtonText:'<a href="<?= base_url("User/delete/")?>'+id+'" class="btn btn-danger" >YES</a>',
				})
			}
    </script>