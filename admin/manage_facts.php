<?php
include("layout/header.php");

$factq = "SELECT * FROM fact ORDER BY id DESC LIMIT 1";
$factdata = mysqli_fetch_array(mysqli_query($conn, $factq));

?>
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Manage facts Content</h6>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bio</label>
                            <input type="text" class="form-control" name="bio" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $factdata['bio'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Happy Clients</label>
                            <input type="text" class="form-control" name="clients" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $factdata['clients'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Projects</label>
                            <input type="text" class="form-control" name="projects" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $factdata['projects'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hours Of Support</label>
                            <input type="text" class="form-control" name="supports" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $factdata['supports'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hard Workers</label>
                            <input type="text" class="form-control" name="workers" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $factdata['workers'] ?? '' ?>">
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
  
    $bio = $_POST['bio'];
    $clients = $_POST['clients'];
    $projects = $_POST['projects'];
    $supports = $_POST['supports'];
    $workers = $_POST['workers'];
    



    $q2 = "SELECT * FROM fact";
    $data_num = mysqli_num_rows(mysqli_query($conn, $q2));

    if ($data_num == 0) {
        $query = "INSERT INTO fact SET bio = '$bio', clients = '$clients', projects='$projects', supports = '$supports', workers = '$workers'";
        $run = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE  fact SET bio = '$bio', clients = '$clients', projects='$projects', supports = '$supports', workers = '$workers' WHERE id = '$factdata[id]' ";
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
                    location.replace("manage_facts.php")
                }
            })
        </script>
<?php
    }
}
?>