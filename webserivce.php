<?php

$search_Field = $_POST["Field"];
$search_area = $_POST["area"];

// Connect to Database 

$host = "localhost";
$dbname = "hackveda_doctor";
$dbpass = " ";


$conn = new mysqli($host , $dbname, $dbpass );

$sql = " SELECT * FROM `doctors` WHERE DoctorArea like '%.search_area.%' and DoctorField like '%.$search_Field.%';"

$result = $conn->query($sql);

 if($result-> nums_rows > 0){

 	while($row = $result-> fetch_assoc()){
 		$doctorid = $row["ID"];
 		$doctorname = $row["DoctorName"];
 		$doctorinfo = $row["DoctorInformation"];
 		$doctorimage = $row["DoctorImage"];

       $doctor_data["DocName"]= $doctorname
       $doctor_data["DocInfo"] = $docinfo;
       $doctor_data["DocImage"] = $doctorimage;

       $data[$doctorid] =  $doctor_data;
}
       
       $data["Result"] = "True";
       $data["Message"] =  "Doctors fetched successfully";

}else{
     $data["Result"] = "False"; 
     $data["Message"] = "No Doctor's Found"
}

?>
