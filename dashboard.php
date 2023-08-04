<?php include 'header.php';
include 'conn.php';
?>
<div class="container-fluid">
    <div class="row justify-content-around">
        <div class="col-sm-12 p-5">
            <div class="text-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-plus"></i></button>
            </div>
            <table class="table table-hover shadow">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">AUTHOR</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">EDIT</th>
                        <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1 = "SELECT * FROM  blogs JOIN category ON blogs.category = category.cat_id JOIN auth ON blogs.author = auth.auth_id ";
                    $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
                    if (mysqli_num_rows($result1) > 0) {
                        $no = 1;
                        while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $row1['category_name']; ?></td>
                                <td><?php echo $row1['full_name']; ?></td>
                                <td><img src="upload/<?php echo $row1['blog_image']; ?>" width="200px" alt="" srcset=""></td>
                                <td><?php echo $row1['title']; ?></td>
                                <td class="description"><?php echo substr($row1['descriptionone'],0,200)."...";        ?></td>
                                <td><?php echo substr($row1['descriptiontwo'],0,200)."...";          ?></td>
                                <td><a href="Blog_Edit.php?blog_Eid=<?php echo $row1['blog_id']; ?>"><i
                                            class="fa-solid fa-2x fa-pen-to-square"></i></a></td>
                                <td><a href="Blog_delete.php?blog_Did=<?php echo $row1['blog_id']; ?>"><i
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
                        <label for="">CATEGORY</label>
                        <select name="category" id="" class="form-control" required>
                            <?php
                            $sql = "SELECT * FROM  category ";
                            $result = mysqli_query($conn, $sql) or die("Query Failed");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['category_name']; ?> <i
                                            class="fa-solid fa-angle-down"></i></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">TITLE</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="">IMAGE</label>
                        <input type="file" class="form-control" name="fileToUpload" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="">DATE</label>
                        <input type="date" class="form-control" name="date" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="">DESCRIPTION</label>
                        <textarea name="descriptionone" id="" class="form-control" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">DESCRIPTION</label>
                        <textarea name="descriptiontwo" id="" class="form-control" rows="10" required></textarea>
                    </div>
                    <div class="text-center">
                        <button name="blog_add" type="submit" class="btn btn-submit">SUBMIT</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




<?php include 'footer.php'; ?>