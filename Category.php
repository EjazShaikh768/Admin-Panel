<?php include 'header.php'; ?>


<div class="container-fluid">
    <div class="row justify-content-around">
        <div class="col-sm-12 p-5">
            <div class="text-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i></button>
            </div>
            <table class="table table-hover shadow px-5">
                <thead>
                    <tr>
                        <th scope="col">Sr.NO</th>
                        <th scope="col">CATEGORY IMAGE</th>
                        <th scope="col">CATEGORY NAME</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'conn.php';
                    $sql = "SELECT * FROM  category ";
                    $result = mysqli_query($conn, $sql) or die("Query Failed");
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><img src="upload/<?php echo $row['category_image']; ?>" class="img-fluid" width="200px"
                                        alt="" srcset=""></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><a href="category_Edit.php?cat_Eid=<?php echo $row['cat_id']; ?>"><i
                                            class="fa-solid fa-2x fa-pen-to-square"></i></a></td>
                                <td><a href="category_Delete.php?cat_Did=<?php echo $row['cat_id']; ?>"><i
                                            class="fa-sharp fa-2x fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php }
                    } ?>

                </tbody>
            </table>
        </div>
        <div class="col-sm-12 ">
            <?php include 'sidebaar.php'; ?>
        </div>
    </div>
</div>


<!-- blog add modal box -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Form-Manage.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">TITLE</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="">IMAGE</label>
                        <input type="file" class="form-control" name="fileToUpload" required>
                    </div>
                    <div class="text-center">
                        <button name="category_add" type="submit" class="btn btn-submit">SUBMIT</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




<?php include 'footer.php'; ?>