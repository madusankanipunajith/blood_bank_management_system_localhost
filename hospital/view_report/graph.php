<?php
    include_once "../session.php";

    $nic = $_SESSION['id-5'];
    //today date
    $date= date("Y-m-d");

    //initialize variables
    $start_date=$end_date="";
    $start_err=$end_err="";
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
      //validate start data
      if(empty(trim($_POST["sdate"]))) //
      {
        $start_err ="Please select date";
      }
      else {
        $start_date= trim($_POST["sdate"]);
        //echo "$start_date";
        //echo gettype($start_date);
      }

      //validate end date
      if(empty(trim($_POST["edate"])))
      {
        $end_err ="Please select date";
      }
      elseif (trim($_POST["edate"]>$date)) {
        $end_err = "Date not valid";
      }
      elseif (trim($_POST["edate"])<trim($_POST["sdate"])) {
        $end_err = "Date not valid";
      }
      else {
        $end_date= trim($_POST["edate"]);
        //"$end_date";
      }
    }


    $designation = [];
    $sum =[];
    //check
    if(empty($start_err) && empty($end_err))
    {
      //select the sum of request blood in each day
      $sql ="SELECT SUM(normal_blood_request.Amount)AS total, normal_blood_request.Type FROM normal_blood_request WHERE normal_blood_request.Date>='$start_date' AND normal_blood_request.Date<='$end_date' AND normal_blood_request.ReceiverID='$nic' GROUP BY normal_blood_request.Type";
      $result= mysqli_query($link, $sql);
      while ($row = mysqli_fetch_array($result)) {
          $sum[]=$row["total"];
          $designation[] = $row["Type"];

      }
      $num_rows=mysqli_num_rows($result);
    }
    else {
         header("location: index.php?start=$start_err&end=$end_err");
    }

    mysqli_close($link);
?>

<?php
     require_once "../header.php";
 ?>


<script type="text/javascript">
  function test() {
    var i;

    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      title:{
        text: ""},
        axisY: {
          title: "Blood volume(ml)"
        },
        dataPointWidth: 70,
        data: [{
        type: "column",
        showInLegend: true,
        legendMarkerColor: "#A20200",
        legendText: "Total blood volume ",
        color :"#A20200",

        dataPoints: [
          <?php
            $i=0;
            while($i<$num_rows)
            {
              echo "{y: $sum[$i], label: \"$designation[$i]\" },";
              $i++;

            }
          ?>
        ]
        }]
     });
chart.render();

}

</script>


<body onload="test()">

	<div class="container-row hospital">

        <?php
            require_once "../dashboard.php";
        ?>



        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">Total blood request from <?php echo "(". "$start_date". ")";?> to <?php echo "(". "$end_date". ")";?></div>
            </div>
            <div class="chart" style="">
               <div id="chartContainer" style="height: 100%; width: 100%;"></div>
            </div>
        </div>
