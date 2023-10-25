<?php

$zipcodeAjax = trim(filter_input(INPUT_POST, 'zipcodeAjax', FILTER_SANITIZE_NUMBER_INT));

$ch = curl_init("https://apicarto.ign.fr/api/codes-postaux/communes/$zipcodeAjax");

curl_exec($ch);

curl_close($ch);
?>