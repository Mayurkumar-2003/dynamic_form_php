<?php
include "connection.php";



if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $filename = $_FILES['file']['name'];

    $expload = explode(".",$filename);
    $extension = strtolower(end($expload));
    $tmp = $_FILES['file']['tmp_name'];
    $path = "upload_image/$filename";

    $education = $_POST['checkbox'];
    $edu = implode(",", $education);
    
    // echo "<pre>"; print_r($query); exit();
    if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'pdf')
    {
        move_uploaded_file($tmp,$path);

        $query = $obj->query("insert into index_master(first_name,last_name,gender,state,city,education,image) value ('$fname','$lname','$gender','$state' ,'$city','$edu','$filename')");
        if ($query) {
            echo "<script>alert('Success')</script>";
            header("location:table_data.php");
        } else {
            echo "<script>alert('Denied')</script>";
        }
    }
    
} 
?>




<!doctype html>
<html lang="en">

<head>
    <title>Dynamic Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container-fluid">
        <form class="mx-auto mt-5 w-50 border border-primary border-3 p-3" method="post" enctype="multipart/form-data">
            <h3 class="text-center">Dynamic Form</h3>
            <div class="form-group mb-3">
                <label for="username" class="text-dark fw-bold">First Name</label>
                <input type="text" name="fname" class="form-control border-primary border-3 mt-1" placeholder="Enter First name">
            </div>
            <div class="form-group mb-3">
                <label for="username" class="text-dark fw-bold">Last Name</label>
                <input type="text" name="lname" class="form-control border-primary border-3 mt-1" placeholder="Enter Last Name">
            </div>
            <div class="custome-control d-flex mb-3">
                <label for="gender" class="fw-bold">Select Gender : </label>
                <div class="ms-5">
                    <input type="radio" name="gender" value="Male" class="form-radio-input">
                    <label for="male" class="fw-bold ">Male</label>
                </div>
                <div class="ms-5">
                    <input type="radio" name="gender" value="Female" class="form-radio-input">
                    <label for="male" class="fw-bold">Female</label>
                </div>
                <div class="ms-5">
                    <input type="radio" name="gender" value="Other" class="form-radio-input">
                    <label for="male" class="fw-bold">Other</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <select name="state" class="form-select border-primary border-3">
                    <option selected class="fw-bold text-black">Select State</option>
                    <option value="Rajshthan">Rajshthan</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Maharastra">Maharastra</option>
                    <option value="Madhyapradesh">Madhyapradesh</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <select name="city" class="form-select border-primary border-3">
                    <option selected class="fw-bold text-black">Select City</option>
                    <option value="Jaipur">Jaipur</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Indor">Indor</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="file_upload" class="fw-bold mb-2">Upload File</label>
                <input type="file" class="form-control border-primary border-3" id="upload_file" name="file">
            </div>
            <div class="custome-control d-flex">
                <label for="education" class="fw-bold mt-3">Select Education : </label>
                <div class="mt-3 ms-5">
                    <input type="checkbox" class="form-check-input border-primary border-2" name="checkbox[]" id="Bcom" value="Bcom">
                    <label for="select-bcom" class="fw-bold">Bcom</label>
                </div>
                <div class="mt-3 ms-5">
                    <input type="checkbox" class="form-check-input border-primary border-2" name="checkbox[]" id="Mcom" value="Mcom">
                    <label for="select-bcom" class="fw-bold">Mcom</label>
                </div>
                <div class="mt-3 ms-5">
                    <input type="checkbox" class="form-check-input border-primary border-2" name="checkbox[]" id="Bca" value="Bca">
                    <label for="select-bcom" class="fw-bold">Bca</label>
                </div>
                <div class="mt-3 ms-5">
                    <input type="checkbox" class="form-check-input border-primary border-2" name="checkbox[]" id="Mca" value="Mca">
                    <label for="select-bcom" class="fw-bold">Mca</label>
                </div>
            </div>
            
            <button class="btn btn-primary d-grid col-2 gap-2 mx-auto mt-3" type="submit" name="submit">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>