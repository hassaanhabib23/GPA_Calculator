<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gpa_login.css">
    <title>Student Details</title>
</head>

<body>
    <?php
    $error = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $valid = true;
        if (empty($_POST['studentname'])) {
            $valid = false;
            array_push($error, "Enter name first");
        }
        if (!empty($_POST['studentname']) && is_numeric($_POST['studentname'])) {
            array_push($error, "Name contain only letters");
            $valid = false;
        }
        if (empty($_POST['reg_no'])) {
            array_push($error, "Enter reg-no first");
            $valid = false;
        }
        if ($valid == true) {
            $name = $_POST['studentname'];
            $regno = $_POST['reg_no'];
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['regno'] = $regno;
            $_SESSION['time'] = time();
            header("Location:http://localhost/GPA_CALCULATOR/gpa_calculator.php");
        }
    }
    ?>
    <div class="divstyling">
        <form method="post">
            <h1 style="padding-top: 50px; color:white">Student Data</h1>
            <input type="text" name="studentname" placeholder="Name" class="fieldstyling"><br><br>
            <input type="text" name="reg_no" placeholder="Registration Number" class="fieldstyling"><br><br>
            <?php foreach ($error as $print) { ?>
                <h4><?php echo $print ?> </h4>
            <?php } ?>
            <button class="button1">Continue</button>
        </form>
    </div>
</body>

</html>