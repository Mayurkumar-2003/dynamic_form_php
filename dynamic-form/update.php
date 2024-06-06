<?php
include "connection.php";

    $id = $_GET['edit_id'];
    $select = $obj->query("select * from index_master where id='$id'");
    // $result = $obj->mysqli_fetch_assoc();    
    $result_data = mysqli_fetch_assoc($select);

    $e = $result_data['education'];
    $e1 = explode(",",$e);
    $g = $result_data['gender'];
    $s = $result_data['state'];
    $c = $result_data['city'];
    
    
    if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    // echo "<pre>"; print_r($s); exit();
    $city = $_POST['city'];
    $education = $_POST['checkbox'];
    $edu = implode(",", $education);

    $filename = $_FILES['file']['name'];

    $expload = explode(".",$filename);
    $extension = strtolower(end($expload));
    $tmp = $_FILES['file']['tmp_name'];
    $path = "upload_image/$filename";

    
    if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'pdf')
    {
        move_uploaded_file($tmp,$path);

        $query = $obj->query("update index_master set first_name='$fname', last_name='$lname',gender='$gender',state='$state',city='$city', education='$edu',image='$filename' where id='$id'");
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
    <title>Update Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container-fluid ">
        <form class="mx-auto mt-5 w-50 border border-primary border-3 p-3 " method="post" enctype="multipart/form-data">
            <h3 class="text-center">Update Form</h3>
            <div class="form-group mb-3">
                <label for="username" class="text-dark fw-bold">First Name</label>
                <input type="text" name="fname" class="form-control border-primary border-3 mt-1" value="<?php echo $result_data['first_name']; ?>" placeholder="Enter First Name" id="fname">
            </div>
            <div class="form-group mb-3">
                <label for="username" class="text-dark fw-bold">Last Name</label>
                <input type="text" name="lname" class="form-control border-primary border-3 mt-1" value="<?php echo $result_data['last_name']; ?>" placeholder="Enter Last Name" id="lname">
            </div>
            <div class="custome-control d-flex mb-3">
                <label for="gender" class="fw-bold">Select Gender : </label>
                <div class="ms-5">
                    <input type="radio" name="gender" value="Male"<?php if($g=='Male') echo 'checked'; ?> class="form-radio-input">
                    <label for="male" class="fw-bold ">Male</label>
                </div>
                <div class="ms-5">
                    <input type="radio" name="gender" value="Female"<?php if($g=='Female') echo 'checked'; ?> class="form-radio-input">
                    <label for="male" class="fw-bold">Female</label>
                </div>
                <div class="ms-5">
                    <input type="radio" name="gender" value="Other"<?php if($g=='Other') echo 'checked'; ?> class="form-radio-input">
                    <label for="male" class="fw-bold">Other</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <select name="state" class="form-select border-primary border-3">
                    <option selected class="fw-bold text-black">Select State</option>
                    <option value="Rajashthan"<?php if($s=='Rajashthan') echo "checked"; ?>>Rajashthan</option>
                    <option value="Gujarat" <?php if($s=='Gujarat') echo "selected"; ?>>Gujarat</option>
                    <option value="Maharastra" <?php if($s=='Maharastra') echo "selected"; ?>>Maharastra</option>
                    <option value="Madhyapradesh" <?php if($s=='Madhyapradesh') echo "selected"; ?>>Madhyapradesh</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <select name="city" class="form-select border-primary border-3">
                    <option selected class="fw-bold text-black">Select City</option>
                    <option value="Jaipur"<?php if($c=='Jaipur') echo "selected";?>>Jaipur</option>
                    <option value="Ahmedabad"<?php if($c=='Ahmedabad') echo "selected";?>>Ahmedabad</option>
                    <option value="Mumbai"<?php if($c=='Mumbai') echo "selected";?>>Mumbai</option>
                    <option value="Indor"<?php if($c=='Indor') echo "selected";?>>Indor</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="file_upload" class="fw-bold mb-2">Upload File</label>
                <input type="file" class="form-control border-primary border-3" id="upload_file" name="file">
            </div>
            <div class="custome-control d-flex">
                <label for="education" class="fw-bold mt-3">Select Education : </label>
                <div class="mt-3 ms-4">
                    <input type="checkbox" class="form-check-input border-primary border-2" name="checkbox[]" id="Bcom" value="Bcom"<?php if(in_array("Bcom",$e1)) echo "checked"; ?>>
                    <label for="select-bcom" class="fw-bold">Bcom</label>
                </div>
                <div class="mt-3 ms-4">
                    <input type="checkbox" class="form-check-input border-primary border-2" name="checkbox[]" id="Mcom" value="Mcom"<?php if(in_array("Mcom",$e1)) echo "checked"; ?>>
                    <label for="select-bcom" class="fw-bold">Mcom</label>
                </div>
                <div class="mt-3 ms-4">
                    <input type="checkbox" class="form-check-input border-primary border-2" name="checkbox[]" id="Bca" value="Bca"<?php if(in_array("Bca",$e1)) echo "checked"; ?>>
                    <label for="select-bcom" class="fw-bold">Bca</label>
                </div>
                <div class="mt-3 ms-4">
                    <input type="checkbox" class="form-check-input border-primary border-2" name="checkbox[]" id="Mca" value="Mca"<?php if(in_array("Mca",$e1)) echo "checked"; ?>>
                    <label for="select-bcom" class="fw-bold">Mca</label>
                </div>
            </div>
            <button class="btn btn-primary d-grid col-2 gap-2 mx-auto mt-3" type="submit" name="update">Update</button>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>