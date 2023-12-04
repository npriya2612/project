<?php include 'header.php';
include 'config.php';
?>
<div class="container">
    <div class="row" style="margin-top:9%;">
        <div class = "col-xl-5 col-md-4 m-auto p-5 mt-5" style = "border:1px solid #380929; border-radius:0.5em;">
        <h2 style="text-align:center; color: #380929">Login</h2>
        <form action="" method="POST">
            <div class = "mb-3" style="padding:1%;">
                <input type="email" name = "email" placeholder="Email" class = "form-control" required>
            </div>
            <div class = "mb-3" style="padding:1%;">
                <input type="password" name = "password" placeholder="Password" class = "form-control" required>
            </div>
            <div class = "mb-3" style="padding:1%;">
                <input type="submit" name = "login_btn" class = "btn col-md-8 offset-md-2" value = "Login" style="background-color:#380929; color:white;">
            </div>
            </form>
            <?php
            if(isset($_SESSION['error']))
            {
                $error = $_SESSION['error'];
                echo "<div class='alert alert-danger'>".$error."</div>";
                unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>
</div>

<?php
if(isset($_POST['login_btn']))
{
    $email =mysqli_real_escape_string($config, $_POST['email']);
    $pwd = mysqli_real_escape_string($config, sha1($_POST['password']));
    $sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$pwd}'";
    $query=mysqli_query($config,$sql);
    $data = mysqli_num_rows($query);
    echo $data;
    if($data)
    {
        $result=mysqli_fetch_assoc($query);
        $user_data=array($result['username'],$result['email']);
        $_SESSION['user_data'] = $user_data;
        header("location:index.php");
    }
    else
    {
        $_SESSION['error']= "invalid email/password";
        header("location:login.php");
    }
}
include 'footer.php';
?>