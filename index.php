<?php 

	@ob_start();
	session_start();

	if(!empty($_SESSION['admin'])){
		require 'config.php';
		include $model;
		$lihat = new model($config);
		$toko = $lihat -> toko();
		//  admin
			include 'app/view/template/header.php';
			include 'app/view/template/sidebar.php';
				if(!empty($_GET['page'])){
					include 'app/view/'.$_GET['page'].'/index.php';
				}else{
					include 'app/view/template/home.php';
				}
			include 'app/view/template/footer.php';
		// end admin
	}else{
		echo '<script>window.location="app/controllers/login.php";</script>';
	}
?>

