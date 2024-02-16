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
    $name = $_SESSION['name'];
    $regno = $_SESSION['regno'];
    $conn = new mysqli("localhost", "root", "", "gpa_calculator");
    $errors = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $subject1 = $_POST['subject1'];
        $assignment1 = $_POST['1_assignmentmarks'];
        $quiz1 = $_POST['1_quizmarks'];
        $mid1 = $_POST['1_midmarks'];
        $final1 = $_POST['1_finalmarks'];
        $course1 = $_POST['course1'];
        $lab1 = $_POST['1_labmarks'];

        $subject2 = $_POST['subject2'];
        $assignment2 = $_POST['2_assignmentmarks'];
        $quiz2 = $_POST['2_quizmarks'];
        $mid2 = $_POST['2_midmarks'];
        $final2 = $_POST['2_finalmarks'];
        $course2 = $_POST['course2'];
        $lab2 = $_POST['2_labmarks'];

        $subject3 = $_POST['subject3'];
        $assignment3 = $_POST['3_assignmentmarks'];
        $quiz3 = $_POST['3_quizmarks'];
        $mid3 = $_POST['3_midmarks'];
        $final3 = $_POST['3_finalmarks'];
        $course3 = $_POST['course3'];
        $lab3 = $_POST['3_labmarks'];

        $subject4 = $_POST['subject4'];
        $assignment4 = $_POST['4_assignmentmarks'];
        $quiz4 = $_POST['4_quizmarks'];
        $mid4 = $_POST['4_midmarks'];
        $final4 = $_POST['4_finalmarks'];
        $course4 = $_POST['course4'];
        $lab4 = $_POST['4_labmarks'];

        $subject5 = $_POST['subject5'];
        $assignment5 = $_POST['5_assignmentmarks'];
        $quiz5 = $_POST['5_quizmarks'];
        $mid5 = $_POST['5_midmarks'];
        $final5 = $_POST['5_finalmarks'];
        $course5 = $_POST['course5'];
        $lab5 = $_POST['5_labmarks'];

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
            $read_data = "SELECT * FROM student_detail WHERE student_name='$name' AND student_regno='$regno'";
            $result = $conn->query($read_data);
            if ($result->num_rows == 1) {
                echo "Fdsfs";
                $update_data = "UPDATE  student_detail SET student_gpa='$gpa'WHERE student_name='$name' AND student_regno='$regno'";
                echo "sdfg";
                $conn = new mysqli("localhost", "root", "", "gpa_calculator");
                if ($conn->query($update_data) === TRUE) {
                    echo "Record updated successfully";
                }
                $conn->close();
                session_unset();
                session_destroy();
            } else {
                $conn = new mysqli("localhost", "root", "", "gpa_calculator");
                $data = "INSERT into student_detail (student_name,student_regno,student_gpa) VALUES('$name','$regno','$gpa')";
                $conn->close();
                session_unset();
                session_destroy();
            }
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
                    <td><input type="text" placeholder="Course 1" name="subject1" class="coursefieldStyling" value="<?php if (isset($subject1)) {
                                                                                                                        echo $subject1;
                                                                                                                    } ?>"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="1_assignmentmarks" class="marksfieldStyling" value="<?php if (isset($assignment1)) {
                                                                                                                                                    echo $assignment1;
                                                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="1_quizmarks" class="marksfieldStyling2" value="<?php if (isset($quiz1)) {
                                                                                                                                                echo $quiz1;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="1_midmarks" class="marksfieldStyling3" value="<?php if (isset($mid1)) {
                                                                                                                                                echo $mid1;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="1_finalmarks" class="marksfieldStyling4" value="<?php if (isset($final1)) {
                                                                                                                                                echo $final1;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="1" max="4" name="course1" class="marksfieldStyling4" value="<?php if (isset($course1)) {
                                                                                                                    echo $course1;
                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="1_labmarks" class="marksfieldStyling3" value="<?php if (isset($lab1)) {
                                                                                                                                                echo $lab1;
                                                                                                                                            } ?>"></td>
                </tr>
                <tr>
                    <td> <input type="text" placeholder="Course 2" name="subject2" class="coursefieldStyling" value="<?php if (isset($subject2)) {
                                                                                                                            echo $subject2;
                                                                                                                        } ?>"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="2_assignmentmarks" class="marksfieldStyling" value="<?php if (isset($assignment2)) {
                                                                                                                                                    echo $assignment2;
                                                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="2_quizmarks" class="marksfieldStyling2" value="<?php if (isset($quiz2)) {
                                                                                                                                                echo $quiz2;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="2_midmarks" class="marksfieldStyling3" value="<?php if (isset($mid2)) {
                                                                                                                                                echo $mid2;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="2_finalmarks" class="marksfieldStyling4" value="<?php if (isset($final2)) {
                                                                                                                                                echo $final2;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="1" max="4" name="course2" class="marksfieldStyling4" value="<?php if (isset($course2)) {
                                                                                                                    echo $course2;
                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="2_labmarks" class="marksfieldStyling3" value="<?php if (isset($lab2)) {
                                                                                                                                                echo $lab2;
                                                                                                                                            } ?>"></td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Course 3" name="subject3" class="coursefieldStyling" value="<?php if (isset($subject3)) {
                                                                                                                        echo $subject3;
                                                                                                                    } ?>"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="3_assignmentmarks" class="marksfieldStyling" value="<?php if (isset($assignment3)) {
                                                                                                                                                    echo $assignment3;
                                                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="3_quizmarks" class="marksfieldStyling2" value="<?php if (isset($quiz3)) {
                                                                                                                                                echo $quiz3;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="3_midmarks" class="marksfieldStyling3" value="<?php if (isset($mid3)) {
                                                                                                                                                echo $mid3;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="3_finalmarks" class="marksfieldStyling4" value="<?php if (isset($final3)) {
                                                                                                                                                echo $final3;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="1" max="4" name="course3" class="marksfieldStyling4" value="<?php if (isset($course3)) {
                                                                                                                    echo $course3;
                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="3_labmarks" class="marksfieldStyling3" value="<?php if (isset($lab3)) {
                                                                                                                                                echo $lab3;
                                                                                                                                            } ?>"></td>
                </tr>
                <tr>
                    <td> <input type="text" placeholder="Course 4" name="subject4" class="coursefieldStyling" value="<?php if (isset($subject4)) {
                                                                                                                            echo $subject4;
                                                                                                                        } ?>"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="4_assignmentmarks" class="marksfieldStyling" value="<?php if (isset($assignment4)) {
                                                                                                                                                    echo $assignment4;
                                                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="4_quizmarks" class="marksfieldStyling2" value="<?php if (isset($quiz4)) {
                                                                                                                                                echo $quiz4;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="4_midmarks" class="marksfieldStyling3" value="<?php if (isset($mid4)) {
                                                                                                                                                echo $mid4;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="4_finalmarks" class="marksfieldStyling4" value="<?php if (isset($final4)) {
                                                                                                                                                echo $final4;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="1" max="4" name="course4" class="marksfieldStyling4" value="<?php if (isset($course4)) {
                                                                                                                    echo $course3;
                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="4_labmarks" class="marksfieldStyling3" value="<?php if (isset($lab4)) {
                                                                                                                                                echo $lab4;
                                                                                                                                            } ?>"></td>
                </tr>
                <tr>

                    <td><input type="text" placeholder="Course 5" name="subject5" class="coursefieldStyling" value="<?php if (isset($subject5)) {
                                                                                                                        echo $subject5;
                                                                                                                    } ?>"></td>
                    <td><input type="number" min="0" max="10" placeholder="total 10" name="5_assignmentmarks" class="marksfieldStyling" value="<?php if (isset($assignment5)) {
                                                                                                                                                    echo $assignment5;
                                                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="15" placeholder="total 15" name="5_quizmarks" class="marksfieldStyling2" value="<?php if (isset($quiz5)) {
                                                                                                                                                echo $quiz5;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="5_midmarks" class="marksfieldStyling3" value="<?php if (isset($mid5)) {
                                                                                                                                                echo $mid5;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="0" max="50" placeholder="total 50" name="5_finalmarks" class="marksfieldStyling4" value="<?php if (isset($final5)) {
                                                                                                                                                echo $final5;
                                                                                                                                            } ?>"></td>
                    <td><input type="number" min="1" max="4" name="course5" class="marksfieldStyling4" value="<?php if (isset($course5)) {
                                                                                                                    echo $course5;
                                                                                                                } ?>"></td>
                    <td><input type="number" min="0" max="25" placeholder="total 25" name="5_labmarks" class="marksfieldStyling3" value="<?php if (isset($lab5)) {
                                                                                                                                                echo $lab5;
                                                                                                                                            } ?>"></td>
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
            <h2 style="width: 130px;padding-top: 50px ;margin:0 auto;">
                Your GPA is <?php echo $gpa ?></h2>
        <?php } ?>
    </form>
</body>

</html>