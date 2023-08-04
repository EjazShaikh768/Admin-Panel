<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LANDROOF Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


    <div class="container">
        <div class="row my-5 justify-content-center ">
            <div class="col-sm-12 col-md-6 Signincard">
                <h1>CATEGORY UPDATE</h1>
                <div class="bottomLine"></div>
                <?php
                include 'conn.php';
                $cat_id = $_GET['cat_Eid'];
                $sql = "SELECT * FROM  category WHERE cat_id = '{$cat_id}'";
                $result = mysqli_query($conn, $sql) or die("Query Failed");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <form action="Form-Manage.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">CATEGORY </label>
                                <input type="text" class="form-control" value="<?php echo $row['category_name']; ?>"
                                    name="category_name" required>
                                <input type="hidden" class="form-control" value="<?php echo $row['cat_id']; ?>"
                                    name="category_id">
                            </div>
                            
                            <img src="upload/<?php echo $row['category_image']; ?>" alt="" width="100%" height="200px" srcset="">
                            <div class="form-group">
                                <label for="password">IMAGE </label>
                                <input type="file" class="form-control" value="<?php echo $row['category_image']; ?>"
                                    name="fileToUpload" required>
                            </div>
                            <div class="form-group text-center py-4">
                                <button class="btn px-5" name="category_update">UPDATE</button>
                            </div>
                        </form>

                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>