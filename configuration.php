<?php 
// Database connection
$host = 'danies-website.db.transip.me';
$database = 'danies_website';
$db_user = 'danies_daniel';
$db_passw = 'SchoklandStraat66%';

$con = mysqli_connect($host, $db_user, $db_passw, $database);
mysqli_select_db($con, $database);

if (mysqli_connect_errno()) {
    die('Verbinding met MySQL is mislukt: ' . mysqli_connect_error());
}

// Set timezone
date_default_timezone_set('Europe/Amsterdam');
// Run a query
function dbQuery($query)
{
    global $con;
    $sql = mysqli_query($con, $query);
    return $sql;
}

// Count rows
function countRows($query)
{
    global $con;
    $number = mysqli_num_rows(dbQuery($query));
    return $number;
}

// Fetch a query
function dbFetch($var)
{
    $res = mysqli_fetch_assoc($var);
    return $res;
}

// Return the results
function returnResult($query, $valueToReturn)
{
    global $con;
    $res = dbFetch(dbQuery($query));
    return $res[$valueToReturn];
}

// Escape the query
function escape($q)
{
    global $con;
    $output = mysqli_real_escape_string($con, $q);
    return $output;
}

