<?php
include 'header.php';
include 'config.php';
?>
<style>
    input[type="submit"]
    {
        background-color:"white";
    }
</style>
<div class="container">
    <div class="row" style="margin-top:4%;">
        <div class = "col-xl-6 col-md-4 m-auto p-5 mt-5" style = "border:1px solid #72330d; border-radius:0.5em;">
        <h2 style="text-align:center; color: #72330d">Signup</h2>
        <form action="" method="POST">
            <table style="width:100%;">
                <thead>
                    <th style ="width:40%;"></th>
                    <th style = "width:70%;"></th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Username:
                        </td>
                        <td>
                        <input type="text" name = "username" placeholder="Username" class = "form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                        <input type="email" name = "email" placeholder="Email" class = "form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                        <input type="password" name = "password" placeholder="Password" class = "form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Confirm Password:
                        </td>
                        <td>
                        <input type="password" name = "cnf_password" placeholder="Confirm Password" class = "form-control" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <input type="submit" name = "signup_btn"  value = "Signup" class = "btn col-md-8 offset-md-2" style="background-color:#72330d; color:white;" > 
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['signup_btn']))
{
    $x = "";
    $email =mysqli_real_escape_string($config, $_POST['email']);
    $pwd = mysqli_real_escape_string($config, $_POST['password']);
    $username =mysqli_real_escape_string($config, $_POST['username']);
    $cnf_pwd = mysqli_real_escape_string($config, $_POST['cnf_password']);
    if($pwd!=$cnf_pwd)
    {
        echo "<div class='alert alert-danger' style = 'width:40%; margin-left:30%; margin-top:2%; text-align:center;'> The data entered in the password and confirm password fields does not match </div>";
    }
    else
    {
        $sqlx = "SELECT * FROM users WHERE email = '{$email}'";
        $query=mysqli_query($config,$sqlx);
        $data = mysqli_num_rows($query);
        if($data>=1)
        {
            echo "<div class='alert alert-danger' style = 'width:40%; margin-left:30%; margin-top:2%; text-align:center;'> This email id is already registered. Kindly try logging in </div>";
        }
        else
        {
            $h_pwd = sha1($pwd);
        $sql = "INSERT INTO users (username, email, password) VALUES ('{$username}','{$email}','{$h_pwd}')";
        if ($config->query($sql) === TRUE) {
            echo "<div class='alert alert-success' style = 'width:40%; margin-left:30%; margin-top:2%; text-align:center;'> Signed up successfully </div>";
          } else {
            echo "<div class='alert alert-danger' style = 'width:40%; margin-left:30%; margin-top:2%; text-align:center;'> Error </div>";
          }
        }
    }
}
include 'footer.php';
?>