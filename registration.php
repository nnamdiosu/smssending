
<?php
/* I'm assumming you already have created a form to retrive the values from the user. o this will just focus only on sending the code to the db 
and sending the sms to their phones
*/

//im asumming this are the filds reguired in the login.Add yours to it

$fname = mysqli_escape_string($conn, $_POST['fname']);// firstname
$lname = mysqli_escape_string($conn, $_POST['lname']);// last name
$email = mysqli_escape_string($conn, $_POST['email']);// email address
$pnumber = mysqli_escape_string($conn, $_POST['pnumber']); // phone number 

/* Now the sms sending. ebulk sms requires the following parameters
1. username you used to register on the site
2. apikey : gotten from the site once you login ij. call their customer care to show you if you cant get it
3. sender username
4. message to be sent
5. flash
6. the receipents of the message

Ensure that all this values are intalized. then you are good to go.
*/

$username = "xyz@gmail.com";
$api = "33dc6f13a567b9a7104h484h4hh39a5";
$sender = "Example Sender"; // Ensure Sender Name Has The Minimum Amount Of Characters Required
$message = "This Is An Exaple Message You'd Like To Send";
$numbers = "07035082751,08166009839"; // Phone Numbers Are Seperated By A Delimiter e.g comma or spaces

// then write code to send to the database as usual.....after that it's time to send the sms message to the person's number
/* This is the api from ebulksms.com

http://api.ebulksms.com:8080/sendsms?username=xyz@gmail.com&apikey=33dc6f13a567b9a7104h484h4hh39a5&sender=$sender&messagetext=$message&flash=0&recipients=$numbers
but we cant send it like that . we have to use a php methos called file_get_contents() to encase the api. so here goes...
*/


file_get_contents("http://api.ebulksms.com:8080/sendsms?username=" . $username . "&apikey=" . $api . "&sender=" $sender . "&messagetext=" . $message . "&flash=0&recipients=" . $numbers );


// Once its sent, we need to send a visible message for the user to know using javascript alert function

?>

 <script type="text/javascript">
alert("Registration successfull, text messge sent to you.");
window.location="sendsms.php"; // redirect the user to some page
</script>


// Thats all :) simple. Thanks for using/checking in
