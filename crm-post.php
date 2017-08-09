<?php
define('CRM_PATH', '/crm/configs/import/lead.php');
define('CRM_LOGIN', "LOGIN");
define('CRM_PASS', 'PASS');

function submit(){

    $name =  $_POST['client-name'];
    $phone = $_POST['client-tel'];
    $title = uniqid($name);

    $host = "www.bitrikx24.ru";
    $port = 80;

    $param = $host . CRM_PATH. "?LOGIN=" . CRM_LOGIN
                                ."&PASSWORD=" . CRM_PASS
                                ."&TITLE=" . $title
                                ."&NAME=" . $name
                                ."&PHONE_MOBILE=" . $phone;

    $fp=fsockopen($host,$port, $errno, $errstr, 30);
    if (!$fp)
    {
        echo "$errstr ($errno)<br />\n";
    }
    else
    {
        $out = "GET $param HTTP/1.1\r\n";
        $out .= "Host: $host\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        fclose($fp);
    }
}

submit();

