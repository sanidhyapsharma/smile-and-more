<?php
include 'connection.php';
session_unset('employee');
session_unset('emp_type');
session_unset('admin');
header('Location:index.php');
?>