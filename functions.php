<?php 

	 //koneksi ke database
 $conn = mysqli_connect("localhost", "root", "", "phpdasar");

 function query($query) {
 	global $conn;
 	$result = mysqli_query($conn, $query);
 	$rows = [];
 	while( $row = mysqli_fetch_assoc($result) ){
 		$rows[] = $row;
 	}
 	return $rows;
 }

function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	//cek username
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
			  </script>";
			  return false;
	}


	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
				</script>";

				return false;
	}

	//enkripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}

function kirim($data) {
	global $conn;

	$nama = strtolower(stripcslashes($data["nama"]));
	$email = strtolower(stripcslashes($data["email"]));
	$message = strtolower(stripcslashes($data["message"]));


	mysqli_query($conn, "INSERT INTO comment VALUES('', '$nama', '$email', '$message')");

 }
 ?>