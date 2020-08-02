<?php

require_once 'vendor/autoload.php';
ob_start();
?>

<style>

.oi{ 
    background: red;
    width: 200px;
}
</style>

<div class="oi">oi</div>



<?php
$html = ob_get_contents();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4','margin_left' => 10,'margin_right' => 10,'margin_top' => 10,'margin_bottom' => 10,'margin_header' => 0,'margin_footer' => 10,'orientation' => 'L']);
$mpdf->WriteHTML($html);

$mpdf->Output();