<?php

$units = $_GET['units'];
$billAmount = 0;

if ($units <= 50) {
    $billAmount = $units * 3.5;
} elseif ($units <= 150) {
    $billAmount = 50 * 3.5 + ($units - 50) * 4;
} elseif ($units <= 250) {
    $billAmount = 50 * 3.5 + 100 * 4 + ($units - 150) * 5.2;
} else {
    $billAmount = 50 * 3.5 + 100 * 4 + 100 * 5.2 + ($units - 250) * 6.5;
}

echo json_encode(array('billAmount' => number_format($billAmount, 2)));

?>
