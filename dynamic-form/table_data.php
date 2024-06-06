<?php

include "connection.php";

$query = $obj->query("select * from index_master");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Fetch Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <h3 class="fw-bold text-center p-3 bg-primary text-light ">Your Data</h3>
        <table class="mx-auto w-100 text-center mb-3">
            <tr class="bg-dark text-light">
                <th class="border-3 p-4">ID</th>
                <th class="border-3 p-4">First Name</th>
                <th class="border-3 p-4">Last Name</th>
                <th class="border-3 p-4">Gender</th>
                <th class="border-3 p-4">State</th>
                <th class="border-3 p-4">City</th>
                <th class="border-3 p-4">Education</th>
                <th class="border-3 p-4">Image</th>
                <th class="border-3 p-4">Update</th>
                <th class="border-3 p-4">Delete</th>
            </tr>
            <?php
            while ($result_data = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td class="border-3 p-3 fw-bolder"><?php echo $result_data['id']; ?></td>
                    <td class="border-3 p-3 fw-bolder"><?php echo $result_data['first_name']; ?></td>
                    <td class="border-3 p-3 fw-bolder"><?php echo $result_data['last_name']; ?></td>
                    <td class="border-3 p-3 fw-bolder"><?php echo $result_data['gender']; ?></td>
                    <td class="border-3 p-3 fw-bolder"><?php echo $result_data['state']; ?></td>
                    <td class="border-3 p-3 fw-bolder"><?php echo $result_data['city']; ?></td>
                    <td class="border-3 p-3 fw-bolder"><?php echo $result_data['education']; ?></td>
                    <td class="border-3 p-3 fw-bolder"><img src="upload_image/<?php echo $result_data['image']; ?>" height="80" width="80"></td>
                    <td class="border-3 p-3 fw-bolder"><a href="update.php?edit_id=<?php echo $result_data['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="border-3 p-3 fw-bolder"><a href="delete.php?del_id=<?php echo $result_data['id']; ?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" ></script>
</body>

</html>