<?php

@session_start();
include('../config/db.php');

function getAll($table)
{
    global $con; // need to defined 
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getByID($table, $id)
{
    global $con; // need to defined 
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}



function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:' . $url);
    exit(0);
}

function getAllOreders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getOrederHistory()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status !='0' ";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNoValid($trackingNo)
{
    global $con;
    $userid = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE tracking_no ='$trackingNo' ";
    return mysqli_query($con, $query);
}
