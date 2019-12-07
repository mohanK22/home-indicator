<?php
    if (!isset($_POST['contactshare'])) {
                        $name = $_POST['name'];
                        $emailid = $_POST['emailid'];
                        $mobno = $_POST['mobno'];


                        $sql = "SELECT * FROM owner WHERE email_id = '" . $owner_name ."'";
                        $result = $conn->query($sql);

                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){

                              echo "<script>alert('Owener Data Name : '" . $row['first_name'] . " " . $row['last_name'] ."Mobile No. : " . $row['mob_no'] . "\nEmail-ID : " . $row['email_id'] . ")</script>";

                          }
                        }
        exit;

    }

?>