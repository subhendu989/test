<?php
// check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validate form inputs
    if (empty($name) || empty($email) || empty($password)) {
        echo "Please fill out all fields.";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // upload and save profile picture
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $new_file_name = uniqid() . "_" . date("YmdHis") . "." . $imageFileType;
    $target_file = $target_dir . $new_file_name;
    
    if (!move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        echo "Error uploading file.";
        exit();
    }

    // save user data to CSV file
    $user_data = array($name, $email, $new_file_name);
    $fp = fopen('users.csv', 'a');
    fputcsv($fp, $user_data);
    fclose($fp);

    // start session and set cookie
    session_start();
    $_SESSION['name'] = $name;
    setcookie("user", $name, time() + 3600); // expires in 1 hour

    // redirect to success page
    header("Location: success.html");
    exit();
}
?>

<!-- If form is not submitted, redirect to registration page -->
<?php header("Location: register.html"); exit(); ?>
