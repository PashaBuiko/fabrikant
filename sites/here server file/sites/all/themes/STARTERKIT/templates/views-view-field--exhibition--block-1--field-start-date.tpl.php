<?php

    $date = explode(' ',  $row->_field_data['nid']['entity']->field_start_date['und'][0]['value']);
    $day = explode('-',  $date[0])[2];
    $month = switch_month(explode('-',  $date[0])[1]);
    echo '<div class="date" > <span class="day">'.$day.'</span><span class="delimeter"> /</span><span class="month">'.$month .'</span></div>';
?>