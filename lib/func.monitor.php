<?php 



function monitor_add ($vars){
    global $db;

	$ret['status']=0;
	$ret['error']='';
	
	$vars['email']=trim(strtolower($vars['email']));

    $category_query = $db->query("SELECT * FROM Category WHERE CategoryName = ?", $vars['Category']);
    $category = $category_query->fetchArray();
    $IsActive = $category['IsActive'];

    if ($IsActive ==  0){
        $ret['error']="The selected category is not active";
		return $ret;
    }
	
    if (strlen($ret['error'])==0 and strlen($vars['fname'])==0) {
        $ret['error']="You need to provide a first name .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['lname'])==0) {
        $ret['error']="You need to provide a last name .";
        return $ret;
    }


    if (strlen($ret['error'])==0 and strlen($vars['email'])==0) {
        $ret['error']=" You need to provide an email .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['phone'])==0) {
        $ret['error']=" You need to provide a phone number .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['gender'])==0) {
        $ret['error']=" You need to provide a gender .";
        return $ret;
    }

    
    if (strlen($ret['error'])==0 and strlen($vars['age'])==0) {
        $ret['error']=" You need to provide an age .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['expd'])==0) {
        $ret['error']=" You need to your card expiration date  .";
        return $ret;
    }
    if (strlen($ret['error'])==0 and strlen($vars['address'])==0) {
        $ret['error']=" You need to your address .";
        return $ret;
    }
    if (strlen($ret['error'])==0 and strlen($vars['exp'])==0) {
        $ret['error']=" You need to provide your experience years .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['bgroup'])==0) {
        $ret['error']=" You need to provide your blood group .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['pass'])==0) {
        $ret['error']=" You need to provide a password for the monitor  .";
        return $ret;
    }
     //password validation

	if (!strlen($vars['pass']) >= 8 || !preg_match('/[A-Z]/', $vars['pass']) || !preg_match('/\d/', $vars['pass']))
	{
		$ret['error']="the password should contains at least 8 characters!";
		return $ret;
	}
     //experience validation
     if($vars['exp']<0)
     {
        $ret['error']="the experience  should be posistive!";
		return $ret;
     }
     if($vars['exp']>$vars['age'])
     {
        $ret['error']="the experience  should be less than the age!";
		return $ret;
     }
    //age validation
    if(($vars['age']<18 or $vars['age']>80))
    {
       $ret['error']="the age must be between 18 and 80 years!";
       return $ret;
    }
    //first and last name validation
    
    if (!(preg_match('/^[a-zA-Z]+$/', $vars['fname']))) {
        $ret['error']="the firstname should contains only characters!";
       return $ret;
    }

    if (!(preg_match('/^[a-zA-Z]+$/', $vars['lname']))) {
        $ret['error']="the lastname should contains only characters!";
       return $ret;
    }
       
	//email validation

	if (!filter_var($vars['email'], FILTER_VALIDATE_EMAIL))
	{
		$ret['error']="email should contains the @ symbol!";
		return $ret;
	}
    //phone number validation

    // Remove any non-digit characters from the phone number
    $phoneNumber = preg_replace('/\D/', '', $vars['phone']);

    // Check if the phone number has exactly 10 digits
    if (!(strlen($phoneNumber) === 10))
	{
     
		$ret['error']="the phone number should contain 10 digits!";
		return $ret;
	}
    if (!(preg_match('/^(06|05|07)/', $vars['phone']))) {
        $ret['error']="the phone number should start with 06 07 05 !";
		return $ret;
    }

    //hashing the password

	$hashed_password= md5($vars['pass']);

    if (strlen($ret['error'])>0) return  $ret;

    
	$items = $db->query("SELECT * FROM monitor WHERE email=?",$vars['email'] )->fetchAll();
	if (count($items)>0){
	        $ret['error']="The monitor is already added";
	        return $ret;
	}
 
        $categoryId = $category['CategoryID'];
        
        $db->query("INSERT INTO monitor (CategoryID, fname, lname, email, phone_num, gender, age, address, bgroup, exp, exp_date, pass) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $categoryId, $vars['fname'], $vars['lname'], $vars['email'], $vars['phone'], $vars['gender'], $vars['age'], $vars['address'], $vars['bgroup'], $vars['exp'], $vars['expd'], $hashed_password);

    $monitor_query = $db->query("SELECT COUNT(*) as total_monitors FROM monitor WHERE CategoryId=?",$categoryId);
    $monitor_count = $monitor_query->fetchArray();
    $total_monitors = $monitor_count['total_monitors'];

    $vehicle_query = $db->query("SELECT COUNT(*) as total_vehicles FROM vehicle  WHERE CategoryId=?",$categoryId);
    $vehicle_count = $vehicle_query->fetchArray();
    $total_vehicles = $vehicle_count['total_vehicles'];
    if ($total_monitors == 1 && $total_vehicles >= 1){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 60 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 15 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_monitors == 2 && $total_vehicles >= 2){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 80 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 25 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_monitors > 2 && $total_vehicles > 2){
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

function monitor_edit ($vars){
    global $db;

    print_r($vars);

	$ret['status']=0;
	$ret['error']='';
	
	$vars['email']=trim(strtolower($vars['email']));
	
    if (strlen($ret['error'])==0 and strlen($vars['fname'])==0) {
        $ret['error']="You need to provide a first name .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['lname'])==0) {
        $ret['error']="You need to provide a last name .";
        return $ret;
    }


    if (strlen($ret['error'])==0 and strlen($vars['email'])==0) {
        $ret['error']=" You need to provide an email .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['phone'])==0) {
        $ret['error']=" You need to provide a phone number .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['gender'])==0) {
        $ret['error']=" You need to provide a gender .";
        return $ret;
    }

    
    if (strlen($ret['error'])==0 and strlen($vars['age'])==0) {
        $ret['error']=" You need to provide an age .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['expd'])==0) {
        $ret['error']=" You need to your card expiration date  .";
        return $ret;
    }
    if (strlen($ret['error'])==0 and strlen($vars['address'])==0) {
        $ret['error']=" You need to your address  .";
        return $ret;
    }
    
    if (strlen($ret['error'])==0 and strlen($vars['exp'])==0) {
        $ret['error']=" You need to provide your experience years .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['bgroup'])==0) {
        $ret['error']=" You need to provide your blood group .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['pass'])==0) {
        $ret['error']=" You need to provide a password for the monitor  .";
        return $ret;
    }

    if (strlen($ret['error'])>0) return  $ret;
    $idm = $_GET["idm"] ;

    //password validation

	if (!strlen($vars['pass']) >= 8 || !preg_match('/[A-Z]/', $vars['pass']) || !preg_match('/\d/', $vars['pass']))
	{
		$ret['error']="the password should contains at least 8 characters!";
		return $ret;
	}

	//email validation

	if (!filter_var($vars['email'], FILTER_VALIDATE_EMAIL))
	{
		$ret['error']="email should contains the @ symbol!";
		return $ret;
	}
     //experience validation
     if($vars['expd']<0)
     {
        $ret['error']="the experience date should be posistive!";
		return $ret;
     }
    //age validation
    if($vars['age']<18 or $vars['age']>80)    {
       $ret['error']="the age must be between 18 and 80 years!";
       return $ret;
    }
    //first and last name validation
    
    if (!(preg_match('/^[a-zA-Z]+$/', $vars['fname']))) {
        $ret['error']="the firstname should contains only characters!";
       return $ret;
    }

    if (!(preg_match('/^[a-zA-Z]+$/', $vars['lname']))) {
        $ret['error']="the lastname should contains only characters!";
       return $ret;
    }
        // Remove any non-digit characters from the phone number
    $phoneNumber = preg_replace('/\D/', '', $vars['phone']);

    // Check if the phone number has exactly 10 digits
    if (!(strlen($phoneNumber) === 10))
	{
     
		$ret['error']="the phone number should contain 10 digits!";
		return $ret;
	}
    if (!(preg_match('/^(06|05|07)/', $vars['phone']))) {
        $ret['error']="the phone number should start with 06 07 05 !";
		return $ret;
    }
    //hashing the password

	$hashed_password= md5($vars['pass']);

    

    $db->query("UPDATE monitor SET fname= ? ,  lname=? , email= ?, phone_num=? , gender=?, age=? ,address=?,bgroup=? , exp=? , exp_date=? , pass=? WHERE IDM= ? ",$vars['fname'],$vars['lname'],$vars['email'],$vars['phone'],$vars['gender'],$vars['age'],$vars['address'],$vars['bgroup'],$vars['exp'], $vars['expd'],$hashed_password,  $idm );

    
	$ret['status']=1;
	$ret['error']='';
	return $ret;
}

function monitor_delete (){

    global $db;
    $idmonitor = $_GET["idmonitor"] ;

    
    $category_query = $db->query("SELECT * FROM monitor WHERE IDM=?",$idmonitor);
    $category = $category_query->fetchArray();
    $categoryId = $category['CategoryID'];

    $db->query("DELETE FROM monitor WHERE IDM = ?", $idmonitor);

    $monitor_query = $db->query("SELECT COUNT(*) as total_monitors FROM monitor WHERE CategoryId=?",$categoryId);
    $monitor_count = $monitor_query->fetchArray();
    $total_monitors = $monitor_count['total_monitors'];

    $vehicle_query = $db->query("SELECT COUNT(*) as total_vehicles FROM vehicle  WHERE CategoryId=?",$categoryId);
    $vehicle_count = $vehicle_query->fetchArray();
    $total_vehicles = $vehicle_count['total_vehicles'];
    if ($total_monitors == 0 && $total_vehicles >= 0){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 0 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 0 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_monitors == 1 && $total_vehicles >= 1){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 60 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 15 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_monitors == 2 && $total_vehicles >= 2){
        // Update the maximum capacity of the entered category to 60
        $db->query("UPDATE Category SET MaxStudents = 80 WHERE CategoryID = ?", $categoryId);
        $db->query("UPDATE Category SET MaxStudentExam = 25 WHERE CategoryID = ?", $categoryId);
    }
    if ($total_monitors > 2 && $total_vehicles > 2){
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