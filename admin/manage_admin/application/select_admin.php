<?php
    require '../../session.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty(trim($_POST["nic"]))) {
                $nic_err="Enter an NIC";
            }else{
                $nic= $_POST['nic'];
                $sql="SELECT FirstName FROM blood_bank_admin WHERE NIC='$nic'";
                $result=mysqli_query($link, $sql);
                $count= mysqli_num_rows($result);
                if ($count!=0) {
                    if (isset($_GET['process'])) {
                        if ($_GET['process']== "update") {
                            header("Location: ../update_admin?nic=$nic");
                        }else{
                            header("Location: ../delete_admin?nic=$nic");
                        }
                    }
                    
                }else{
                    $nic_err="No Such an Admin";
                }
            }

            if (!empty($nic_err)) {
                header("Location: ../select_admin.php?nic=$nic_err");
            }
            
    }   

    mysqli_close($link);   
?>