<?php
include "./db.php";
if (isset($_SERVER['HTTP_ORIGIN'])) {
	// Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
	// you want to allow, and if so:
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 1000');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
			// may also be using PUT, PATCH, HEAD etc
			header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
	}

	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
			header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
	}
	exit(0);
}

$res = array('error' => false);
$action='';

if (isset($_GET['action'])) {
	
	$action=$_GET['action'];
}
if($action=='login'){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="Select * from `user` where username='$username' AND password='$password'";
    $result=$conn->query($sql);
    $num=mysqli_num_rows($result);
    if($num > 0){
        $res['message']="Login Berhasil";
    }
    else{
        $res['error']=true;
        $res['message']="Your Login Username or Password is invalid";
    }
}
if($action=='logout'){
	session_start();
	session_destroy();
	$res['message']="Logout Berhasil";
}

if($action=='addusers'){
	$niup=$_POST['niup'];
	$nama_santri=$_POST['nama_santri'];
	$desa=$_POST['desa'];
	$kecamatan=$_POST['kecamatan'];
	$kabupaten=$_POST['kabupaten'];
	$provinsi=$_POST['provinsi'];
	$kamar=$_POST['kamar'];
	$daerah=$_POST['daerah'];
	$wilayah=$_POST['wilayah'];
	$nomor_wali=$_POST['nomor_wali'];
	$status_kepulangan=$_POST['status_kepulangan'];
	$lembaga=$_POST['lembaga'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$valid_dropspot=$_POST['valid_dropspot'];
	$tarif=$_POST['tarif'];
	$pembayaran=$_POST['pembayaran'];
	$cek_bayar=$_POST['cek_bayar'];
	$my_bus=$_POST['my_bus'];
	$pendamping=$_POST['pendamping'];
	$no_hp_pendamping=$_POST['no_hp_pendamping'];
	$keterangan_tarif_dp=$_POST['keterangan_tarif_dp'];
	 
	$sql="INSERT INTO `masterdata`(
		`id`, 
		`niup`, 
		`nama_santri`, 
		`desa`, 
		`kecamatan`,
		`kabupaten`,
		`provinsi`,
		`kamar`,
		`daerah`,
		`wilayah`,
		`nomor_wali`,
		`status_kepulangan`,
		`lembaga`,
		`jenis_kelamin`,
		`valid_dropspot`,
		`tarif`,
		`pembayaran`,
		`cek_bayar`,
		`my_bus`,
		`pendamping`,
		`no_hp_pendamping`,
		`keterangan_tarif_dp`,
		) 
		VALUES(
			NULL,
			'$niup',
			'$nama_santri',
			'$desa',
			'$kecamatan',
			'$kabupaten',
			'$provinsi',
			'$kamar',
			'$daerah',
			'$wilayah',
			'$nomor_wali',
			'$status_kepulangan',
			'$lembaga',
			'$jenis_kelamin',
			'$jenis_kelamin',
			'$valid_dropspot',
			'$tarif',
			'$pembayaran',
			'$cek_bayar',
			'$my_bus',
			'$pendamping',
			'$no_hp_pendamping',
			'$keterangan_tarif_dp')";
	$result=$conn->query($sql);
	if($result===true){
		$res['error']=false;
        $res['message']="Santri Berhasil ditambahkan";
	}else{
		$res['error']=true;
        $res['message']="Terjadi Kesalahan";
	}

}

if($action=='getuserinfo'){
	$sql="SELECT * FROM `masterdata`";
	$result=$conn->query($sql);
	$num=mysqli_num_rows($result);
	$userData=array();
	if($num >0){
		while($row=$result->fetch_assoc()){
			array_push($userData,$row);
		}
		$res['error']=false;
        $res['user_Data']=$userData;

	}else{
		$res['error']=false;
        $res['message']="Tidak Ada Data!";
	}
	
}



$conn -> close();
header("Content-type: application/json");
echo json_encode($res);
die();
 ?>