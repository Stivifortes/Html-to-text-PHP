<?php
require_once "./vendor/autoload.php";
require "./apartments/config/conexao.php";
require "./apartments/scripts/filter.php";


/* $sql = "SELECT * FROM htmlData";
$resultado = mysqli_query($conexao, $sql); */
$dataEx = "
<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<title>Morabeza Deluxe</title>
</head>
<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
		<div id='wrapper' style='background-color: #f5f5f5; margin: 0; padding: 70px 0 70px 0; -webkit-text-size-adjust: none !important; width: 100%;'>
			<table border='0' cellpadding='0' cellspacing='0' height='100%' width='100%'><tr>
<td align='center' valign='top'>
												<table border='0' cellpadding='0' cellspacing='0' width='600' id='template_container' style='box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important; background-color: #fdfdfd; border: 1px solid #dcdcdc; border-radius: 3px !important;'>
<tr>
<td align='center' valign='top'>
									<!-- Header -->
									<table border='0' cellpadding='0' cellspacing='0' width='600' id='template_header' style='background-color: #eb9b50; border-radius: 3px 3px 0 0 !important; color: #202020; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;'><tr>
<td id='header_wrapper' style='padding: 36px 48px; display: block;'>
												<h1 style='color: #202020; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; text-shadow: 0 1px 0 #efaf73; -webkit-font-smoothing: antialiased;'>Booking Confirmed</h1>
											</td>
										</tr></table>
<!-- End Header -->
</td>
							</tr>
<tr>
<td align='center' valign='top'>
									<!-- Body -->
									<table border='0' cellpadding='0' cellspacing='0' width='600' id='template_body'><tr>
<td valign='top' id='body_content' style='background-color: #fdfdfd;'>
												<!-- Content -->
												<table border='0' cellpadding='20' cellspacing='0' width='100%'><tr>
<td valign='top' style='padding: 48px;'>
															<div id='body_content_inner' style='color: #737373; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%;'>

<p style='margin: 0 0 16px;'>Booking #2612 is confirmed by customer.<br><br><a href='https://morabezadeluxe.com/wp-admin/post.php?post=2612&amp;action=edit' style='color: #eb9b50; font-weight: normal; text-decoration: underline;'>View Booking</a></p>
<h4>Details of booking</h4>
<p style='margin: 0 0 16px;'>Check-in: Março 11, 2021, from 11:00 am<br>Check-out: Março 12, 2021, until 10:00 am<br></p>
<h4>Accommodation #1</h4>
<p style='margin: 0 0 16px;'>Adults: 2<br>Children: 0<br>Accommodation: <a href='https://morabezadeluxe.com/accommodation/bleza/' style='color: #eb9b50; font-weight: normal; text-decoration: underline;'>B.leza</a><br>Accommodation Rate: B.Leza<br><br>Bed Type: </p>
<h4>Additional Services</h4>
<p style='margin: 0 0 16px;'>—</p>
<h4>Customer Info</h4>
<p style='margin: 0 0 16px;'>Name: Stiven Fortes<br>Email: stiven.fortes@devgo.org<br>Phone: 9854444152<br>Note: Testetste</p>
<h4>Total Price:</h4>
<p style='margin: 0 0 16px;'><span class='mphb-price'>99<span class='mphb-currency'>€</span></span></p>
</div>
</td>
</tr></table>
<!-- End Content -->
</td>
</tr></table>
<!-- End Body -->
</td>
</tr>
<tr>
<td align='center' valign='top'>
		<!-- Footer -->
		<table border='0' cellpadding='10' cellspacing='0' width='600' id='template_footer'><tr>
<td valign='top' style='padding: 0; -webkit-border-radius: 6px;'>
					<table border='0' cellpadding='10' cellspacing='0' width='100%'><tr>
<td colspan='2' valign='middle' id='credit' style='padding: 0 48px 48px 48px; -webkit-border-radius: 6px; border: 0; color: #f3c396; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;'>
								<p><a href='https://morabezadeluxe.com' style='color: #eb9b50; font-weight: normal; text-decoration: underline;'>Morabeza Deluxe</a></p>
							</td>
						</tr></table>
</td>
			</tr></table>
<!-- End Footer -->
</td>
</tr>
</table>
</td>
</tr></table>
</div>
</body>
</html>

";





// set array
/* $myArray = array();

if (mysqli_num_rows($resultado) > 0) {
  while ($row = mysqli_fetch_assoc($resultado)) {
    // add each row returned into an array
    $myArray[] = $row; //array inside array
  }
} */


//foreach ($myArray as $value) {
//$html = new \Html2Text\Html2Text($value['post_content']);
$html = new \Html2Text\Html2Text($dataEx);
$text = $html->getText();

/* array_push($idPerRaw, $value['id']);
  //echo $value['post_content'];
  echo "<br/>";
  print_r($idPerRaw); */
//echo $idPerRaw . "<br/>";
echo "$text <br/><br/>";

$retrivedCheckIn = searchCheckIn($text);
$retrivedCheckOut = searchCheckOut($text);
$parsedCheckIn = parseStringToDate($retrivedCheckIn);
$parsedCheckOut = parseStringToDate($retrivedCheckOut);

$retrivedAccomodation = searchAcommodation($text);
$retrivedPrice = searchPrice($text);
$retrivedCustomer = searchCustomer($text);
$retrivedAccommId = mapAccomodation($retrivedAccomodation);


echo "<br/>";
echo "Check-in: $parsedCheckIn <br/>";
echo "Check-Out: $parsedCheckOut <br/>";
echo "<br/>";
echo "<br/>";
echo "Check-in:" . "" .  gettype($parsedCheckIn) . "<br/>";
echo "Check-Out:" . "" .  gettype($parsedCheckOut) . " <br/>";
echo "Accomodation:" . "" .  gettype($retrivedAccomodation) . " <br/>";
echo "Price:" . "" .  gettype($retrivedPrice) . " <br/>";
echo "Customer:" . "" .  gettype($retrivedCustomer) . " <br/>";
echo "<br/>";

  //Insert The Retrived Data into the Bookings Table
  /* $sqlInsert = "INSERT INTO `bookings` 
  (`accommodation`, `check_in`, `check_out`, `price`, `customer`, `accomId`)
    VALUES ('$retrivedAccomodation', '$parsedCheckIn', '$parsedCheckOut', '$retrivedPrice', '$retrivedCustomer', '$retrivedAccommId')";

  mysqli_query($conexao, $sqlInsert) or die("Failed to insert searched data");

  echo "<br/>";
  echo "Check-in: $parsedCheckIn <br/>";
  echo "Check-Out: $parsedCheckOut <br/>";
  echo "Accomodation: $retrivedAccomodation <br/>";
  echo "Price: $retrivedPrice <br/>";
  echo "Customer: $retrivedCustomer <br/>";
  echo "<br/>";

  //Delete the inserted row
  $sqlDeleteRaw = "DELETE FROM htmlData 
                    WHERE id = {$value['id']}";


  mysqli_query($conexao, $sqlDeleteRaw) or die("Failed to Delete Raw"); */
//}
