<?php
require '../../session.php';

if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['dis']) && isset($_GET['add'])) {
        $id= $_GET['id'];set_hospital($id);
        $name= $_GET['name'];set_hospital_name($name);
        $district= $_GET['dis'];set_district($district);
        $address= $_GET['add'];set_address($address);

        header("Location: ../delete_hospital");
    }


?>