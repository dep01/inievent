<nav class="navbar">
			
				<div class="navbar-content">
				
					<ul class="navbar-nav">
					
						
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="<?php echo $this->session->userdata('image_path') != null?base_url($this->session->userdata('image_path')):"https://via.placeholder.com/80x80" ?>" alt="profile">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										
										<img src="<?php echo $this->session->userdata('image_path') != null?base_url($this->session->userdata('image_path')):"https://via.placeholder.com/80x80" ?>" alt="">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0"><?= $this->session->userdata('fullname')?></p>
										<p class="email text-muted mb-3"><?= $this->session->userdata('phone')?></p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<!-- <li class="nav-item">
											<a href="pages/general/profile.html" class="nav-link">
												<i data-feather="user"></i>
												<span>Profile</span>
											</a>
										</li> -->
									
										<li class="nav-item">
											<a href="<?= base_url('Auth/logOut')?>" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>