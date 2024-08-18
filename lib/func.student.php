<?php 



function student_add ($vars){
    global $db;

	$ret['status']=0;
	$ret['error']='';
	
	$vars['email']=trim(strtolower($vars['email']));

    $category_query = $db->query("SELECT * FROM Category WHERE CategoryName = ? ", $vars['Category']);
    $category = $category_query->fetchArray();

    $IsActive = $category['IsActive'];
    if ($IsActive ==  0){
    
        $ret['error']="The selected category is not active";
        return $ret;
    }

    $student_query = $db->query("SELECT COUNT(*) as total_students FROM student");
    $student_count = $student_query->fetchArray();
    $total_students = $student_count['total_students'];

    if ($total_students < $category['MaxStudents']) {
        
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
        if (strlen($ret['error'])==0 and strlen($vars['bloodgroup'])==0) {
            $ret['error']=" You need to provide a blood group .";
            return $ret;
        }

        
        if (strlen($ret['error'])==0 and strlen($vars['bday'])==0) {
            $ret['error']=" You need to provide a birth date .";
            return $ret;
        }
        if (strlen($ret['error'])==0 and strlen($vars['PlaceOfBirth'])==0) {
            $ret['error']=" You need to provide a birth place .";
            return $ret;
        }
    
        if (strlen($ret['error'])==0 and strlen($vars['address'])==0) {
            $ret['error']=" You need to provide  an address .";
            return $ret;
        }
    
        if (strlen($ret['error'])==0 and strlen($vars['Stage'])==0) {
            $ret['error']=" You need to provide  a stage .";
            return $ret;
        }
        if (strlen($ret['error'])==0 and strlen($vars['Nationality'])==0) {
            $ret['error']=" You need to provide  a nationality .";
            return $ret;
        }
        if (strlen($ret['error'])==0 and strlen($vars['totalpaid'])==0) {
            $ret['error']=" You need to provide  a totalpaid .";
            return $ret;
        }
         //Total paid validation
         if($vars['totalpaid']<0)
         {
            $ret['error']="the Totalpaid should be posistive!";
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
    if (!(preg_match('/^[a-zA-Z]+$/', $vars['PlaceOfBirth']))) {
        $ret['error']="the place of birth should contains only characters!";
       return $ret;
    }
       
    if($vars['PriviousLicenseCategory']==$vars['Category'])
    {
        $ret['error']="the category is already passed!";
       return $ret;
    }

        if (strlen($ret['error'])>0) return  $ret;

        $items = $db->query("SELECT * FROM student WHERE email=?",$vars['email'] )->fetchAll();
        if (count($items)>0){
                $ret['error']="The student is already added";
                return $ret;
        }

        $IsActive = $category['IsActive'];
    
            $db->query("INSERT INTO student (fname,lname,bday,PlaceOfBirth,gender,address,Nationality,PriviousLicenseCategory,PriviousLicenseDate,phone_num,email,bgroup,CategoryID,Totalpaid,Stage,NumOfAttendantHours) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$vars['fname'],$vars['lname'],$vars['bday'],$vars['PlaceOfBirth'],$vars['gender'],$vars['address'],$vars['Nationality'],$vars['PriviousLicenseCategory'],$vars['PriviousLicenseDate'],$vars['phone'],$vars['email'],$vars['bloodgroup'],$category['CategoryID'],$vars['totalpaid'],$vars['Stage'],0);

        $ret['status']=1;
        $ret['error']='';
        return $ret;
    }else {
        $ret['error']="Capacity limit exceeded! You can not add more students";
        return $ret;
    }
}


function student_delete()
{
    global $db;
    $idstudent= $_GET["idstudent"] ;
    $db->query("DELETE from student WHERE IDS=$idstudent");

}

function student_edit ($vars){
    global $db;
    


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
    if (strlen($ret['error'])==0 and strlen($vars['address'])==0) {
        $ret['error']="You need to provide an address .";
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

    
    if (strlen($ret['error'])==0 and strlen($vars['bday'])==0) {
        $ret['error']=" You need to provide a birth date .";
        return $ret;
    }
    if (strlen($ret['error'])==0 and strlen($vars['bloodgroup'])==0) {
        $ret['error']=" You need to provide  a blood group .";
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
if (!(preg_match('/^[a-zA-Z]+$/', $vars['PlaceOfBirth']))) {
    $ret['error']="the place of birth should contains only characters!";
   return $ret;
}
   
if($vars['PriviousLicenseCategory']==$vars['Category'])
{
    $ret['error']="the category is already passed!";
   return $ret;
}
    if (strlen($ret['error'])>0) return  $ret;
    $idstudent = $_GET["idstudent"] ;

   

    $db->query("UPDATE student SET fname= ? ,  lname=? , bday=?, gender=? ,address=?, phone_num=? ,email= ? ,bgroup= ?,TotalPaid=? ,Stage=? WHERE IDS= ? "
    ,$vars['fname'],$vars['lname'],$vars['bday'],$vars['gender'],$vars['address'],$vars['phone'],$vars['email'],$vars['bloodgroup'],$vars['totalpaid'],$vars['Stage'], $idstudent );

    
	$ret['status']=1;
	$ret['error']='';
	return $ret;



	$ret['status']=1;
	$ret['error']='';
	return $ret;
}







?>