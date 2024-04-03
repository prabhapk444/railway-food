
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Information</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <h2>Employee Information</h2>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeModal">
    Add Employee
  </button>

  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateemployeeModal">
    Update Employee
  </button>

  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteemployeeModal">
    Delete Employee
  </button>

  <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="employeeModalLabel">Add New Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="employeeForm" method="POST" action="add_emp.php">
            <div class="form-group">
              <label for="emp_id">Employee ID:</label>
              <input type="text" class="form-control" id="emp_id" name="emp_id">
            </div>
            <div class="form-group">
              <label for="emp_name">Employee Name:</label>
              <input type="text" class="form-control" id="emp_name" name="emp_name">
            </div>
            <div class="form-group">
              <label for="emp_number">Employee Number:</label>
              <input type="text" class="form-control" id="emp_number" name="emp_number">
            </div>
            <div class="form-group">
              <label for="emp_number">Employee Email:</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="emp_number">Salary:</label>
              <input type="text" class="form-control" id="salary" name="salary">
            </div>
            <div class="form-group">
              <label for="emp_number">Designation</label>
              <input type="text" class="form-control" id="role" name="role">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="saveEmployee">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateemployeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="employeeModalLabel">Update Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="updateEmployeeForm" method="POST" action="edit_emp.php">
            <div class="form-group">
              <label for="update_emp_id">Employee ID:</label>
              <input type="text" class="form-control" id="update_emp_id" name="update_emp_id">
            </div>
            <div class="form-group">
              <label for="update_emp_name">Employee Name:</label>
              <input type="text" class="form-control" id="update_emp_name" name="update_emp_name">
            </div>
            <div class="form-group">
              <label for="update_emp_number">Employee Number:</label>
              <input type="text" class="form-control" id="update_emp_number" name="update_emp_number">
            </div>
            <div class="form-group">
              <label for="emp_number">Employee Email:</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="emp_number">Salary:</label>
              <input type="text" class="form-control" id="salary" name="salary">
            </div>
            <div class="form-group">
              <label for="emp_number">Designation</label>
              <input type="text" class="form-control" id="role" name="role">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" id="updateEmployeeBtn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteemployeeModal" tabindex="-1" role="dialog" aria-labelledby="deleteemployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteemployeeModalLabel">Delete Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="deleteEmployeeForm" method="POST" action="del_emp.php">
            <div class="form-group">
              <label for="emp_id">Employee ID:</label>
              <input type="text" class="form-control" id="emp_id" name="emp_id" required>
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
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

$users = $conn->query("SELECT  emp_id, emp_name, emp_number,email,emp_salary,emp_role FROM employee");

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
                            <th class="text-center">Emp_id</th>
                            <th class="text-center">Emp_Name</th>
                            <th class="text-center">Emp_number</th>
                            <th class="text-center">Emp_Email</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Salary</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = $users->fetch_assoc()): ?>
                            <tr>
                                
                                <td><?php echo $row['emp_id']; ?></td>
                                <td><?php echo $row['emp_name']; ?></td>
                                <td><?php echo $row['emp_number']; ?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['emp_role'];?></td>
                                <td><?php echo $row['emp_salary'];?></td>
                             
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
                                
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
