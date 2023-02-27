<?php
$search_param = $_POST["search"];
$search_area = $_POST["area"];
if (isset($_POST["search"]) && isset($_POST["area"])) {
    $host = "localhost";
    $dbuser = "id20167408_user";
    $dbpass = "Abcdef@123456";
    $dbname = "id20167408_hackveda_database";
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

    $sql = " SELECT id, doctorname, doctorinformation, doctorimage FROM `doctors` 
  WHERE doctorarea LIKE '%" . $search_area . "%' AND doctorfield like '%" . $search_param . "%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = '<div class="we-found-the-following-doctors">
                We found the following doctors for you
            </div>';
        $doctor_data = " ";

        while ($row = $result->fetch_assoc()) {
            $doctorid = $row["id"];
            $doctorname = $row["doctorname"];
            $doctorinformation = $row["doctorinformation"];
            $doctorimage = $row["doctorimage"];
            $doctor_data = $doctor_data . '<div class="frame4">
                <div class="frame5">
                    <div class="rectangle3"></div>
                    <img class="rectangle-icon3"  src="' . $doctorimage . '" />
                </div>
                <b class="find-best-doctors1">' . $doctorname . '</b>
                <div class="find-your-doctor-with-minimum2">' . $doctorinformation . '</div>
            </div>';
        }
    } else {
        $data = '<div class="we-found-the-following-doctors">
                No doctors found in your area!
            </div>';
    }
} else {
    $data = '<div class="we-found-the-following-doctors">
                Bad query!
            </div>';
}
echo $data . $doctor_data;
?>