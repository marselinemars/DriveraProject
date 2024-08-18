<?php 



function add_vehicle($vars){
    global $db;

    $ret['status'] = 0;
    $ret['error'] = '';



    // Check for required form fields
    if (strlen($vars['Make']) == 0) {
        $ret['error'] = "You need to provide a make.";
        return $ret;
    }

    if (strlen($vars['Model']) == 0) {
        $ret['error'] = "You need to provide a model.";
        return $ret;
    }


    if (strlen($vars['LicenseplateNumber']) == 0) {
        $ret['error'] = "You need to provide a License plate Number.";
        return $ret;
    } else if (!validatePlateNumber($vars['LicenseplateNumber'])) {
        $ret['error'] = "Please enter a valid license plate number.";
        return $ret;
    } 

    if (strlen($vars['InsurancePolicyNumber']) == 0) {
        $ret['error'] = "You need to provide an Insurance Policy Number.";
        return $ret;
    } 

    if (strlen($vars['TechnicalInspectionExpiryDate']) == 0) {
        $ret['error'] = "You need to provide a Technical Inspection Expiry Date.";
        return $ret;
    }

    $category_query = $db->query("SELECT * FROM Category WHERE CategoryName = ? ", $vars['Category']);
    $category = $category_query->fetchArray();

    $categoryId = $category['CategoryID'];
    $IsActive = $category['IsActive'];
    if ($IsActive ==  0){
        $ret['error']="The selected category is not active";
		return $ret;
    }
      

    $items = $db->query("SELECT * FROM vehicle WHERE LicenseplateNum=?",$vars['LicenseplateNumber'], )->fetchAll();
	if (count($items)>0){
	        $ret['error']="The vehicle is already added";
	        return $ret;
	}
    $items = $db->query("SELECT * FROM vehicle WHERE InsurancePolicyNumber=?",$vars['InsurancePolicyNumber'] )->fetchAll();
	if (count($items)>0){
	        $ret['error']="The vehicle is already added";
	        return $ret;
	}

         // Insert the vehicle data into the database
        $db->query("INSERT INTO Vehicle (CategoryID, make, model, LicenseplateNum, InsurancePolicyNumber, InsuranceExpiryDate, TechnicalInspectionExpiryDate) 
        VALUES ( ?, ?, ?, ?, ?, ?,?)",$category['CategoryID'], $vars['Make'], $vars['Model'], $vars['LicenseplateNumber'], $vars['InsurancePolicyNumber'], $vars['InsuranceExpiryDate'], $vars['TechnicalInspectionExpiryDate']);

        



    $monitor_query = $db->query("SELECT COUNT(*) as total_monitors FROM monitor WHERE CategoryId=?",$categoryId);
    $monitor_count = $monitor_query->fetchArray();
    $total_monitors = $monitor_count['total_monitors'];

    $vehicle_query = $db->query("SELECT COUNT(*) as total_vehicles FROM vehicle  WHERE CategoryId=?",$categoryId);
    $vehicle_count = $vehicle_query->fetchArray();
    $total_vehicles = $vehicle_count['total_vehicles'];
    if ($total_vehicles == 1 && $total_monitors >= 1){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 60 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 15 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_vehicles == 2 && $total_monitors >= 2){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 80 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 25 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_vehicles > 2 && $total_monitors > 2) {
        $prevMaxStudentQuery = $db->query("SELECT * FROM Category WHERE CategoryID = ?", $categoryId);
        $previous =$prevMaxStudentQuery->fetchArray();
        $prevMaxStudent =  $previous['MaxStudents'];
        $prevMaxStudentExam =  $previous['MaxStudentExam'];
        
        // Update the maximum capacity of the entered category
        $db->query("UPDATE Category SET MaxStudents = ? WHERE CategoryID = ?", $prevMaxStudent + 10, $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = ? WHERE CategoryID = ?", $prevMaxStudentExam + 5, $categoryId);
    }
    

    $ret['status'] = 1;
    $ret['error'] = '';
    return $ret;


}



function edit_vehicle ($vars){
    global $db;

    print_r($vars);

	$ret['status']=0;
	$ret['error']='';

    $idv = $_GET["idvehicle"] ;
    if (strlen($vars['LicenseplateNumber']) == 0) {
        $ret['error'] = "You need to provide a License plate Number.";
        return $ret;
    } else if (!validatePlateNumber($vars['LicenseplateNumber'])) {
        $ret['error'] = "Please enter a valid license plate number.";
        return $ret;
    } 

    if (strlen($vars['InsurancePolicyNumber']) == 0) {
        $ret['error'] = "You need to provide an Insurance Policy Number.";
        return $ret;
    }   
    
	
    $db->query("UPDATE Vehicle SET   make=? , model= ?, LicenseplateNum=? , InsurancePolicyNumber=?, InsuranceExpiryDate=? ,TechnicalInspectionExpiryDate=? 
     WHERE vehicleID= ? ",$vars['Make'],$vars['Model'],$vars['LicenseplateNumber'],$vars['InsurancePolicyNumber'],$vars['InsuranceExpiryDate'],$vars['TechnicalInspectionExpiryDate'], $idv );
    
	$ret['status']=1;
	$ret['error']='';
	return $ret;
}

function vehicle_delete (){

    global $db;
    $idvehicle = $_GET["idvehicle"] ;

    $category_query = $db->query("SELECT * FROM vehicle where VehicleID=?",$idvehicle);
    $category = $category_query->fetchArray();
    $categoryId = $category['CategoryID'];

    $db->query("DELETE from vehicle WHERE VehicleID=?",$idvehicle);

    $monitor_query = $db->query("SELECT COUNT(*) as total_monitors FROM monitor WHERE CategoryId=?",$categoryId);
    $monitor_count = $monitor_query->fetchArray();
    $total_monitors = $monitor_count['total_monitors'];

    $vehicle_query = $db->query("SELECT COUNT(*) as total_vehicles FROM vehicle  WHERE CategoryId=?",$categoryId);
    $vehicle_count = $vehicle_query->fetchArray();
    $total_vehicles = $vehicle_count['total_vehicles'];
    if ($total_vehicles == 0 && $total_monitors >= 0){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 0 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 0 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_vehicles == 1 && $total_monitors >= 1){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 60 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 15 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_vehicles == 2 && $total_monitors >= 2){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 80 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 25 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_vehicles > 2 && $total_monitors > 2) {
        $prevMaxStudentQuery = $db->query("SELECT * FROM Category WHERE CategoryID = ?", $categoryId);
        $previous =$prevMaxStudentQuery->fetchArray();
        $prevMaxStudent =  $previous['MaxStudents'];
        $prevMaxStudentExam =  $previous['MaxStudentExam'];
        
        // Update the maximum capacity of the entered category
        $db->query("UPDATE Category SET MaxStudents = ? WHERE CategoryID = ?", $prevMaxStudent - 10, $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = ? WHERE CategoryID = ?", $prevMaxStudentExam - 5, $categoryId);
    }



}



?>