<?php
 function connectDB() {
    $conn = new mysqli("localhost", "root", "", "nhom90");
    $conn->query('set character_set_client=utf8');
    $conn->query('set character_set_connection=utf8');
    $conn->query('set character_set_results=utf8');
    $conn->query('set character_set_server=utf8');
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }

 }