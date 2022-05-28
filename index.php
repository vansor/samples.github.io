
<?php
    $data = file_get_contents ('http://139.59.230.69:5050/search/search-page?key=boy&p=4');
    $json = json_decode($data, true);
    $sample_data = file_get_contents ('e.json');
    ?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
  <script> 
      $(document).ready(function () {
      $('#example').DataTable();
    });
</script>
  </head>
<body>

<?php
$str_data = file_get_contents("e.json");
$data = json_decode($str_data, true);
$temp = '<table id="example" class="table table-striped table-bordered" style="width:100%">';
 
/*Defining table Column headers depending upon JSON records*/
$temp .= "<thead><tr><th>Url</th>";
$temp .= "<th>Path</th>";
$temp .= "<th>Thumbing</th>";
$temp .= "<th>Title</th>";
$temp .= "<th>Duration</th>";
$temp .= "<th>Profile</th>";
$temp .= "<th>Views</th></tr></thead>";


/*Dynamically generating rows & columns*/
for($i = 0; $i < sizeof($data["videos"]); $i++)
{
$temp .= "<tr>";
$temp .= "<td>" . $data["videos"][$i]["url"] . "</td>";
$temp .= "<td>" . $data["videos"][$i]["path"] . "</td>";
$temp .= "<td>" . $data["videos"][$i]["thumbing"] . "</td>";
$temp .= "<td>" . $data["videos"][$i]["title"] . "</td>";
$temp .= "<td>" . $data["videos"][$i]["duration"] . "</td>";
$temp .= "<td>" . $data["videos"][$i]["profile"] . "</td>";
$temp .= "<td>" . $data["videos"][$i]["views"] . "</td>";
$temp .= "</tr>";
}
 
/*End tag of table*/
$temp .= "</table>";
 
/*Printing temp variable which holds table*/
echo $temp;
?>

    </body>
</html>