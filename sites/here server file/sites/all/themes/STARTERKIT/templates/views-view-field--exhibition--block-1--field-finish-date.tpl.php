<?php

$date = explode(' ',  $row->_field_data['nid']['entity']->field_finish_date['und'][0]['value']);
$day = explode('-',  $date[0])[2];
$month = switch_month(explode('-',  $date[0])[1]);
echo '<div class="finish-date"><p>Продлится до '.$day.' '.$month .'</p></div>';
?>