<?php


function establish_connection_db(string $servername, string $username, string $password, string $dbname)
{
    $servername = "trafficcontrol";
    $username = "root";
    $password = "";
    $dbname = "trafficcontrol";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Couldn't connect: {$conn->connect_error}");
    }

    return $conn;
}


function terminate_connection_db(mysqli $conn)
{
    $conn->close();
}


function execute_resultless_queries(mysqli $conn, string $sql_query)
{
    if (!$conn->multi_query($sql_query)) {
        terminate_connection_db($conn);
        die(date("Y-m-d H:i:s:u e") . __FILE__ . "\tCaught exception:\t" . __DIR__ . "\t{$conn->error}\n");
    }
}


function execute_resultless_queries_from_file(mysqli $conn, string $sql_filename)
{
    $sql_query = file_get_contents($sql_filename);

    if (!$conn->multi_query($sql_query)) {
        terminate_connection_db($conn);
        die(date("Y-m-d H:i:s:u e") . __FILE__ . "\tCaught exception:\t" . __DIR__ . "\\{$sql_filename}\t{$conn->error}\n");
    }
}


function execute_query(mysqli $conn, string $sql_query): array {
    $result = $conn->query($sql_query);
    if (!$result){
        terminate_connection_db($conn);
        die(date("Y-m-d H:i:s:u e") . __FILE__ . "\tCaught exception:\t{$sql_query}\t{$conn->error}\n");
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>