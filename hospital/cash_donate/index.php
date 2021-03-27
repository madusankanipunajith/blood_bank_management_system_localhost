
<?php
    require '../session.php';
    require '../header.php';

?>
<body class="">

	
	<div class="container-row donor">

        <?php
            require '../dashboard.php';
        ?>

        <div class="main">

            <div class="topic">
                 <div class="form-style-2-heading">Cash Donation</div>
                 <p>Help Build This Foundation</p>
            </div>
            <center>
            <div>
                <p>Make a one-time donation</p>
                <form>
                    <div class="row" style = "margin: 10px">
                        <button>Rs. 1000.00</button>
                        <button>Rs. 2000.00</button>
                        <button>Rs. 3000.00</button>
                    </div>
                    <div class = "row" style = "margin: 10px">
                        <button>Rs. 4000.00</button>
                        <button>Rs. 5000.00</button>
                        <button>Rs. 10000.00</button>
                    </div>
                
                    <div class="form-group">
                        <p>Make a custom donation</p>
                        <input type = "number">
                    </div>
                     <div class="form-group"><input type="submit" name="submit" class="button btn-edit" value="Submit"></div>
                </form>
            </div>
        </center>

        </div>

    </div>



<?php include '../../footer.php'; ?>

