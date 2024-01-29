<?php
$ipa_final = $_GET['ipa'];
$p12_final = $_GET['p12'];
$mobile_final = $_GET['mobile'];
$pass_final = $_GET['pass'];

$response = json_decode(file_get_contents('https://sign.starfiles.co?ipa=' . $ipa_final .'&p12=' . $p12_final . '&mobileprovision=' . $mobile_final . '&password=' . $pass_final), true);
if($response['status'])
    header('Location: ' . $response['url']);
else
    echo 'Signing Failed';
?>