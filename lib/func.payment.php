<?php 

function add_payment($vars) {
    global $db;

    $ret['status'] = 0;
    $ret['error'] = '';

    // Check if a valid student first name and last name are provided
    if (empty($vars['fname']) || empty($vars['lname'])) {
        $ret['error'] = "You need to provide a first name and last name.";
        return $ret;
    }

    // Check if the student exists in the database
    $student_query = $db->query("SELECT * FROM student WHERE fname = ? AND lname = ?", $vars['fname'], $vars['lname']);
    $student = $student_query->fetchArray();

    if (!$student) {
        $ret['error'] = "The student with the provided first name and last name does not exist.";
        return $ret;
    }

    // Check if a valid payment date is provided
    if (empty($vars['PaymentDate'])) {
        $ret['error'] = "You need to provide a payment date.";
        return $ret;
    }

    // Check if a valid payment amount is provided
    if (empty($vars['PaymentAmount']) || !is_numeric($vars['PaymentAmount']) || $vars['PaymentAmount'] < 0) {
        $ret['error'] = "You need to provide a valid payment amount.";
        return $ret;
    }
    
    // Calculate the remaining amount
    $paid_amount = $vars['PaymentAmount'];
    $remaining_amount = $student['TotalPaid'] - $vars['PaymentAmount'];
    
    // Get the next payment date
    $next_payment_date = $vars['NextPaymentDate'];

    // Check if the payment is overdue or same as payment date
    $rowStyle = null;
    if (strtotime($next_payment_date) < strtotime($vars['PaymentDate'])) {
        $rowStyle = 'pink';
    } elseif (strtotime($next_payment_date) < strtotime('today')) {
        $rowStyle = 'red';
    }
    if(strtotime($next_payment_date)<=strtotime($vars['PaymentDate'])){
        $ret['error'] = "The next payment date should be after the payment date";
        return $ret;
    }
    // Insert the payment record into the PaymentHistory table
    $db->query("INSERT INTO PaymentHistory (StudentID, PaymentDate, PaymentAmount, RemainingAmount, PaidAmount, NextPaymentDate, RowStyle) 
    VALUES (?, ?, ?, ?, ?, ?, ?)", $student['IDS'], $vars['PaymentDate'], $vars['PaymentAmount'], $remaining_amount, $paid_amount, $next_payment_date, $rowStyle);

    // Update the PaidAmount in the PaymentHistory table
    $db->query("UPDATE PaymentHistory SET PaidAmount = ?, NextPaymentDate = ? WHERE StudentID = ?", $paid_amount, $next_payment_date, $student['IDS']);

    $ret['status'] = 1;
    $ret['error'] = '';
    return $ret;
}

function edit_payment($vars) {
    global $db;
   
    $ret['status'] = 0;
    $ret['error'] = '';

    // Check if a valid payment amount is provided
    if (empty($vars['PaymentAmount']) || !is_numeric($vars['PaymentAmount']) || $vars['PaymentAmount'] < 0) {
        $ret['error'] = "You need to provide a valid payment amount.";
        return $ret;
    }

    // Check if a valid payment date is provided
    if (empty($vars['PaymentDate'])) {
        $ret['error'] = "You need to provide a payment date.";
        return $ret;
    }

    // Get the current payment record for the student
    $idpayment = $_GET["idpayment"];
    $payment_query = $db->query('SELECT * FROM PaymentHistory WHERE PaymentID = ?', $idpayment)->fetchAll();
    
    if (!$payment_query) {
        $ret['error'] = $_GET["idpayment"];
        return $ret;
    }

    // Get the current remaining amount, paid amount, and next payment date
    $current_remaining_amount = $payment_query[0]['RemainingAmount'];
    $current_paid_amount = $payment_query[0]['PaidAmount'];
    $next_payment_date = $payment_query[0]['NextPaymentDate'];

    // Calculate the new remaining amount and paid amount
    $new_remaining_amount = $current_remaining_amount - $vars['PaymentAmount'];
    $new_paid_amount = $current_paid_amount + $vars['PaymentAmount'];

    // Check if the payment is overdue or same as payment date
    $rowStyle = null;
    if (strtotime($next_payment_date) < strtotime('today')) {
        $rowStyle = 'red';
    } elseif (strtotime($next_payment_date) < strtotime($vars['PaymentDate'])) {
        $rowStyle = 'pink';
    }
   
    // Update the payment record in the PaymentHistory table
    $db->query("UPDATE PaymentHistory SET PaymentDate = ?, PaymentAmount = ?, PaidAmount = ?, RemainingAmount = ?, NextPaymentDate = ?, RowStyle = ? WHERE PaymentID = ?",
        $vars['PaymentDate'], $vars['PaymentAmount'], $new_paid_amount, $new_remaining_amount, $vars['NextPaymentDate'], $rowStyle, $idpayment);

    $ret['status'] = 1;
    $ret['error'] = '';
    return $ret;
}





?>