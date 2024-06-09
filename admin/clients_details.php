<?php
include("layout/header.php");

?>
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4 p-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All client details</h6>
                </div>
                <div style="overflow-x: scroll;">
                    <table class="table" id="mytable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>PAN</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>Reference</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = 1;
                            $all_clients = mysqli_query($conn, "SELECT * FROM clients ORDER BY id DESC");
                            while ($data = mysqli_fetch_array($all_clients)) {
                            ?>
                                <tr valign="middle">
                                    <td><?= $serial++ ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['pan'] ?></td>
                                    <td><?= $data['phone'] ?? '' ?></td>
                                    <td><?= $data['password'] ?? '' ?></td>
                                    <td><?= $data['reference'] ?? '' ?></td>
                                    <td><?= $data['created_at'] ?? '' ?></td>
                                    <td nowrap>
                                        <a href="update_client.php?edit=<?= $data['id'] ?>" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button class="btn btn-danger" onclick="deleteclient(<?= $data['id'] ?>)">delete</button>
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
    async function deleteclient(id) {
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
                const request = await fetch('delete/deleteclient.php', {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json"
                    },
                    body: JSON.stringify({
                        id
                    })
                });

                const resultData = await request.json(); 
                if (resultData.code == 200) {
                    Swal.fire(
                        'Deleted!',
                        'Client has been deleted.',
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            location.replace("clients_details.php");
                        }
                    })
                } else {
                    Swal.fire(
                        'Error!',
                        'An error occurred while deleting the client.',
                        'error'
                    );
                }
            }
        });
    }
</script>
<?php
include("layout/footer.php");
?>