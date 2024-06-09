<?php
include("layout/header.php");

$skillsq = "SELECT * FROM skills ORDER BY id DESC LIMIT 1";
$skillsdata = mysqli_fetch_array(mysqli_query($conn, $skillsq));
?>
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Skills Content</h6>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bio</label>
                            <input type="text" class="form-control" name="bio" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $skillsdata['bio'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">html</label>
                            <input type="number" class="form-control" name="html" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $skillsdata['html'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">css</label>
                            <input type="number" class="form-control" name="css" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $skillsdata['css'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">javascript</label>
                            <input type="number" class="form-control" name="javascript" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $skillsdata['javascript'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">react</label>
                            <input type="number" class="form-control" name="react" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $skillsdata['react'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">php</label>
                            <input type="number" class="form-control" name="php" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $skillsdata['php'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">python</label>
                            <input type="number" class="form-control" name="python" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $skillsdata['python'] ?? '' ?>">
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
    $html = $_POST['html'];
    $css = $_POST['css'];
    $javascript = $_POST['javascript'];
    $react = $_POST['react'];
    $php = $_POST['php'];
    $python = $_POST['python'];
   


    $q2 = "SELECT * FROM skills";
    $data_num = mysqli_num_rows(mysqli_query($conn, $q2));

    if ($data_num == 0) {
        $query = "INSERT INTO skills SET
        bio = '$bio',
        html = '$html',
        css = '$css',
        javascript = '$javascript',
        react = '$react',
        php = '$php',
        python = '$python'";
        $run = mysqli_query($conn, $query);
    } else {
        $query = "UPDATE skills SET
        bio = '$bio',
        html = '$html',
        css = '$css',
        javascript = '$javascript',
        react = '$react',
        php = '$php',
        python = '$python'
        WHERE id = '$skillsdata[id]'";
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
                    location.replace("manage_skills.php")
                }
            })
        </script>
<?php
    }
}
?>