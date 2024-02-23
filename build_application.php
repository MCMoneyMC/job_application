<?php
require "db_func.php";
require "application_class.php";


function build_application()
{
    $conn = establish_connection_db("trafficcontrol", "root", "", "trafficcontrol");

    execute_resultless_queries_from_file($conn, "db_init.sql");
    execute_resultless_queries_from_file($conn, "db_pop.sql");

    $applicant_id = create_applicant($conn);

    /*Connect to applicant to Technologies via AT table.*/
    /*Add applicant_id to Applications*/

    terminate_connection_db($conn);
}


function create_applicant(mysqli $connection): int 
{
    $applicant_first_name = "Lars Tristan";
    $applicant_last_name = "Lepik";
    $applicant_email = "ltlepik.designs@gmail.com";
    $applicant_bio = "";
    $applicant_vcs_url = "https://github.com/MCMoneyMC/job_application";

    $columns = "NULL, `{$applicant_first_name}`, `{$applicant_last_name}`, `{$applicant_email}`, `{$applicant_bio}`, `{$applicant_vcs_url}`";

    $insert_query = "INSERT INTO `APPLICANT` VALUES ({$columns});";
    execute_resultless_queries($connection, $insert_query);

    $id_query = "SELECT LAST_INSERT_ID() AS `ID`;";
    $result = execute_query($connection, $id_query);

    if (count($result) != 1) {
        terminate_connection_db($connection);
        die(date("Y-m-d H:i:s:u e") . __FILE__ . "\tReceived more than one result for LAST_INSERT_ID().\n");
    }

    foreach ($result as $row) {
        $applicant_id = $row['ID'];
    }

    return $applicant_id;
}


?>