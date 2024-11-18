
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a>									
								</li>
								<li><a href="about.html">About</a></li>
								</li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="{{ route('user.register') }}">Register</a></li>
								<li>
									<div class="header-icons">
										<a href="{{ auth()->guard('manager')->check() ? route('manager.dashboard') : (auth()->guard('auth')->check() ? route('user.dashboard') : route('login')) }}" class="boxed-btn">
											{{ auth()->guard('manager')->check() || auth()->guard('auth')->check() ? 'Dashboard' : 'Login' }}
										</a>
									</div>
									
								</li>
							</ul>
						</nav>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
