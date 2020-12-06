<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Members</title>

  <link href="../css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <style rel="stylesheet">
    .el08 {
      width: 20px;
      height: 20px;
    }

    .btn-group {
      width: 100%;
      margin: 10px 0;
    }

    .but {
      float: right;
    }

    .btn-sm {
      margin-right: 10px !important;
    }
    .del{
      color:black!important;
      text-decoration: none;
    }
    .del:hover{
      color:white!important;
      text-decoration: none;
    }
    .ac{
      color:green;
    }
    .ac:hover{
      color:green;
    }
    .ina{
      color:red;
    }
    .ina:hover{
      color:red;
    }

  </style>
</head>

<body>

  <?php include '../components/header.php' ?>

  <?php
$servername = "localhost";
$password = "";

// Create connection
$link = mysqli_connect($servername,'root',$password,'id14825970_gpf');

// Check connection
if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql = "SELECT * FROM student";

?>
  <div id="layoutSidenav">

    <?php include '../components/sidebar.php' ?>

    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <h1 class="mt-4">Members</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/admin/dist/index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Members</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">

            <?php $a=0?>
            <form id="form1" name="form1" method="get" action="index.php">
           
            <select name="select2[]">
            <option value="all">all</option>
            <option value="intern">Intern</option>
            <option value="volunteer">Volunteer</option>
            <option value="member">Member</option>
            
          </select>
          <input type="submit" name="Submit" value="Submit"/>

              <!-- ////////////////////////// -->
              <?php
if(isset($_GET['Submit'])){              
foreach ($_GET['select2'] as $names)
{
        print "You have selected $names<br/>";
        $a=1;
}}

?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                    </tr>
                  </thead>

                  <tbody>

                        <?php
                        if($a==1){
                        if($names=='all'){
                          $sql = "SELECT * FROM student";
                        $result = $link->query($sql);
                        $a=0;
                        }
                        else{
                          $sql = "SELECT * FROM student WHERE Fields = '$names'";
                          $result = $link->query($sql);
                          $a=0;
                        }
                      }
                        else{
                          $result = $link->query($sql);
                        }
                        if ($result->num_rows > 0) {
                          // output data of each row
                        while($row = $result->fetch_assoc()) {
                          
                          echo '<tr>
                           <td>' .$row["Name"]. 
                           '<span class="but">
                           <a href="/admin/dist/Student_profile ?id=' .$row['Group_ID'].'" type="button" class="btn btn-outline-dark btn-sm">View Profile</a>'
                           .($row["Status"] == 1 ? '<button type="button" class="btn btn-outline-dark btn-sm ac"> Active </button>':
                           '<button type="button" class="btn btn-outline-dark btn-sm ina">Inactive</button>').
                            '<button type="button" class="btn btn-outline-dark btn-sm">
                            <a class="del" href="delete.php?id=' .$row['Group_ID'].'">Delete</a>
                            </button></span></td>
                            </tr>';
                          }
                        } else {
                          echo "0 results";
                        }
                        $link->close()
                        ?>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </main>
      <?php include '../components/footer.php' ?>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script src="../assets/demo/datatables-demo.js"></script>
  <script src="../main/scripts.js"></script>

</body>

</html>
