<?php
function basicLog($str, $extraLine = false) {
  $log_path = __DIR__."/wslog.txt";
  file_put_contents(
    $log_path,
    $str." - ".date('Y-m-d H:i:s').PHP_EOL.' - '.$_SERVER['REMOTE_ADDR'].($extraLine ? PHP_EOL : ''),
    FILE_APPEND
  );
  if(filesize($log_path)  > 1024*100) {//backups log each 100kb
    rename($log_path, __DIR__."/wslog".date('Y-m-d H:i:s')."txt");
  }
}


if (!function_exists('getallheaders'))  {
    function getallheaders2() {
      $arh = array();
      $rx_http = '/\AHTTP_/';
      foreach($_SERVER as $key => $val) {
        if( preg_match($rx_http, $key) ) {
          $arh_key = preg_replace($rx_http, '', $key);
          $rx_matches = array();
          // do some nasty string manipulations to restore the original letter case
          // this should work in most cases
          $rx_matches = explode('_', $arh_key);
          if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
            foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
            $arh_key = implode('-', $rx_matches);
          }
          $arh[$arh_key] = $val;
        }
      }
      return( $arh );
    }
    function getallheaders()
    {
        if (!is_array($_SERVER)) {
            return array();
        }

        $headers = array();
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

basicLog("HEADERS:".print_r(getallheaders(), true), true );
//basicLog("GET PARAMETERS:".print_r($_GET, true), true);
//basicLog("POST PARAMETERS:".print_r($_POST, true), true);