<?php
    $connect = mysqli_connect('localhost','root','','blog') or die('Can not connect database.');
    mysqli_set_charset($connect,"utf8");
    session_start();
?>
<?php

if(isset($_POST["signup"])){
    $user_name2 = $_POST["username2"];
    $pass_word2 = $_POST["password2"];
    $email2 = $_POST["email2"];
    $sex = $_POST["sex"];

    if (!$user_name2|| !$pass_word2|| !$email2|| !$sex)
    {
        echo '<script> if (confirm("Vui lòng nhập đầy đủ thông tin.")) {history.go(-1);} else {location.replace("index.php")}</script>';
        exit;
    }

    if (mysqli_num_rows(mysqli_query($connect,"select username from users where username = '$user_name2'")) > 0)
    {
        echo '<script> if (confirm("Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác")) {history.go(-1);} else {location.replace("index.php")}</script>';
        exit;
    }
    /*if (!preg_match("/^[a-zA-Z ]+$/",$user_name2))
    {
        echo '<script> if (confirm("Tên đăng nhập chứa kí tự đặc biệt. Vui lòng chọn tên hợp lệ")) {history.go(-1);} else {location.replace("index.php")}</script>';
       exit;
     }*/
   $addmember = mysqli_query($connect,"insert into users(username, password, email, sex) values('$user_name2','$pass_word2', '$email2', '$sex')");
    if ($addmember)
        echo '<script> alert("Quá trình đăng ký thành công."); location.replace("index.php");</script>';
    else
        echo '<script> if (confirm("Có lỗi xảy ra trong quá trình đăng ký.")) {history.go(-1);} else {location.replace("index.php")}</script>';
}

if (isset($_POST['signin']))
{
    $user_name1 = $_POST['username1'];
    $pass_word1 = $_POST['password1'];

    if (!$user_name1 || !$pass_word1) {
        echo '<script> if (confirm("Vui lòng nhập đầy đủ tên và mật khẩu.")) {history.go(-1);} else {location.replace("home.php")}</script>';
        exit;
    }

    /*if (!preg_match("/^[a-zA-Z ]+$/",$user_name1))
    {
        echo '<script> if (confirm("Tên đăng nhập chứa kí tự đặc biệt. Vui lòng chọn tên hợp lệ")) {history.go(-1);} else {location.replace("home.php")}</script>';
        exit;
    }*/

    if (mysqli_num_rows(mysqli_query($connect, "select username from users where username = '$user_name1'")) == 0) {
        echo '<script> if (confirm("Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại.")) {history.go(-1);} else {location.replace("home.php")}</script>';
        exit;
    }

    if (mysqli_num_rows(mysqli_query($connect, "select username,password from users where password = '$pass_word1' and username = '$user_name1'")) == 0) {
        echo '<script> if (confirm("Mật khẩu không đúng. Vui lòng nhập lại.")) {history.go(-1);} else {location.replace("home.php")}</script>';
        exit;
    }
    $_SESSION['username1'] = $user_name1;
    header("Location: home.php");
}
?>