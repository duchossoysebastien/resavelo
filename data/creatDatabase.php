<?php
include 'functions_velos.php';
require 'db_connect.php'; 

createDatabase($pdo,'resavelo.sql');

redirect('/index.php');