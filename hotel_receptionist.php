
<?php
error_reporting(0);
@ini_set('display_errors', 0);
    global $psq;
     $cn=pg_connect("host=localhost port=5432 dbname=managementdb user=postgres password= rnyclvrby");
     $psq = pg_query("SELECT * FROM room_bill");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Management Database</title>
   
</head>
<body>

        <div class="row" style="text-align:center">
          <h1>Room Bills</h1>
        </div>
           <div class="row" style="text-align:center;margin:auto;width:auto">
                <div class="col-sm-4"></div> 
                <div class="col-sm-4">
                <table class="table table-striped">
                              <tr>
                                  <th>National ID of the client</th>
                                  <th>Price of The Room</th>
                                  <th>Bill ID</th>
                                  <th>Delete</th>
                              </tr>
                              <?php
                              $i=0;
                              while($row=pg_fetch_assoc($psq)) {
                              ?>
                                  <tr>
                                      <td><?php echo $row["client_nid"]; ?></td>
                                      <td><?php echo $row["room_bill"]; ?></td>
                                      <td><?php echo $row["rbill_id"]; ?></td>
                                      <td><a href="deleteroombill.php?delete=<?=$row['rbill_id']?>" onclick="return confirm('Silinsin mi?')" class="btn btn-danger">Kaldır</a></td>
                                      
                                  </tr>
                              <?php
                              $i++;
                              }
                              ?>
                </table>  
               
                </div>
                <div class="col-sm-4"></div>
          </div>
          <script src="nav.js"></script>
</body>
</html>