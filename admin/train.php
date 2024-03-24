<?php

include("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $train_name = $_POST['train_name'];
    $time = $_POST['time'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $trainnumber=$_POST['train_number'];

    $sql = "INSERT INTO train (train_name,source, destination,time,date,train_number) VALUES ('$train_name', '$source', '$destination','$time','$date','$trainnumber')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Insert Train Data</title>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<h2>Insert Train Data</h2>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Food Service
</button>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Train Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label for="train_name">Train Name:</label>
            <input type="text" class="form-control" id="train_name" name="train_name" required>
          </div>
          <div class="form-group">
            <label for="train_name">Train Number:</label>
            <input type="text" class="form-control" id="train_number" name="train_number" required>
          </div>
          <div class="form-group">
            <label for="time">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>

          </div>
          <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time" required>
          </div>
          <div class="form-group">
            <label for="source">Arrival:</label>
            <input type="text" class="form-control" id="source" name="source" required>
          </div>
          <div class="form-group">
            <label for="destination">Depature:</label>
            <input type="text" class="form-control" id="destination" name="destination" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTrainModal">
  Delete Train
</button>

<!-- Modal -->
<div class="modal fade" id="deleteTrainModal" tabindex="-1" aria-labelledby="deleteTrainModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteTrainModalLabel">Delete Train</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="deleteTrainForm" method="POST" action="delete.php">
          <div class="form-group">
            <label for="trainId">Train ID:</label>
            <input type="text" class="form-control" id="trainId" name="trainId" required>
          </div>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateTrainModal">
  Update Train
</button>

<!-- Modal -->
<div class="modal fade" id="updateTrainModal" tabindex="-1" aria-labelledby="updateTrainModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateTrainModalLabel">Update Train Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateTrainForm" method="POST" action="update_train.php">
          <div class="form-group">
            <label for="trainId">Train ID:</label>
            <input type="text" class="form-control" id="trainId" name="trainId" required>
          </div>
          <div class="form-group">
            <label for="trainName">Train Name:</label>
            <input type="text" class="form-control" id="trainName" name="trainName" required>
          </div>
          <div class="form-group">
            <label for="train_name">Train Number:</label>
            <input type="text" class="form-control" id="trainnumber" name="trainnumber" required>
          </div>
          <div class="form-group">
            <label for="source">Arrival:</label>
            <input type="text" class="form-control" id="source" name="source" required>
          </div>
          <div class="form-group">
            <label for="destination">Depature:</label>
            <input type="text" class="form-control" id="destination" name="destination" required>
          </div>
          <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time" required>
          </div>
          <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
          </div>
          <button type="submit" class="btn btn-success">Update</button>
        </form>
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

$users = $conn->query("SELECT  train_id, train_name, source, destination, time,date ,train_number FROM train");

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
                       
                            <th class="text-center">Train_id</th>
                            <th class="text-center">Train_Name</th>
                            <th clas="text-center">Train_Number</th>
                            <th class="text-center">Arrival</th>
                            <th class="text-center">Depature</th>
                            <th class="text-center">Time</th>
                            <th clas="text-center">Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while ($row = $users->fetch_assoc()): ?>
                            <tr>
                                
                                <td><?php echo $row['train_id']; ?></td>
                                <td><?php echo $row['train_name']; ?></td>
                                <td><?php echo $row['train_number']?></td>
                                <td><?php echo $row['source']; ?></td>
                                <td><?php echo $row['destination']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['date'];?></td>
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
</body>
</html>
