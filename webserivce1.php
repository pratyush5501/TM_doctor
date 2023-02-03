<?php

$search_param = $_POST["search"];
$search_area = $_POST["area"];

// Connect to Database 

$host = "localhost";
$dbuser = "id20229334_user_db";
$dbpass = "qA\S+uC_0${6OWvr";
$dbname = "id20229334_hackveda_doctor";


$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT * FROM `doctors` WHERE doctorarea like '%".$search_area."%' and doctorinformation like  '".$search_param."%'";

$result = $conn->query($sql);

 if($result->num_rows > 0){

 	while($row = $result-> fetch_assoc()){
 		$doctorid = $row["ID"];
 		$doctorname = $row["DoctorName"];
 		$doctorinfo = $row["Doctorinformation"];
        $doctorfield = $row["Doctorimage"];


       $doctor_data = $doctor_data.<div class="search-section">
       <div class="description2">
         <p class="ask-for-an">'.$doctorinfo.'</p>
       </div>
       <b class="titleforsearch">'.$doctorname.'</b
       ><img
         class="searchimagebg-icon"
         alt=""
         src="public/searchimagebg.svg"
       /><img
         class="searchimage-icon"
         alt=""
         src="'.$doctorimage.'"
       />
     </div>
	 } ;
    
    
}
else
{
    $data = '<div class="lbltitlesection3"><b>No Doctor Found in your area</b></div>';
    $doctor_data="";
}
}
else
{
    $data = '<div class="lbltitlesection3"><b>Bad Query</b></div>';
    $doctor_data="";
}

$data = $data.$doctor_data;
echo $data;

?>
