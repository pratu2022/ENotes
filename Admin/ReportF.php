<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
require("sidebar.php");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Faculty</title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> 

</head><style>
    #content {
        margin-left: 250px;
         padding: 15px; 
    }

.button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  background-color: #614385;
  color: #fff;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  transition: transform 0.3s ease-in-out;
}

.button:hover {
  transform: scale(1.1); /* Scale the button by 10% on hover */
}

.icon-button {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 24px;
  color: #3498db; /* Change the color as needed */
}

/* Optional: Add some styles on hover or focus */
.icon-button:hover,
.icon-button:focus {
  outline: none;
  color: #2078c6; /* Change the hover/focus color as needed */
}
</style>

<body>
<br/>
<div id="content">
<h1 class="display-6">Faculty</h1>
    <hr class="mt-3">
<div class="container">

<div class="row">
<div class="col-md-6">
    <input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
</div>
<div class="col-md-4">
    <input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
</div>
<div class="col-md-2">
    <input type="button" name="range" id="range" value="Range" class="button"/>
</div>
</div>
<div class="clearfix"></div>
<br/>
<?php
include("../connect.php");
$query = "SELECT * FROM tblfaculty";
$sql = mysqli_query($mysql, $query);
?>
<div id="faculty">
    <table class="table table-striped" id="myTable">
    <thead>
    <tr>
    <th>Faculty Registration No</th>
    <th>Faculty Name</th>
    <th>Faculty Email</th>
    <th>Faculty Address</th>
    <th>Faculty Image</th>
    <th>Faculty Phone</th>
    </tr>
</thead>
<tbody>
<?php while($row= mysqli_fetch_array($sql)) { ?>
    <tr>
    <td><?php echo $row["regno"]; ?></td>
    <td><?php echo $row["fac_name"]; ?></td>
    <td><?php echo $row["fac_email"]; ?></td>
    <td><?php echo $row["fac_address"]; ?></td>
    <td><img src="<?php echo "uploadf/" . $row['fac_image'] ?>" alt="" width ="50" height="50"></td>
    <td><?php echo $row["fac_phone"]; ?></td>
    </tr>
<?php } ?>
</tbody>
    </table>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function(){
            $("#From").datepicker();
            $("#to").datepicker();
        });
 
        $('#range').click(function(){
            var From = $('#From').val();
            var to = $('#to').val();
            if(From != '' && to != '')
            {
                $.ajax({
                    url:"range.php",
                    method:"POST",
                    data:{From:From, to:to},
                    success:function(data)
                    {
                        $('#faculty').html(data);
                        $('#faculty').append(data.htmlresponse);
                    }
                });
            }
            else
            {
                alert("Please Select the Date");
            }
        });
    });
    </script>
</body>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</div>
</html>
<?php
}
else
{
    header('location:../error.php');
}
?>

