<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'C:\wamp64\www\game\vendor\autoload.php';

    if (isset($_POST["register"]))
    {
        $name = $_REQUEST["name"];
        $lname = $_REQUEST['last_name'];
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $age=$_REQUEST['Age'];

        //Instantiation and passing `true` enables exceptions
     
            // echo 'Message has been sent';
               $mail = new PHPMailer(true);

        try {
            $conn = mysqli_connect("localhost", "root","root","gamestore");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

            //Send using SMTP
            $mail->isSMTP();

            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';

            //Enable SMTP authentication
            $mail->SMTPAuth = true;

            //SMTP username
            $mail->Username = 'dev.260802@gmail.com';

            //SMTP password
            $mail->Password = 'kyifetrgwchmzwnm';

            //Enable TLS encryption;
            $mail->SMTPSecure = 'tls';

            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('dev.260802@gmail.com', 'your_website_name');

            //Add a recipient
            $mail->addAddress($email, $name);

            //Set email format to HTML
            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

            $mail->send();
            // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
            // $verification_code=$_REQUEST['verification_code'];
            // define("data",$verification_code,true);
            // connect with database
            // $conn = mysqli_connect("localhost", "root","root","test");
            // echo "hello";
            // insert in users table
            // $sql = "INSERT INTO users(name,last_name, email,Age, password, email_verified_at) VALUES ('" . $name . "','" . $lname . "', '" . $email . "','" . $age . "', '" . $password . "', NULL)";
            // $sql = "INSERT INTO users(name, email, password, verification_code, email_verified_at) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
          
            $fname = $_REQUEST['name'];
            $lname = $_REQUEST['last_name'];
            $email = $_REQUEST['email'];
            $pass = $_REQUEST['password'];
            // $cpass = $_REQUEST['confirm_password'];
            $age=$_REQUEST['Age'];
            $query = "INSERT INTO persons(FirstName, LastName, Email, Password,age) VALUES('$fname','$lname','$email','$pass','$age')";
          
          
          
          
            mysqli_query($conn, $squery);

            header("Location: email-verification.php?email=" . $verification_code);
            exit();
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>

<form method="POST">
    <input type="text" name="name" placeholder="Enter name" required />
    <input type="text" name="last_name" placeholder="Enter name" required />
    <input type="email" name="email" placeholder="Enter email" required />
    <input type="password" name="password" placeholder="Enter password" required />
    <input type="text" name="Age" placeholder="Enter name" required />
    <input type="submit" name="register" value="Register">
</form>