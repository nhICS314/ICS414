<?php
session_start();

$pageTitle = 'MyTimer';

if (!empty($title)){
    $pageTitle = $title;
}

?>
<html>
<head>
    <title><?=$pageTitle?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="mainPage.css" />

</head>

<body>
<?php include('menu.php');

// if (!empty($title)) {
//     echo '<h1>' . $title . '</h1>';
// }

?>
