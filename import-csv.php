<?php 
require_once './config/config.php';
$config = new configClass();
$conn = $config->getConnection();


$filename = "./Units.csv";
$file = fopen($filename, "r");
while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
{
    $sql = "INSERT into units (`Unit`, `UQCCode`, `UQCName`) 
         values ('".$getData[1]."','".$getData[2]."','".$getData[3]."')";
    $result = $conn->query($sql);
    if(!isset($result))
    {
        echo "Invalid File:Please Upload CSV File.";
    }
    else {
        echo "CSV File has been successfully Imported.";
    }
 }

fclose($file);
