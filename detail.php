<!doctype html>
<html lang="en">
<?php include_once "header.inc.php";
session_start();

require 'vendor/autoload.php';
$config = array(
            'driver'    => 'mysql', // Db driver
            'host'      => 'localhost',
            'database'  => 'villago',
            'username'  => 'root',
            'password'  => 'naiknaikkepuncakgunung',
            'options'   => array( // PDO constructor options, optional
                PDO::ATTR_TIMEOUT => 5,
                PDO::ATTR_EMULATE_PREPARES => false,
            ),
        );
new \Pixie\Connection('mysql', $config, 'QB');
$query = QB::table('villas')->join('users', 'users.id', '=', 'villas.user_id')->where('villas.id', '=', $_GET['id']);
$result = $query->get();
//var_dump($result);
?>

<body class="index-page">

<!--NAVBAR--->
<?php include_once "navbar.inc.php"; ?>
<div class="wrapper">
	<div class="header header-filter" style="background-image: url('assets/img/bg2.jpeg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>Villago</h1>
						<h3>Petualangan dimulai dari sini.</h3>
					</div>
				</div>
			</div>

		</div>
	</div>



	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
	            <div class="title">
	                <h2>Detail VIlla</h2>
	            </div>
								<h3><?php echo $result[0]->name;?></h3>
								<h4>Oleh: <a href="mailto:<?php echo $result[0]->email; ?>"><?php echo $result[0]->fullname; ?></a></h4>
								<p>
									<?php echo $result[0]->description; ?>
								</p>
								<p>
									<?php echo $result[0]->address; ?>
								</p>
	    	</div>
				<div id="map"></div>
				<div class="button">
					<a href="../" class="btn btn-primary">Kembali</a>
				</div>


				</div>
	    </div>
		</div>

		<a name="registration-form"></a>
		<div class="section section-full-screen section-signup" style="background-image: url('assets/img/city.jpg'); background-size: cover; background-position: top center; min-height: 700px;">

			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="card card-signup">
							<form class="form" method="post" action="handler.php?page=main&action=register" id="registration-form">
								<div class="header header-primary text-center">
									<h4>Sign Up</h4>
									<div class="social-line">
										<a href="#" class="btn btn-simple btn-just-icon">
											<i class="fa fa-facebook-square"></i>
										</a>
										<a href="#" class="btn btn-simple btn-just-icon">
											<i class="fa fa-twitter"></i>
										</a>
										<a href="#" class="btn btn-simple btn-just-icon">
											<i class="fa fa-google-plus"></i>
										</a>
									</div>
								</div>
								<p class="text-divider">Atau gunakan cara lama...</p>
								<div class="content">

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input name="fullname" type="text" class="form-control" placeholder="Full Name..." required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input name="email" type="text" class="form-control" placeholder="Email..." required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input name="password" type="password" placeholder="Password..." class="form-control" required>
									</div>

									<!-- If you want to add a checkbox to this form, uncomment this code

									<div class="checkbox">
										<label>
											<input type="checkbox" name="optionsCheckboxes" checked>
											Subscribe to newsletter
										</label>
									</div> -->
								</div>
								<div class="footer text-center">
									<input type="submit" class="btn btn-simple btn-primary btn-lg" value="Daftarkan!">


								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>

		<?php include_once "footer.inc.php"; ?>
		<!--login modalsssss-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h1 class="text-center">Login</h1>
</div>
<div class="modal-body">
		<form class="form col-md-12 center-block" method="post" action="handler.php?page=main&action=login">
			<div class="form-group">
				<input name="email" class="form-control input-lg" placeholder="Email" type="text" required>
			</div>
			<div class="form-group">
				<input name="password" class="form-control input-lg" placeholder="Password" type="password" required>
			</div>
			<div class="form-group">
				<input class="btn btn-primary btn-lg btn-block" type="submit" value="Masuk" />

				<span class="pull-left"><a href="#registration-form" aria-hidden="true" onclick="$('#loginModal').modal('hide')">register</a></span>
			</div>
		</form>
</div>
<div class="modal-footer">
		<div class="col-md-12">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
</div>
</div>
</div>
</div>
</div>
</div>
<!--  End Modal -->


<!-- Sart Modal -->
<!--  End Modal -->


</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoNqDy1CX5_DPZXlfSw-3gjMhPeVqi84c&callback=initMap">
	</script>
	<script type="text/javascript">

		$().ready(function(){
			// the body of this function is in assets/material-kit.js
			materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}

		});
		function submitForm(){
    	$('#registration-form').submit();
		}

		function initMap() {
			var uluru = {lat: <?php echo $result[0]->latitude; ?>, lng: <?php echo $result[0]->longtitude; ?>};
			var map = new google.maps.Map(document.getElementById('map'), {
			 zoom: 15,
			 center: uluru
			});
			var marker = new google.maps.Marker({
			 position: uluru,
			 map: map
			});
		}
	</script>
</html>
