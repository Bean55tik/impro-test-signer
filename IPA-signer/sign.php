<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$ipa = $_POST['ipa'];
$p12 = $_POST['p12'];
$mobileprovision = $_POST['mobileprovision'];
$password = $_POST['pass'];

// Upload IPA
$curl = curl_init('https://api.starfiles.co/upload/upload_file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
curl_setopt($curl, CURLOPT_POSTFIELDS, array('upload' => $ipa));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curl);
$output_decoded = json_decode($output, true);
if(!isset($output_decoded['file']))
    die('Failed ' . __LINE__ . ': ' . $output);
$ipa_output = $output_decoded['file'];
curl_close($curl);

// Upload P12
$curl = curl_init('https://api.starfiles.co/upload/upload_file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
curl_setopt($curl, CURLOPT_POSTFIELDS, array('upload' => $p12));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curl);
$output_decoded = json_decode($output, true);
if(!isset($output_decoded['file']))
    die('Failed ' . __LINE__ . ': ' . $output);
$p12_output = $output_decoded['file'];
curl_close($curl);

// Upload Mobileprovision
$curl = curl_init('https://api.starfiles.co/upload/upload_file');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
curl_setopt($curl, CURLOPT_POSTFIELDS, array('upload' => $mobileprovision));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($curl);
$output_decoded = json_decode($output, true);
if(!isset($output_decoded['file']))
    die('Failed ' . __LINE__ . ': ' . $output);
$mobileprovision_output = $output_decoded['file'];
curl_close($curl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta property="og:title" content="BeanCentral">
  <meta property="og:url" content="https://bean55tik.github.io/Bean-Central.Bean.Main/HomePage/index.html">
  <meta property="og:description" content="BeanCentral is a place to get ipa files, p12 certificates, and you can install your ipa file with our ipa signer">
  <meta property="og:image" content="https://bean55tik.github.io/Bean-Central.Bean.Main/Images/beancentral-high-resolution-logo.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../HomePage/style.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
  <script src="https://kit.fontawesome.com/a9e4513620.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="../Images/mug-hot-solid.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Comic+Neue&family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <title>BeanCentral</title>
</head>
<body>
  <div class="main">
     <div class="navbar">
        <a class="burger"><i class="fa-solid fa-bars"></i></a>
        <div class="icon">
        <h2 class="title">BeanCentral <i id="logo" class="fa-solid fa-mug-hot"></i></h2>
        <img src="/Images/mug-hot-solid.png" alt="" class="img">
     </div>
      <ul class="dropdown">
        <li><a href="../HomePage/index.html">HOME <i class="fa-solid fa-house"></i></a></li>
        <li><a href="../Discord/index.html">DISCORD <i class="fa-brands fa-discord"></i></a></li>
        <li><a href="../Certificates/index.html">CERTIFICATES <i class="fa-solid fa-certificate"></i></a></li>
        <li><a href="../IPA files/index.html">IPA FILES <i class="fa-solid fa-file-archive"></i></a></li>
      </ul>
      <form method="get" action="end-sign.php" enctype="multipart/form-data" id="uploadForm" name="uploadForm">
      <h1>Retype These Numbers:</h1>
        <h2> IPA: <?php echo ($ipa_output);?></h2>
        <h2><?php echo ($p12_output);?></h2>
        <h2><?php echo ($mobileprovision_output);?></h2>
        <h2><?php echo ($password);?></h2>
        <input type="text" name="ipa" placeholder="ipa" required>
        <input type="text" name="p12" placeholder="p12">
        <input type="text" name="mobile" placeholder="mobileprovision" required>
        <input type="text" name="pass" placeholder="password" required>
        <button>Sign</button>
      </form>
    </div>
  <script src="../HomePage/main.js"></script>
</body>
</html>