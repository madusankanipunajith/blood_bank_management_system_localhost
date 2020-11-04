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
                        <div class="tile">
                            <li><a href="new_hospital">Add New Hospitals</a></li>
                        </div>
                        <div class="tile">
                            <li><a href="select_hospital">Delete Hospital </a></li>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>