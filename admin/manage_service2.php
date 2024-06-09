<?php
include("layout/header.php");

// $serviseseconddata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM servicesecond ORDER BY id DESC LIMIT 1"));

if (isset($_GET['edit'])) {
    $edit = true;
    $serviceq = "SELECT * FROM servicesecond WHERE  id = '$_GET[edit]'";
    $servicerun = mysqli_query($conn, $serviceq);
    $serviseseconddata = mysqli_fetch_array($servicerun);
} else {
    $edit = false;
}

?>
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add and Manage Services</h6>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $serviseseconddata['title'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $serviseseconddata['description'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="documents">Documents required</label>
                            <input type="text" class="form-control" name="documents" aria-describedby="emailHelp" placeholder="Enter your input" value="<?= $serviseseconddata['docs'] ?? '' ?>" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="<?= $edit ? "update" : "submit" ?>" class="btn btn-primary w-50 form-control border border-0"><?= $edit ? "Update Service" : "Add Service" ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Service are here</h6>
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
                            $servicerun = mysqli_query($conn, "SELECT * FROM servicesecond ");
                            while ($data = mysqli_fetch_array($servicerun)) {
                            ?>
                                <tr valign="middle">
                                    <td><?= $serial++ ?></td>
                                    <td><?= $data['title'] ?></td>
                                    <td><?= $data['description'] ?></td>
                                    <td><?= $data['docs'] ?? '' ?></td>
                                    <td nowrap>
                                        <a href="?edit=<?= $data['id'] ?>" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteservice(<?= $data['id'] ?>)">delete</button>
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
    async function deleteservice(id) {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {

                const request = await fetch('delete/deleteservice.php', {
                    method: "POST",
                    header: {
                        "Content-type": "application/json"
                    },
                    body: JSON.stringify({
                        id
                    })
                });

                Swal.fire(
                    'Deleted!',
                    'Your service has been deleted.',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        location.replace("manage_service2.php");
                    }
                })
            }
        })
    }
</script>
<?php

$serviceseconddata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM servicesecond ORDER BY id DESC LIMIT 1"));

if (isset($_POST['submit'])) {
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $documents = $_POST['documents'];

    $query = "INSERT INTO servicesecond SET
        icon = '$icon', title = '$title', docs = '$documents', description = '$description'";

    $run = mysqli_query($conn, $query);

    if ($run) {
?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Service added successfully',
                icon: 'success',
                confirmButtonText: 'Okay'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.replace("manage_service2.php");
                }
            });
        </script>
    <?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
//  submit close 

// for update services 

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $documents = $_POST['documents'];
    $icon = $_POST['icon'];


    $updateq = "UPDATE servicesecond SET title = '$title' , description = '$description' , docs = '$documents', icon = '$icon' WHERE id = '$serviseseconddata[id]'";
    $updaterun = mysqli_query($conn, $updateq);

    if ($updaterun) {
    ?>
        <script>
            Swal.fire(
                'Success',
                'Service Updated Succesfully',
                'Success'
            ).then((result) => {
                if (result.isConfirmed) {
                    location.replace("manage_service2.php");
                }
            })
        </script>

    <?php
    }

    ?>
<?php

}


include("layout/footer.php");
?>