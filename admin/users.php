<style>

    .table-striped thead th {
        background-color: #ffffff;
        color: black;
    }

    
    .table-striped tbody tr {
        background-color: #f8f9fa;
    }

  
    .btn-group .btn {
        background-color: #007bff;
        color: #ffffff;
    }

    .dropdown-menu .dropdown-item {
        color: #343a40;
    }

   
    .table-striped tbody td:nth-child(6) {
        text-align: left;
    }
</style>

<?php
include 'db_connect.php';

$users = $conn->query("SELECT  first_name, last_name, email, mobile, address FROM user_info ");

if ($users === false) {
    die("Error executing the query: " . $conn->error);
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- <button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New user</button> -->
        </div>
    </div>
    <br>
    <div class="row">
        <div class="card col-lg-12">
            <div class="card-body">
                <table class="table table-striped table-bordered col-md-12">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = $users->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td>
                                    <center>
                                        <!-- <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Action</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item edit_user" href="javascript:void(0)" data-id="">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete_user" href="#" data-id="">Delete</a>
                                            </div>
                                        </div> -->
                                    </center>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#new_user').click(function() {
            uni_modal('New User', 'manage_user.php');
        });
        $('.edit_user').click(function() {
            uni_modal('Edit User', 'manage_user.php?id=' + $(this).attr('data-id'));
        });
    });
	document.addEventListener('DOMContentLoaded', function() {
       
        var newUserButton = document.getElementById('new_user');

        // Attach a click event listener to the button
        newUserButton.addEventListener('click', function() {
            // Redirect to the signup.php page
            window.location.href = 'signup.php';
        });
    });
</script>
