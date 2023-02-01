<?php

$search_param = $_POST["search"];
$search_area = $_POST["area"];

// Connect to Database 

$host = "localhost";
$dbuser = "id20229334_user_db";
$dbpass = "FYrO%8o3W2DI=~0m";
$dbname = "id20229334_hackveda_doctor";


$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT * FROM `doctors` WHERE doctorarea like '%".$search_area."%' and doctorinformation like  '".$search_param."%'";

$result = $conn->query($sql);

 if($result->num_rows > 0){

 	while($row = $result-> fetch_assoc()){
 		$doctorid = $row["ID"];
 		$doctorname = $row["DoctorName"];
 		$doctorinfo = $row["Doctorinformation"];
 		$doctorimage = $row["Doctorarea"];
        $doctorfield = $row["Doctorimage"];


       $doctor_data["DocName"]= $doctorname;
       $doctor_data["DocInfo"] = $docinfo;
       $doctor_data["DocImage"] = $doctorimage;

       $data[$doctorid] =  $doctor_data;
}
       
       $data["Result"] = "True";
       $data["Message"] =  "Doctors fetched successfully";

}else{
     $data["Result"] = "False"; 
     $data["Message"] = "No Doctor's Found";
}

echo json_encode($data);

?>
