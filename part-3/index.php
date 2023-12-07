<?php
$server = "localhost:3307";
$user = "root";
$password = "";
$database = "foundrmeet";
$conn = mysqli_connect($server, $user, $password, $database);

function sendMail($name, $email, $message)
{
    $subject = "Your Message";
    $to = $email;

    $body = "
    <h3> This is what we received from you: </h3>
    <br>
    <b>Name: </b>
    <span>" . $name . "
    <br>
    <b>Email: </b>
    <span>" . $email . "
    <br>
    <b>Message: </b>
    <span>" . $message . "
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $result_mail = mail($to, $subject, $body, $headers);

    if ($result_mail) return true;
    return false;
}

$alert_msg = "";
if (isset($_POST['submit-message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO `contact` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (sendMail($name, $email, $message)) {
            $alert_msg = "Thanks for contacting us. We will reach back to you soon!!";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Part 3</title>
    <link rel="shortcut icon" href="letter-p.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid text-center">
                    <h1 class="text-white w-100 text-center">PART 3 - PhP Proficiency</h1>
                </div>
            </nav>
        </header>
        <div class="w-50 my-3 mx-auto">
            <form method="post" action="index.php">
                <h2 class="mb-3">Contact Form</h2>
                <?php
                if (!empty($alert_msg))
                    echo '<div class="alert alert-success" role="alert">' . $alert_msg . '</div>';
                ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="5" placeholder="Enter message" required></textarea>
                </div>
                <button type="submit" name="submit-message" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>