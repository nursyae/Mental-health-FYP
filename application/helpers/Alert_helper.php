<?php
defined('BASEPATH') or exit("NO REDIRECT ACCESS SCRIPT ALLOWED");

function alert_message($msg, $type)
{
    $msg = '<div class="alert alert-' . $type . '" role="alert">
                <strong>' . $msg . '</strong>
            </div>';

    return $msg;
}

function print_array($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
