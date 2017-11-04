<?php
/**
 * Created by PhpStorm.
 * User: Pasha
 * Date: 04.11.2017
 * Time: 12:26
 */

function company_admin_views_query_alter(&$view, &$query) {
    dpm($view->query);
    if ($view->name == 'company_category') {

        //to find out what the fieldname ist: use devel and add your desired field as
        //first filter ( =>orderby[0]). install devel and uncomment the next line


        $view->query->orderby[0]['field'] = "CASE FIELD_NAME WHEN 'apple' THEN 1 WHEN 'zebra' THEN 2 WHEN 'banna' THEN 3 ELSE 4 END";
    }
}
?>