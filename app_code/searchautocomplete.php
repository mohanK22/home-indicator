<?php
    //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '#HI_root@22';
    $dbName = 'hidemo';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM owner WHERE first_name LIKE '%".$searchTerm."%' ORDER BY id ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['first_name'];
    }
    
    //return json data
    echo json_encode($data);
?>