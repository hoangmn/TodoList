<?php
/**
 * Created by PhpStorm.
 * User: ngochoangmai
 * Date: 2/3/20
 * Time: 2:40 PM
 */

function getStatusLabel($id){
    switch ($id){
        case 0:
            return 'Doing';
            break;
        case 1:
            return 'To do';
            break;
        default:
            return 'Done';
    }
}