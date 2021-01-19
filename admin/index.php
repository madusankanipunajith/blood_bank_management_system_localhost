<?php
    include 'session.php';
	include 'header.php';

    $date= Date("Y-m-d");
    $sql="SELECT CampaignID FROM campaign WHERE Dates='$date'";$result=mysqli_query($link,$sql);$count1=mysqli_num_rows($result);
    $sql2="SELECT nic FROM donor";
    $result2=mysqli_query($link,$sql2);$count2=mysqli_num_rows($result2);
    $sql3="SELECT DISTINCT PNIC FROM transfusion WHERE Dates='$date'";$result3=mysqli_query($link,$sql3);$count3=mysqli_num_rows($result3);
    $sql4="SELECT OrganizationName FROM organization";$result4=mysqli_query($link,$sql4);$count4=mysqli_num_rows($result4);

    mysqli_close($link);
?>

<body onload="initClock()">
    
	<div class="container-row admin">
        
        <?php
            require 'dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
                <div class="form-style-2-heading">System Overview</div>
            </div>
           
            <div class="">
                <div class="date">
                    <span id="dayname">Day</span>,
                    <span id="month">Month</span>
                    <span id="daynum">00</span>,
                    <span id="year">Year</span>
                </div>
                <div class="time">
                    <span id="hour">00</span>:
                    <span id="minutes">00</span>:
                    <span id="seconds">00</span>
                    <span id="period">AM</span>
                </div>
            </div>
        

            <div class="form-row">
                <div style="margin-left: 20px;">
                    <a href="view/campaigns">
                        <div class="tile-2">
                        <i class="fa fa-map-marker" aria-hidden="true"></i><span class="tile-heading"><?php echo $count1;?></span>
                        <p>Today's Blood Donation Campaigns</p>
                    </div>
                    </a>
                </div>
                <div>
                    <a href="view/donors">
                        <div class="tile-2">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i><span class="tile-heading"><?php echo $count2;?></span></i>
                        <p>Blood Donors</p>
                        </div>
                    </a>
                </div>
                
            </div>
            <div class="form-row">
                <div style="margin-left: 20px;">
                    <div class="tile-2">
                    <i class="fa fa-tint" aria-hidden="true"></i><span class="tile-heading"><?php echo $count3;?></span></i>
                    <p>Today's Blood Transfusions</p>
                    </div>
                </div>
                <a href="view/organizations">
                    <div class="tile-2">
                    <i class="fa fa-university" aria-hidden="true"></i><span class="tile-heading"><?php echo $count4;?></span></i>
                    <p>Organizations</p>
                    </div>
                </a>
                
            </div>
            
        </div>
    </div>

<?php include '../footer.php'; ?>