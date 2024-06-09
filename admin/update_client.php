<?php
include("layout/header.php");

// $serviseseconddata = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM clients ORDER BY id DESC LIMIT 1"));

if (isset($_GET['edit'])) {
    $edit = true;
    $client = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM clients WHERE  id = '$_GET[edit]'"));
} else {
    $edit = false;
}

?>
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header pb-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Clients</h6>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter client name" value="<?= $client['name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pan">PAN</label>
                                    <input type="text" style="text-transform:uppercase" class="form-control" name="pan" aria-describedby="emailHelp" placeholder="Enter PAN number" value="<?= $client['pan'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter phone number" value="<?= $client['phone'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password (Optional)</label>
                                    <input type="text" class="form-control" name="password" aria-describedby="emailHelp" placeholder="Enter the password" value="<?= $client['password'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="reference">Reference (Optional)</label>
                                    <textarea class="form-control" name="reference" placeholder="If any remarks" id="" cols="30" rows="5" value="<?= $client['reference'] ?>"></textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary w-50 form-control border border-0">Update Client</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $pan = $_POST['pan'];
    $phone = $_POST['phone'];
    $password = $_POST['password'] ?? '';
    $reference = $_POST['reference'] ?? '';

    // Assuming you have an 'id' column in your 'clients' table
    $clientId = $_GET['edit'] ?? 0; // Assuming 'client_id' is the name of the input field containing the client ID

    $already_client = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM clients WHERE (pan = '$pan' OR phone = '$phone') AND id <> $clientId"));

    if ($already_client == 0) {
        $update_client = mysqli_query($conn, "UPDATE clients SET name = '$name', pan = '$pan', phone = '$phone', password = '$password', reference = '$reference' WHERE id = $clientId");

        if ($update_client) {
?>
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Client updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace("clients_details.php");
                    }
                });
            </script>
<?php
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Duplicate data found',
                icon: 'error',
                confirmButtonText: 'Okay'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.replace("clients_details.php");
                }
            });
        </script>
<?php
    }
}



//  submit close 


include("layout/footer.php");
?>