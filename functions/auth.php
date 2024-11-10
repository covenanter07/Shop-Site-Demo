<?php
@session_start();
include('../config/db.php');
include('myfunctions.php');

// Check if the user is already logged in
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged In";
    header('Location: index.php');
    exit();
}

// Handle registration
if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // Check if the email is already registered
    $check_email_query = "SELECT email FROM users WHERE email=?";
    $stmt = $con->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['message'] = "Email already registered";
        header('Location: ../register.php');
    } else {
        if ($password == $cpassword) {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert the user into the database
            $insert_query = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
            $stmt = $con->prepare($insert_query);
            $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Registered Successfully";
                header('Location: ../login.php');
            } else {
                $_SESSION['message'] = "Something went wrong";
                header('Location: ../register.php');
            }
        } else {
            $_SESSION['message'] = "Passwords do not match";
            header('Location: ../register.php');
        }
    }
}

// Handle login
else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if the user exists with the given email
    $login_query = "SELECT * FROM users WHERE email=?";
    $stmt = $con->prepare($login_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userdata = $result->fetch_assoc();
        $hashed_password = $userdata['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Regenerate session ID
            session_regenerate_id(true);

            $_SESSION['auth'] = true;
            $userid = $userdata['id'];
            $username = $userdata['name'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role_as'];

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'name' => $username,
                'email' => $useremail
            ];

            $_SESSION['role_as'] = $role_as;

            if ($role_as == 1) {
                redirect("../admin/index.php", "Welcome to Dashboard");
            } else {
                redirect("../index.php", "Logged In Successfully");
            }
        } else {
            redirect("../login.php", "Invalid Credentials");
        }
    } else {
        redirect("../login.php", "Invalid Credentials");
    }
}
