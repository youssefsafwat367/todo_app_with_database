<?php
//------------- to check if the method is post or get------------ 
function sanitize($method)
{
    if ($method == "POST") {
        return true;
    } else {
        return false;
    }
}
//------------- to check if we write in inputs and remove white spaces ------------ 
function check_written($value)
{
    if (isset($value)) {
        return true;
    } else {
        return false;
    }
}
//------------------------------------ redirect function ------------------------------ 
function redirect($path)
{
    header("location:$path");
}
//------------------------------------ type of image function ------------------------------ 
function get_image_type($image){
    $explode_image_file = explode(".", $image);
    $type_of_image = end($explode_image_file);
    return $type_of_image ;
}

//------------------------------------ check email exist function ------------------------------ 
function check_existing($hostname, $username, $password, $database, $table_name,  $email)
{
    $conn = mysqli_connect($hostname, $username, $password,  $database);
    if (!$conn) {
        return "connect error" . mysqli_connect_error($conn);
    }
    $sql = "SELECT email FROM $table_name";
    $result = mysqli_query($conn, $sql);
    $res  = $result->fetch_all();
    foreach ($res as  $array) {
        foreach ($array as $email_exist) {
            if ($email_exist == $email) {
                return "this email is already in use , please try again";
                die();
            }
        }
    }
}
//------------------------------------ get user id function ------------------------------ 
function get_id($hostname, $username, $password, $database, $table_name,  $email)
{
    $conn = mysqli_connect($hostname, $username, $password,  $database);
    if (!$conn) {
        return "connect error" . mysqli_connect_error($conn);
    }
    $sql = "SELECT id FROM $table_name  WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $res  = $result->fetch_all();
    $id = $res[0][0];
    return $id;
}
//------------------------------------ get users function ------------------------------ 
function get_users($hostname, $username, $password, $database, $table_name)
{
    $conn = mysqli_connect($hostname, $username, $password,  $database);
    if (!$conn) {
        return "connect error" . mysqli_connect_error($conn);
    }
    $sql = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $sql);
    $res  = $result->fetch_all();
    return $res;
}
//------------------------------------ get user name function ------------------------------ 
function get_name($hostname, $username, $password, $database, $table_name, $email)
{
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if (!$conn) {
        return "connect error" . mysqli_connect_error($conn);
    }
    $sql = "SELECT name FROM $table_name WHERE email = '$email'";
    $result = mysqli_query($conn,
        $sql
    );
    $res = $result->fetch_all();


    $name = $res[0][0];
    return $name;
}