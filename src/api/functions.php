<!--
<?php

// Content Type JSON
header("Content-type: application/json");

// Database connection
$conn = mysqli_connect("localhost", "root", "", "puber-vue");
if ($conn->connect_error) {
    die("Database connection failed!");
}
$res = array('error' => false);


//login
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekuser = mysqli_query($conn,"select * from user where username='$username' and password= '$password'");
    $hitung = mysqli_num_rows($cekuser);

    if($hitung>0){
        //kalau data ditemukan
        $ambildatarole = mysqli_fetch_array($cekuser);
        $role = $ambildatarole['role'];

        if($role == 'superadmin'){
            //kalau login sebagai admin
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'Admin';
            header('location:admin');
        } else {    
            //kalau bukan admin
            $_SESSION['log'] = 'Logged';
            $_SESSION['role'] = 'User';
            header('location:user');
        }
    }
}


?>
