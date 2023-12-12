<?php
	class Logout {
		public function Logout(){
			session_start();
			session_destroy();
			echo '<script>alert("Anda Telah Logout");window.location="login.php"</script>';
			header('location: '. base_url . '/login');

		}
	}
?>
