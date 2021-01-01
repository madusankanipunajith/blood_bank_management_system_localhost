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
            <div class="form-style-2-heading">Manage Hospitals</div><br>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['del'])) {
                    echo "<p style=\"color:red; text-align:center;\">Deleted Successfully !!!</p>";
                }
            ?>
                <form action="" method="post">
                    <div class="content">
                        <div class="tile-container">
                            <a href="new_hospital">
                                <div class="tile">
                                    <li>Add New Hospitals</li>
                                </div>
                            </a>
                            <a href="select_hospital">    
                                <div class="tile">
                                <li>Delete Hospital</li>
                            </a>    
                        </div>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include '../../footer.php'; ?>