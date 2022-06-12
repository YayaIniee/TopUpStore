<?php
    require_once ('./class/class.User.php');
    if(isset($_POST["btnSubmit"])){
        $inputemail = $_POST["email"];        
        $objUser = new User();
        $objUser->ValidateEmail($inputemail);
        $objUser->hasil = false;

        if($objUser->hasil){
            echo "<script>alert('Email sudah terdaftar');</script>";
        } else {
            $objUser->email = $_POST['email'];
            $password = $_POST['password'];
            $objUser->password = password_hash($password, PASSWORD_DEFAULT);
            $objUser->name = $_POST['name'];
            $objUser->role = 'member';
            $objUser->AddUser();

            if($objUser->hasil){
                echo "Registrasi berhasil";
                echo $objUser->password;
                echo $password;
               // echo "<script> alert('Registrasi berhasil'); </script>";
			   // echo '<script> window.location="index.php?p=login"; </script>'; 
            }
        }
    }
?>


<div class="container p-5">
    <div class="row">
        <div class="col-lg-6 offset-1">
        <form action="" method="POST">
        <h2 class="text-center fnt">Register</h2>
            <label for="name" class="form-label">Name:</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class='fas fa-user-alt'></i></span>
                <input type="text" class="form-control" placeholder="name" id="name" name="name">
            </div>
            <label for="email" class="form-label">Email:</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class=''>@</i></span>
                <input type="email" class="form-control" placeholder="email" id="email" name="email">
            </div>
            <label for="password" class="form-label">Password:</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class='fas fa-key'></i></span>
                <input type="password" class="form-control" placeholder="password" id="password" name="password">
            </div>
            <label for="password2" class="form-label">Re-Type Password:</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class='fas fa-retweet'></i></span>
                <input type="password" class="form-control" placeholder="re-type password" id="password2" name="password2">
            </div>
            <button class="btn btn-warning shadow fnt" name="btnSubmit" type="submit">Sing Up</button>
        </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div> <br><br>