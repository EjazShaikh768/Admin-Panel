<?php
include 'conn.php';

if (isset($_POST['category_add'])) {

    if (isset($_FILES['fileToUpload'])) {
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = (explode('.', $file_name));



        $new_name = time() . "_" . basename($file_name);
        $target = "upload/" . $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }


    $category = $_POST['category_name'];
    $sql = "INSERT INTO category (category_image,category_name) VALUES ('{$new_name}','{$category}') ";

    $result = mysqli_query($conn, $sql) or die("Query Failed");

    header("location:Category.php");
}


// category update code 


if (isset($_POST['category_update'])) {

    if (isset($_FILES['filetoUpload'])) {
        $errors = array();

        $file_name = $_FILES['filetoUpload']['name'];
        $file_size = $_FILES['filetoUpload']['size'];
        $file_tmp = $_FILES['filetoUpload']['tmp_name'];
        $file_type = $_FILES['filetoUpload']['type'];
        $file_ext = (explode('.', $file_name));



        $new_name = time() . "_" . basename($file_name);
        $target = "upload/" . $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }


    $category = $_POST['category_name'];
    $category_id = $_POST['category_id'];
    $sql = "UPDATE `category` SET `category_image`='{$new_name}',`category_name`='{$category}' WHERE cat_id =  '{$category_id}' ";


    $result = mysqli_query($conn, $sql) or die("Query Failed");

    header("location:Category.php");
}


// blog add code 


if (isset($_POST['blog_add'])) {

    if (isset($_FILES['fileToUpload'])) {
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = (explode('.', $file_name));



        $new_name = time() . "_" . basename($file_name);
        $target = "upload/" . $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $category = $_POST['category'];
    $title = $_POST['title'];
    $author = $_SESSION['auth_id'];
    $date = $_POST['date'];
    $descriptionOne = $_POST['descriptionone'];
    $descriptionTwo = $_POST['descriptiontwo'];
    $sql = "INSERT INTO blogs ( `category`,`blog_image`, `title`, `author`, `date`, `descriptionone`, `descriptiontwo`)
            VALUES ('{$category}','{$new_name}','{$title}','{$author}','{$date}','{$descriptionOne}','{$descriptionTwo}') ";

    $result = mysqli_query($conn, $sql) or die("Query Failed");

    header("location:dashboard.php");
}





// blog update code 


if (isset($_POST['blog_update'])) {

    if (isset($_FILES['fileToUpload'])) {
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = (explode('.', $file_name));



        $new_name = time() . "_" . basename($file_name);
        $target = "upload/" . $new_name;

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $target);
        } else {
            print_r($errors);
            die();
        }
    }

    $category = $_POST['category'];
    $title = $_POST['title'];
    $descriptionOne = $_POST['descriptionone'];
    $descriptionTwo = $_POST['descriptiontwo'];

    $sql = " UPDATE `blogs` SET  `category`='{$category}',`blog_image`='{$new_name}',`title`='{$title}',
    `descriptionone`='{$descriptionOne}',`descriptiontwo`='{$descriptionTwo}' ";

    $result = mysqli_query($conn, $sql) or die("Query Failed");

    header("location:dashboard.php");
}


?>