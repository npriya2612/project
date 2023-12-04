<?php include 'header.php';
include 'config.php';
?>
<div class="container">
    <div class="row" style="margin-top:9%;">
        <div class = "col-xl-5 col-md-4 m-auto p-5 mt-5" style = "border:1px solid #380929; border-radius:0.5em;">
        <h2 style="text-align:center; color: #380929">subscribe to email</h2>
        <form action="" method="POST">
            <div class = "mb-3" style="padding:1%;">
                <input type="email" name = "email" placeholder="Email" class = "form-control" required>
            </div>
            <div class = "mb-3" style="padding:1%;">
                <input type="submit" name = "submit_btn" class = "btn col-md-8 offset-md-2" value = "submit" style="background-color:#380929; color:white;">
            </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit_btn']))
{
    $email =mysqli_real_escape_string($config, $_POST['email']);
    $sql = "INSERT INTO email_subs (email) VALUES ('{$email}')";
        if ($config->query($sql) === TRUE) {
            echo "<div class='alert alert-success' style = 'width:40%; margin-left:30%; margin-top:2%; text-align:center;'> Thankyou for subscribing. </div>";
          } else {
            echo "<div class='alert alert-danger' style = 'width:40%; margin-left:30%; margin-top:2%; text-align:center;'> Error </div>";
          }
}
include 'footer.php';
?>