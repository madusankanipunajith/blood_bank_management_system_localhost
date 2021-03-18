
<?php
    
    require '../session.php';
    include '../header.php';
    unset_cache();    
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
                        <div class="tile-container">
                            <a href="new_admin" >
                                <div class="tile">
                                    <li>Add New Admin</li>
                                </div>
                            </a>
                            <a href="select_admin?update=yes">
                                <div class="tile">
                                    <li>Update Admin</li>
                                </div>
                            </a>
                            <a href="select_admin?delete=yes">
                                <div class="tile">
                                    <li>Delete Admin</li>
                                </div>
                            </a>
                        </div>

                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>
