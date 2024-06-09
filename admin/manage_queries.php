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
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Queries are here</h6>
                </div>
                <div style="overflow-x: scroll;">
                    <table class="table" id="mytable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>

                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = 1;
                            $contacts = mysqli_query($conn, "SELECT * FROM contacts ");
                            while ($data = mysqli_fetch_array($contacts)) {
                                $dateString = "$data[created_at]";

                                // Explode the date string by "."
                                $dateParts = explode(".", $dateString);
                            ?>
                                <tr valign="middle">
                                    <td><?= $serial++ ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['phone'] ?></td>
                                    <td><?= $data['subject'] ?></td>
                                    <td><?= $data['message'] ?></td>
                                    <td><?= $dateParts[0] ?></td>
                                    <td nowrap>
                                        <button class="btn btn-danger btn-sm" onclick="deletequery(<?= $data['id'] ?>)">delete</button>
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
    async function deletequery(id) {

        Swal.fire({
            title: 'Query resolved ?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
            if (result.isConfirmed) {

                const request = await fetch('delete/delete_query.php', {
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
                    'Requested query has been deleted.',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        location.replace("manage_queries.php");
                    }
                })
            }
        })
    }
</script>
<?php
include("layout/footer.php");
?>