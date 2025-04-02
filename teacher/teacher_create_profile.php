<?php
ob_start();
    echo "<script>alert('Verification completed.')</script>";
    $data = file_get_contents("C:/xampp/htdocs/vidya/admin/sub.txt");
    $data_arr = explode(",", $data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/te_creat.css"> -->
    <title>Create Profile</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 180vh;
        }

        /* Container for the form */
        .cont {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Form box styling */
        .f_box {
            padding: 20px;
        }

        /* Form heading */
        .f_box h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Labels */
        .f_box label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        /* Input fields */
        .f_box input[type="text"],
        .f_box input[type="number"],
        .f_box input[type="file"],
        .f_box input[type="time"],
        .f_box textarea,
        .f_box select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Textarea styling */
        .f_box textarea {
            resize: none;
        }

        /* Checkbox styling */
        .f_box .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .f_box .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }

        /* Submit button */
        .f_box input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .f_box input[type="submit"]:hover {
            background-color: #218838;
        }

        /* Error messages */
        .f_box .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Success messages */
        .f_box .success {
            color: green;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .cont {
                width: 90%;
            }

            .f_box input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>  
    <div class="cont">
        <div class="f_box">
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Create Your Profile</h1>
                <label for="">Select Subjects</label>
                <div class="checkbox-group">
                    <?php
                        $i = 0;
                        while ($i < count($data_arr)) {
                            if ($i % 2 == 0) {
                                echo "<label><input type='checkbox' name='sub[]' value='" . $data_arr[$i] . "'> " . $data_arr[$i] . "</label>";
                            }
                            $i++;
                        }
                    ?>
                </div>

                <label for="">Enter Price (Subject-wise)</label>
                <input type="text" name="price" placeholder="e.g., 22,55 for sub1=>22, sub2=>55">

                <label for="">Bio</label>
                <textarea name="BIO" cols="60" rows="5" placeholder="Write a short bio about yourself"></textarea>

                <label for="">Message for Admin</label>
                <textarea name="message" cols="60" rows="5" placeholder="Write a message for the admin"></textarea>

                <label for="">Select Your Gender</label>
                <select name="tc_gender">
                    <option value="">--- Select ---</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="pns">Prefer Not to Say</option>
                </select>

                <label for="">Enter Your Age</label>
                <input type="number" name="tc_age" placeholder="Enter your age">

                <label for="">Enter Your Location (PIN Code)</label>
                <input type="number" name="tc_location" placeholder="Enter your location PIN code">

                <label for="">Select a Time Slot</label>
                <div>
                    <label>From:</label>
                    <input type="time" name="s_time">
                    <label>To:</label>
                    <input type="time" name="e_time">
                </div>

                <label for="">Attach a Document for Verification</label>
                <input type="file" name="documents">

                <input type="submit" name="create" value="Create Profile">
            </form>
        </div>
    </div>
</body>
</html>

<?php
if(array_key_exists("create",$_POST)) {
    header("location:T_Login.php");
}

ob_end_flush();
?>