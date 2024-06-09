<?php
include("layout/header.php");
if (isset($_GET['edit'])) {
    $edit = true;
    $editData = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM notice WHERE  id = '$_GET[edit]'"));
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
                    <h6 class="m-0 font-weight-bold text-primary"><?= $edit ? 'Update' : 'Add' ?> Notice</h6>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="noticeText">Name</label>
                                    <input type="text" class="form-control" name="noticeText" placeholder="Enter notice text" value="<?= $edit ? $editData['noticeText'] : '' ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link (Optional)</label>
                                    <input type="text" class="form-control" name="link" value="<?= $edit ? $editData['link'] : '' ?>"  placeholder="If any reference">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="active" <?= $edit && $editData['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                        <option value="inactive" <?= $edit && $editData['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-start">
                                    <button type="submit" name="<?= $edit ? 'update' : 'submit' ?>" class="btn btn-primary w-50 form-control border border-0"><?=$edit ? 'Update notice' : 'Add notice' ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" id="container-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4 p-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Notice</h6>
                </div>
                <div style="overflow-x: scroll;">
                    <table class="table" id="mytable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Notice Text</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = 1;
                            $query = mysqli_query($conn, "SELECT * FROM notice ORDER BY id DESC");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr valign="middle">
                                    <td><?= $serial++ ?></td>
                                    <td><?= $data['noticeText'] ?></td>
                                    <td><?= $data['link'] ?></td>
                                    <td><?= $data['status'] ?></td>
                                    <td><?= $data['created_at'] ?? '' ?></td>
                                    <td nowrap>
                                        <a href="notice.php?edit=<?= $data['id'] ?>" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button class="btn btn-danger" onclick="deletedata(<?= $data['id'] ?>)">delete</button>
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

<?php

if (isset($_POST['submit']) || isset($_POST['update'])) {
    $noticeText = isset($_POST['noticeText']) ? htmlentities($_POST['noticeText']) : null;
    $link = isset($_POST['link']) ? htmlentities($_POST['link']) : null;
    $status = isset($_POST['status']) ? $_POST['status'] : null;
    if (isset($_POST['submit'])) {
        if ($noticeText) {
            $add = mysqli_query($conn, "INSERT INTO notice SET noticeText = '$noticeText' , link = '$link', status = '$status'");
            if ($add) {
?>
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Notice added successfully',
                        icon: 'success',
                        confirmButtonText: 'Okay'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.replace("notice.php");
                        }
                    });
                </script>
            <?php
            }
        }
    } elseif (isset($_POST['update'])) {
        $add = mysqli_query($conn, "UPDATE notice SET noticeText = '$noticeText' , link = '$link', status = '$status' WHERE id = '$_GET[edit]'");
        if ($add) {
            ?>
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Notice updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace("notice.php");
                    }
                });
            </script>
<?php
        }
    }
}

include("layout/footer.php");
?>
<script>
    async function deletedata(id) {
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
                const request = await fetch('delete/deletenotice.php', {
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
                        resultData.status,
                        resultData.message,
                        resultData.status
                    ).then((result) => {
                        if (result.isConfirmed) {
                            location.replace("notice.php");
                        }
                    })
                } else {
                    Swal.fire(
                        'Error!',
                        'An error occurred while deleting the notice.',
                        'error'
                    );
                }
            }
        });
    }
</script>