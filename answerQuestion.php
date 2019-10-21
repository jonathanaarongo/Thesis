<?php
	include('conn.php');
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false);

    $answer = $data->answer;
    $questionID = $data->questionID;

   	$sql = "UPDATE questions SET answer = '$answer' WHERE questionID = '$questionID'";
   	$query = $conn->query($sql);

   	if($query){
   		$out['message'] = 'Question Answered Successfully';
   	}
   	else{
   		$out['error'] = true;
   		$out['message'] = 'Cannot Answer Question';
   	}

    echo json_encode($out);
?>