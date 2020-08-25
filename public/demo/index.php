<?php
$servername = "localhost";
$username 	= "root";
$password 	= "admin@1234";
$dbname 	= "aimbeyond";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id= $_REQUEST['id'];
$jobName= $_REQUEST['job_name'];



$sql ="SELECT * FROM `so_job_applications` WHERE `job_id` = ".$id."";
$result = $conn->query($sql);

$file_folder = "resume/"; // folder to load files
if(extension_loaded('zip'))
{ 
	// Checking ZIP extension is available
	if ($result->num_rows > 0) {
	

	// Checking files are selected
	$zip = new ZipArchive(); // Load zip library 
	$zip_name = $jobName.'_'.time().".zip"; // Zip name
	if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE){ 
	 // Opening zip file to load files
		$error .= "* Sorry ZIP creation failed at this time";
	}

	// output data of each row
	while($row = $result->fetch_assoc()) {
		$file = $row["resume"];
		if($row["resume"]!=''){
			echo $file_folder.'../storage/uploads/resume/'.$file; die;

			$zip->addFile($file_folder.$file); // Adding files into zip
	    ////echo "id: " . $row["id"] . $row["resume"]. "<br>";
		}
	}
	echo "<pre>";
	print_r($zip); die;
	// foreach($post['files'] as $file){ 	
	// 	$zip->addFile($file_folder.$file); // Adding files into zip
	// }

	$zip->close();
	if(file_exists($zip_name)){
	// push to download the zip
	header('Content-type: application/zip');
	header('Content-Disposition: attachment; filename="'.$zip_name.'"');
	readfile($zip_name);
	// remove zip file is exists in temp path
	unlink($zip_name);
	}

	}
	$conn->close();
}

?>
