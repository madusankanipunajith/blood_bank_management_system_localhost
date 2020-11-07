<?php
   require_once "../session.php";

?>

<?php

    require_once "../header.php";

?>

<body>

	<div class="container-row hospital">

        <?php
            require_once "../header.php";
            require_once "../dashboard.php";
        ?>



        <div class="main">

            <div class="topic">
                <div class="form-style-2-heading">Search Hospital</div>
            </div>
            <div class="type-check">
                <form action="hospital_result.php" method="POST">
                <label for="btype">Enter Blood Type</label>
                <select name="btype" id="btype">
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+ </option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                
                    <label>Enter Volumn</label>
                    <input type="text" name="volume" class="form-control" value="">            
                    <br><br>
                    <input type="submit" value="Submit">
               </form>
            </div>

        </div>

    </div>


    <?php include '../../footer.php'; ?>
</body>