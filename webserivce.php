<?php

$search_param = $_POST["search"];
$search_area = $_POST["area"];

$host = "localhost";
$dbuser = "id20167408_user";
$dbpass = "Abcdef@123456";
$dbname = "id20167408_hackveda_database";



$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT id, doctorname, doctorfield, doctorinformation,doctorimage
  FROM `doctors` WHERE doctorarea like '%".$search_area."%' and doctorfield like '%".$search_param."%'";

$result = $conn->query($sql);

if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
    $doctorid = $row["id"];
    $doctorname = $row["doctorname"];
    $doctorinformation = $row["doctorinformation"];
    $doctorimage = $row["doctorimage"];

    $doctor_data["DocName"] = $doctorname;
    $doctor_data["Docinfo"] = $doctorinformation;
    $doctor_data["Docimage"] = $doctorimage;
    
    $data[$doctorid] = $doctor_data;
}
     
    $data["Result"] = "True";
    $data["Message"] = "Doctors fetched successfully!" ;

}else{
    $data["Result"] = "False";
    $data["Message"] = "No Doctors Found" ;

}

echo json_encode($data);

?>