
<?php
    
    require '../session.php';
     include '../header.php';
    
?>

<body>

	<div class="container-row admin">
        <?php
            require '../dashboard.php';
        ?>

        <div class="main">
            <div class="topic">
            <div  class="form-style-2-heading">Manage Admins</div><br>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['update'])) {
                    echo "<p style=\"color:green; text-align:center;\">Updated Successfully !!!</p>";
                }
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['reg'])) {
                    echo "<p style=\"color:green; text-align:center;\">Added Successfully !!!</p>";
                }
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['del'])) {
                    echo "<p style=\"color:red; text-align:center;\">Deleted Successfully !!!</p>";
                }
            ?>
                <form action="" method="post">
                    <div class="content">
                        <div class="tile">
                             <li><a href="new_admin" >Add New Admin</a></li>
                         </div>
                        <div class="tile">
                            <li><a href="select_admin?update=yes">Update Admin</a></li>
                        </div>
                        <div class="tile">
                            <li><a href="select_admin?delete=yes">Delete Admin</a></li>
                        </div>

                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

</body>
</html>
