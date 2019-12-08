<?php
    include('database_connection.php');
    $data = json_decode(file_get_contents("php://input"));

    $out = array('error' => false, 'pFirstName' => false, 'pLastName' => false, 'address' => false, 'contactNo' => false, 
    'status' => false);
    $pFirstName = $data->pFirstName;
    $pLastName = $data->pLastName;
    $address = $data->address;
    $contactNo = $data->contactNo;
    $status = $data->status;

    if(empty($pFirstName)){
        $out['pFirstName'] = true;
        $out['message'] = 'Firstname is required'; 
    } 
    elseif(empty($pLastName)){
        $out['pLastName'] = true;
        $out['message'] = 'Lastname is required'; 
    }
    elseif(empty($address)){
        $out['address'] = true;
        $out['message'] = 'Address is required'; 
    }
    elseif(empty($contactNo)){
        $out['cotactNo'] = true;
        $out['message'] = 'Contact No is required'; 
    }
    elseif(empty($status)){
        $out['status'] = true;
        $out['message'] = 'Status is required';
    }
    else{
        $sql = "INSERT INTO pgendata (pFirstName, pLastName, address, contactNo, status, dateAdded, lastVisited) 
        VALUES ('$pFirstName', '$pLastName', '$address', '$contactNo', '$status', CURDATE(), CURDATE())";
        $query = $conn->query($sql);

        if($query){
            $out['message'] = "Patient $pFirstName $pLastName Added Successfully";
        }
        else{
            $out['error'] = true;
            $out['message'] = 'Cannot Add Patient';
        }
    }
        
    echo json_encode($out);
?>