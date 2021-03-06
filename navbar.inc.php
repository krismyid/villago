<?php
session_start();
?>
<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="//villago.xyz">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="assets/img/logo.png" alt="Creative Tim Logo" rel="tooltip" title="<b>Villago</b> was Designed & Coded with care by the creative monkeys from <b>Mercubuana Jakarta</b>" data-placement="bottom" data-html="true">
	                </div>
	                <div class="brand">

	                </div>
				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				<li>
					<?php
					if (isset($_SESSION['userid'])) {
						?>
						<a href="#" data-toggle="modal" data-target="#loginModal" target="_blank">
							<i class="material-icons">play_arrow</i> Logout
						</a>
						<?php
					}
					?>
					<a href="#" data-toggle="modal" data-target="#loginModal" target="_blank">
						<i class="material-icons">play_arrow</i> Masuk
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>
				</li>
				<li>
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-instagram"></i>
					</a>
				</li>

	    	</ul>
	    </div>

	</div>

</nav>
<!-- End Navbar -->
