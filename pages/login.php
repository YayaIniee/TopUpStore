<?php
    require_once('./class/class.User.php');
    if(isset($_POST['btnLogin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $objUser = new User();
        $objUser->ValidateEmail($email);

        if($objUser->hasil){
            $ismatch =  password_verify($password, $objUser->password);
            if($ismatch){
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION["userid"]= $objUser->userid;
                $_SESSION["role"]= $objUser->role;
                $_SESSION["nama"]= $objUser->nama;
                $_SESSION["email"]= $objUser->email;

                echo "<script>alert('Login Berhasil');</script>";

                if($objUser->role == 'member')
                    echo '<script>window.location == "dashboardmember.php";</script>';
                if($objUser->role == 'admin')
                    echo '<script>window.location == "dashboardadmin.php";</script>';
            } else {
                echo "<script>alert('Password tidak match');</script>";
            }
        } else {
            echo "<script>alert('Email tidak terdaftar');</script>";
        }
    }
?>
<div class="container p-5">
    <div class="row">
        <div class="col-lg-6 offset-1">
        <form action="" method="POST">
        <h2 class="text-center fnt">Login</h2>
            <label for="email" class="form-label">Email:</label>
            <div class="input-group mb-3">
            <span class="input-group-text"><i class=''>@</i></span>
            <input type="text" class="form-control" placeholder="email" id="email" name="email">
            </div>
            <label for="password" class="form-label">Password:</label>
            <div class="input-group mb-3">
            <span class="input-group-text"><i class='fas fa-key'></i></span>
            <input type="password" class="form-control" placeholder="password" id="password" name="password">
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <input type="submit" class="btn btn-warning shadow fnt" value="Login" name="btnLogin">
	        <a href="index.php" class="btn btn-danger shadow fnt text-dark">Cancel</a>
        </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div> <br><br><br>