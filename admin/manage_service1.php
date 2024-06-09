<?php
include("layout/header.php");

if (isset($_GET['edit'])) {
    $edit = true;
    $serviceq = "SELECT * FROM servicefirst WHERE  id = '$_GET[edit]'";
    $servicerun = mysqli_query($conn, $serviceq);
    $servisefirstdata = mysqli_fetch_array($servicerun);
} else {
    $edit = false;
}


?>
<div class="container-fluid" id="container-wrapper">

    <div class="row">
        <div class="col-lg-4">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Update Services</h6>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $servisefirstdata['title'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $servisefirstdata['description'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="documents">Documents required</label>
                            <input type="text" class="form-control" name="documents" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $servisefirstdata['docs'] ?? '' ?>" required>
                        </div>
                        <button style="margin-right: auto;" type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">

            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Services</h6>
                </div>
                <div style="overflow-x: scroll;">
                    <table class="table" id="mytable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Documents</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = 1;
                            $servicerun = mysqli_query($conn, "SELECT * FROM servicefirst ");
                            while ($data = mysqli_fetch_array($servicerun)) {
                            ?>
                                <tr valign="middle">
                                    <td><?= $serial++ ?></td>
                                    <td><?= $data['title'] ?></td>
                                    <td><?= $data['description'] ?></td>
                                    <td><?= $data['docs'] ?></td>
                                    <td>
                                        <a href="?edit=<?= $data['id'] ?>" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    new DataTable('#mytable');
</script>

<?php

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $documents = $_POST['documents'];
    $icon = $_POST['icon'];
    
    $updaterun = mysqli_query($conn, "UPDATE servicefirst SET title = '$title' , description = '$description' , docs = '$documents', icon = '$icon' WHERE id = '$servisefirstdata[id]'");

    if ($updaterun) {
?>
        <script>
            Swal.fire(
                'Success',
                'Category Updated Succesfully',
                'Success'
            ).then((result) => {
                if (result.isConfirmed) {
                    location.replace("manage_service1.php");
                }
            })
        </script>


    <?php
    }

    ?>
<?php

}

?>

<?php
include("layout/footer.php");
?>