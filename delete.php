<?php
include("db.php");


$userId = $_GET["userDlt_id"];


$deleteQry = "DELETE FROM tbl_user_registration WHERE user_id = $userId";

$result = mysqli_query($conn, $deleteQry);


if ($result) {
    header("Location: user.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>