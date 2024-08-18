<?php



function owner_process_register($vars){
	global $db;
	
	$ret['status']=0;
	$ret['error']='';
	//validation of filling all the blanks

	if (strlen($ret['error'])==0 and strlen($vars['firstname'])==0) {
        $ret['error']="You need to provide your first name .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['password'])==0) {
        $ret['error']="You need to provide a password .";
        return $ret;
    }


    if (strlen($ret['error'])==0 and strlen($vars['lastname'])==0) {
        $ret['error']=" You need to provide your last name .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['gender'])==0) {
        $ret['error']=" You need to provide a gender .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['phone_num'])==0) {
        $ret['error']=" You need to provide a phone number .";
        return $ret;
    }

    
    if (strlen($ret['error'])==0 and strlen($vars['state'])==0) {
        $ret['error']=" You need to provide your willaya .";
        return $ret;
    }

    if (strlen($ret['error'])==0 and strlen($vars['drivingschoolname'])==0) {
        $ret['error']=" You need to your driving school name  .";
        return $ret;
    }
    if (strlen($ret['error'])==0 and strlen($vars['address'])==0) {
        $ret['error']=" You need to your address .";
        return $ret;
    }
    if (strlen($ret['error'])==0 and strlen($vars['ownername'])==0) {
        $ret['error']=" You need to provide your owner name .";
        return $ret;
    }



  
    if (strlen($ret['error'])>0)return  $ret;

    //search for it in the database ?

	$items = $db->query("SELECT * FROM theowner" )->fetchAll();
	if (count($items)>0){
	        $ret['error']="The driving school is already registered";
	        return $ret;
	}
   
	//email validation

	if (!filter_var($vars['email'], FILTER_VALIDATE_EMAIL))
	{
		$ret['error']="email should contains the @ symbol!";
		return $ret;
	}


	//password validation

	if (!strlen($vars['password']) >= 8 || !preg_match('/[A-Z]/', $vars['password']) || !preg_match('/\d/', $vars['password']))
	{
		$ret['error']="the password should contains at least 8 characters,an uppercase letter, a digit!";
		return $ret;
	}
    if(!($vars['password']==$vars['confirm_password']))
    {
        $ret['error']="the password confirmation and the password does not match";
        return $ret;
    }

    //phone validation
	// Remove any non-digit characters from the phone number
    $phoneNumber = preg_replace('/\D/', '', $vars['phone_num']);

    // Check if the phone number has exactly 10 digits
    if (!(strlen($phoneNumber) === 10))
	{
     
		$ret['error']="the phone number should contain 10 digits!";
		return $ret;
	}
     
	//hashing the password

	$hashed_password= md5($vars['password']);

	
    $db->query("INSERT INTO theowner (fname, lname,email,pass,phone_num,gender,thestate) VALUES ( ?,?,?,?,?,?,?) ", $vars['firstname'], $vars['lastname'], $vars['email'],  $hashed_password,  $vars['phone_num'],$vars['gender'],$vars['state']);
				
	

	$db->query("INSERT INTO driving_school (Name,owner,id,address)  VALUES ( ?,?,?,?)", $vars['drivingschoolname'], $vars['ownername'], $vars['fiscalid'],$vars['address']);

	//log the user directly by setting their cookies..
	setcookie("app_email", $vars['email'], time()+(3600*24),"/");
	setcookie("app_pass", $hashed_password , time()+(3600*24),"/");
	setcookie("isowner", true, time()+(3600*24),"/");
	
	$ret['status']=1;
	$ret['error']='';
	return $ret;
}

?>





