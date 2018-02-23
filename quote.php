<?php
	
	$hostname="localhost";
	$username="JoshuaLiang";
	$password="j05huaL1an6";
	$dbname="QuoteRequest";
	$usertable="table1";
	$yourfield = "FirstName";
	
	$dbcon = mysql_connect($hostname,$username, $password); 
	if (!$dbcon) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($dbname);
	$fNameField = $_POST['FirstName'];
	$lNameField = $_POST['LastName'];
	$companyField = $_POST['Company'];
	$phoneField = $_POST['Phone'];
	$faxField = $_POST['Fax'];
	$emailField = $_POST['Email'];
	$update1 = $_POST['updates1'];
	$update2 = $_POST['updates2'];
	$addressField = $_POST['Address'];
	$cityField = $_POST['City'];
	$zipField = $_POST['ZIP'];
	$stateField = $_POST['StateProvince'];
	$countryField = $_POST['country'];
	$statusField = $_POST['Status'];
	$otherStatusField = $_POST['OtherStatus'];
	$productsField = $_POST['Products'];
	
	$sqlinsert = "INSERT INTO table1 (firstname, lastname) VALUES ($fNameField,$lNameField)";
	if (mysqli_query($dbcon, $sqlinsert)){
		echo "1 record added to the database";
	
	} else {
      echo "Error: " . $sqlinsert . "<br>" . mysqli_error($dbcon);
}
mysqli_close($dbcon);

	$to = 'sales@pragmatic1.com'; // <– replace with your address here
   	$subject1 = 'Quote Request';
   	$message = "
First Name: $fNameField
Last Name: $lNameField
Company: $companyField
Phone: $phoneField
Fax: $faxField
Email: $emailField
Updates: $update1 $update2
Address: $addressField
City: $cityField
State/Province: $stateField
Postal/ZIP Code: $zipField
Country: $countryField
Status: $statusField
Other Status(optional): $otherStatusField
Products: $productsField;
";
	
	$subject2 = 'Pragmatic Quote Request Confirmation Email';
	$confirmation = "
We have received your Quote Request Form. We will respond shortly.
DO NOT RESPOND TO THIS EMAIL.
";	
	
	
   	$from = $_POST['Email'];
   	$headers1 = 'From:' . $from;
	$headers2 = 'From:' . 'no-reply@pragmatic1.com';
   	mail($to,$subject1,$message,$headers1);
	mail($from,$subject2,$confirmation,$headers2);

	$theResults = <<<EOD
<html>
<head>
<title>Confirmation Page</title>
<sets http-equiv="Content-Type" content="text/html; charset=iso-6859-1">
<style type="text/css">
body {
background-color: #f1f1f1;
font-family: Verdana, Arial, Helvetien, sans-serif;
font-size: 12px;
font-style: normal;
line-height: normal;
font-weight: normal;
color: #666666;
text-decoration: none;
}
</style>
</head>

<div>
<div align="left">Thank you for your submission! <br>
A confirmation email has been sent to you. If you do not receive one, please email us at sales@pragmatic1.com <br>
Your application will be processed shortly. <br>
Page will be redirected shortly. <br>
</div>
<p><a href=index.html>If it does not redirect, please click here<a/></p>
</div>
</body>
</html>
EOD;
echo "$theResults";
?>
<meta http-equiv="refresh" content="5;url=index.html">