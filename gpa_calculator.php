<!DOCTYPE html>
<?php include "gpa_2.php"; 
    session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gpa_calculator.css">
    <title>GPA Calculator</title>
</head>

<body>
    <?php
   // $conn=new mysqli()
    $errors = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $valid = true;
        if (empty($_POST['subject1']) || empty($_POST['1_assignmentmarks']) || empty($_POST['1_quizmarks']) || empty($_POST['1_midmarks']) || empty($_POST['1_finalmarks'])) {
            array_push($errors, "Empty fields subject 1");
            $valid = false;
        }
        if (empty($_POST['subject2']) || empty($_POST['2_assignmentmarks']) || empty($_POST['2_quizmarks']) || empty($_POST['2_midmarks']) || empty($_POST['2_finalmarks'])) {
            array_push($errors, "Empty fields in subject 2");
            $valid = false;
        }
        if (empty($_POST['subject3']) || empty($_POST['3_assignmentmarks']) || empty($_POST['3_quizmarks']) || empty($_POST['3_midmarks']) || empty($_POST['3_finalmarks'])) {
            array_push($errors, "Empty fields in subject3");
            $valid = false;
        }
        if (empty($_POST['subject4']) || empty($_POST['4_assignmentmarks']) || empty($_POST['4_quizmarks']) || empty($_POST['4_midmarks']) || empty($_POST['4_finalmarks'])) {
            array_push($errors, "Empty fields in subject 4");
            $valid = false;
        }
        if (empty($_POST['subject5']) || empty($_POST['5_assignmentmarks']) || empty($_POST['5_quizmarks']) || empty($_POST['5_midmarks']) || empty($_POST['5_finalmarks'])) {
            array_push($errors, "Empty fields in subject 5");
            $valid = false;
        }
        if (!empty($_POST['subject1']) && !ctype_alpha($_POST['subject1'])) {
            array_push($errors, "Subject name contain only letters");
            $valid = false;
        }
        if (!empty($_POST['subject2']) && !ctype_alpha($_POST['subject2'])) {
            array_push($errors, "Subject name contain only letters");
            $valid = false;
        }
        if (!empty($_POST['subject3']) && !ctype_alpha($_POST['subject3'])) {
            array_push($errors, "Subject name contain only letters");
            $valid = false;
        }
        if (!empty($_POST['subject4']) && !ctype_alpha($_POST['subject4'])) {
            array_push($errors, "Subject name contain only letters");
            $valid = false;
        }
        if (!empty($_POST['subject5']) && !ctype_alpha($_POST['subject5'])) {
            array_push($errors, "Subject name contain only letters");
            $valid = false;
        }
        if ($valid == true) {
            $course1_CH = (int)$_POST['course1'];
            $course2_CH = (int)$_POST['course2'];
            $course3_CH = (int)$_POST['course3'];
            $course4_CH = (int)$_POST['course4'];
            $course5_CH = (int)$_POST['course5'];
            if ($_POST['1_labmarks'] > 0) {
                $num = 1;
                $obtainedmarksCourse1 = assignmentmarks("1_assignmentmarks") + quizmarks("1_quizmarks") + midmarks("1_midmarks") + finalmarks("1_finalmarks", $num) + labmarks("1_labmarks");
                $percentage = ($obtainedmarksCourse1 / 100) * 100;
                $Gradepoint_course1 = calculateweightage($percentage, $course1_CH);
            } else {

                $num = 0;
                $obtainedmarksCourse1 = assignmentmarks("1_assignmentmarks") + quizmarks("1_quizmarks") + midmarks("1_midmarks") + finalmarks("1_finalmarks", $num);
                $percentage = ($obtainedmarksCourse1 / 100) * 100;
                $Gradepoint_course1 = calculateweightage($percentage, $course1_CH);
            }
            if (!$_POST['2_labmarks'] > 0) {
                $num = 1;
                $obtainedmarksCourse2 = assignmentmarks("2_assignmentmarks") + quizmarks("2_quizmarks") + midmarks("2_midmarks") + finalmarks("2_finalmarks", $num) + labmarks("2_labmarks");
                $percentage = ($obtainedmarksCourse2 / 100) * 100;

                $Gradepoint_course2 = calculateweightage($percentage, $course2_CH);
            } else {
                $num = 0;
                $obtainedmarksCourse2 = assignmentmarks("2_assignmentmarks") + quizmarks("2_quizmarks") + midmarks("2_midmarks") + finalmarks("2_finalmarks", $num);
                $percentage = ($obtainedmarksCourse2 / 100) * 100;
                $course2_CH = (int)$_POST['course2'];
                $Gradepoint_course2 = calculateweightage($percentage, $course2_CH);
            }
            if ($_POST['3_labmarks'] > 0) {
                $num = 1;
                $obtainedmarksCourse3 = assignmentmarks("3_assignmentmarks") + quizmarks("3_quizmarks") + midmarks("3_midmarks") + finalmarks("3_finalmarks", $num) + labmarks("3_labmarks");
                $percentage = ($obtainedmarksCourse3 / 100) * 100;
                $Gradepoint_course1 = calculateweightage($percentage, $course3_CH);
            } else {
                $num = 0;
                $obtainedmarksCourse3 = assignmentmarks("3_assignmentmarks") + quizmarks("3_quizmarks") + midmarks("3_midmarks") + finalmarks("3_finalmarks", $num);
                $percentage = ($obtainedmarksCourse3 / 100) * 100;
                $Gradepoint_course3 = calculateweightage($percentage, $course3_CH);
            }
            if ($_POST['4_labmarks'] > 0) {
                $num = 1;
                $obtainedmarksCourse4 = assignmentmarks("4_assignmentmarks") + quizmarks("4_quizmarks") + midmarks("4_midmarks") + finalmarks("4_finalmarks", $num) + labmarks("4_labmarks");
                $percentage = ($obtainedmarksCourse4 / 100) * 100;
                $Gradepoint_course4 = calculateweightage($percentage, $course4_CH);
            } else {
                $num = 0;
                $obtainedmarksCourse4 = assignmentmarks("4_assignmentmarks") + quizmarks("4_quizmarks") + midmarks("4_midmarks") + finalmarks("4_finalmarks", $num);
                $percentage = ($obtainedmarksCourse4 / 100) * 100;
                $Gradepoint_course4 = calculateweightage($percentage, $course4_CH);
            }
            if ($_POST['5_labmarks'] > 0) {
                $num = 1;
                $obtainedmarksCourse5 = assignmentmarks("5_assignmentmarks") + quizmarks("5_quizmarks") + midmarks("5_midmarks") + finalmarks("5_finalmarks", $num) + labmarks("5_labmarks");
                $percentage = ($obtainedmarksCourse5 / 100) * 100;
                $Gradepoint_course5 = calculateweightage($percentage, $course5_CH);
            } else {
                $num = 0;
                $obtainedmarksCourse5 = assignmentmarks("5_assignmentmarks") + quizmarks("5_quizmarks") + midmarks("5_midmarks") + finalmarks("5_finalmarks", $num);
                $percentage = ($obtainedmarksCourse5 / 100) * 100;
                $Gradepoint_course5 = calculateweightage($percentage, $course5_CH);
            }
            $totalgradePoint = $Gradepoint_course1 + $Gradepoint_course2 + $Gradepoint_course3 + $Gradepoint_course4 + $Gradepoint_course5;
            $totalCr_hour = $course1_CH + $course2_CH + $course3_CH + $course4_CH + $course5_CH;

            $gpa = $totalgradePoint / $totalCr_hour;
        }
    }
    ?>
    <form action="" method="post">
        <div style="text-align: center;">
            <h2>GPA CALCULATOR</h2>
        </div>
        <div style="    width: 1270px;
    margin: 0 auto;">

            <table>
                </tr>
                <tr>
                    <td>
                        <h4>Course Name</h4>
                    </td>
                    <td class="Marksfieldheading">
                        <h4>Obtained Assignment Marks</h4>
                    </td>
                    <td class="Marksfieldheading">
                        <h4>Obtained Quiz Marks</h4>
                    </td>
                    <td class="Marksfieldheading">
                        <h4>Mid Marks</h4>
                    </td>
                    <td class="Marksfieldheading">
                        <h4>Final Marks</h4>
                    </td>
                    <td class="Marksfieldheading">
                        <h4>Credit Hour</h4>
                    </td>
                    <td class="Marksfieldheading">
                        <h4>lab Marks(optional)</h4>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Course 1" name="subject1" class="coursefieldStyling"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="1_assignmentmarks" class="marksfieldStyling"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="1_quizmarks" class="marksfieldStyling2"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="1_midmarks" class="marksfieldStyling3"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="1_finalmarks" class="marksfieldStyling4"></td>
                    <td><input type="number" min="1" max="4" name="course1" class="marksfieldStyling4"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="1_labmarks" value=" " class="marksfieldStyling3"></td>

                </tr>
                <tr>
                    <td> <input type="text" placeholder="Course 2" name="subject2" class="coursefieldStyling"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="2_assignmentmarks" class="marksfieldStyling"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="2_quizmarks" class="marksfieldStyling2"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="2_midmarks" class="marksfieldStyling3"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="2_finalmarks" class="marksfieldStyling4"></td>
                    <td><input type="number" min="1" max="4" name="course2" class="marksfieldStyling4"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="2_labmarks" class="marksfieldStyling3"></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Course 3" name="subject3" class="coursefieldStyling"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="3_assignmentmarks" class="marksfieldStyling"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="3_quizmarks" class="marksfieldStyling2"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="3_midmarks" class="marksfieldStyling3"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="3_finalmarks" class="marksfieldStyling4"></td>
                    <td><input type="number" min="1" max="4" name="course3" class="marksfieldStyling4"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="3_labmarks" class="marksfieldStyling3"></td>
                </tr>
                <tr>
                    <td> <input type="text" placeholder="Course 4" name="subject4" class="coursefieldStyling"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="4_assignmentmarks" class="marksfieldStyling"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="4_quizmarks" class="marksfieldStyling2"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="4_midmarks" class="marksfieldStyling3"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="4_finalmarks" class="marksfieldStyling4"></td>
                    <td><input type="number" min="1" max="4" name="course4" class="marksfieldStyling4"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="4_labmarks" class="marksfieldStyling3"></td>
                </tr>
                <tr>

                    <td><input type="text" placeholder="Course 5" name="subject5" class="coursefieldStyling"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="5_assignmentmarks" class="marksfieldStyling"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="5_quizmarks" class="marksfieldStyling2"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="5_midmarks" class="marksfieldStyling3"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="5_finalmarks" class="marksfieldStyling4"></td>
                    <td><input type="number" min="1" max="4" name="course5" class="marksfieldStyling4"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="5_labmarks" class="marksfieldStyling3"></td>
                </tr>

            </table>
            <?php foreach ($errors as $print) { ?>

                <ul>
                    <li style="width: 215px; margin:0 auto;"> <?php echo $print; ?></li>
                </ul>

            <?php } ?>
        </div>
        <div>

        </div>
        <div class="buttondiv">
            <button class="buttonstyling">Calculate</button>
        </div>
        <?php if (isset($gpa)) { ?>
            <h2 style="width: 150px;padding-top: 50px ;margin:0 auto;">
                Your GPA is <?php echo $gpa ?></h2>
        <?php } ?>
    </form>
</body>

</html>