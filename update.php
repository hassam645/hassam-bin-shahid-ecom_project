<?php
include("db.php");

if(!isset($_GET["user_id"])){
    die("User ID not Found");
}

$userid = $_GET["user_id"];


$qry = "SELECT * FROM tbl_user_registration WHERE user_id = $userid;";
$result = mysqli_query($conn, $qry);
$user = mysqli_fetch_assoc($result);

if(!$user){
    die("User not Found");
}


if(isset($_POST["updateBTN"])){
    $username = $_POST["u_fullname"];
    $useremail = $_POST["u_email"];
    $userpassword = $_POST["u_password"];

    
    $updateQry = "UPDATE tbl_user_registration 
                  SET user_full_name='$username', 
                  user_email='$useremail',
                  user_password='$userpassword'
                  WHERE user_id=$userid;";

    $upddaResult = mysqli_query($conn, $updateQry);

    if($upddaResult){
        
        header("Location: user.php");
        exit();
    } else {
        echo "Error Updating User: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User Details</title>
   
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Update User Info</h1>
    </div>

    <div class="card">
        <form method="POST" action="">
            
            <div class="row">
                <label>Full Name:</label>
                <input type="text" name="u_fullname" value="<?php echo $user['user_full_name']; ?>" required>
            </div>
            
            <div class="row">
                <label>Email Address:</label>
                <input type="email" name="u_email" value="<?php echo $user['user_email']; ?>" required>
            </div>
            
            <div class="row">
                <label>Password:</label>
                <input type="password" name="u_password" value="<?php echo $user['user_password']; ?>" required>
            </div>
            
            <div class="actions">
                <input type="submit" name="updateBTN" value="Update User">
                
                <a href="user.php" style="display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; font-size: 14px;">Cancel</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>