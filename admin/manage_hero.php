<?php
include("layout/header.php");

$q = "SELECT * FROM hero ORDER BY id DESC LIMIT 1";
$data = mysqli_fetch_array(mysqli_query($conn, $q));

?>
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Hero Content</h6>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Title</label>
                            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $data['title'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" id="designation" class="form-control" cols="30" rows="4"><?= $data['description'] ?? '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("layout/footer.php");


if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if ($_FILES["image"]['tmp_name']) {
        $image = $_FILES['image'];
        $filename = $image['name'];
        $fileerror = $image['error'];
        $filetmp = $image['tmp_name'];
        $fileext = explode('.', $filename);
        $filecheck = strtolower(end($fileext));
        $fileextstored = array('png', 'jpg', 'jpeg');

        if (in_array($filecheck, $fileextstored)) {
            $destination = 'images/' . $filename;
            move_uploaded_file($filetmp, $destination);
        }
    } else {
        $destination = $data['image'];
    }


    $q2 = "SELECT * FROM hero ";
    $data_num = mysqli_num_rows(mysqli_query($conn, $q2));

    if ($data_num == 0) {
        $query = "INSERT INTO hero SET
        title = '$title',
        description ='$description',
        image = '$destination'";
        $run = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE hero SET title = '$title', description ='$description', image = '$destination' WHERE id = '$data[id]' ";
        $run = mysqli_query($conn, $query);
    }

    if ($run) {
?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Data Updated Successfully',
                icon: 'success',
                confirmButtonText: 'Okay'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.replace("manage_hero.php")
                }
            })
        </script>
<?php
    }
}
?>