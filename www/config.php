<?php

define('BASE_DOMAIN',     'fwrd.in');
define('GA_TRACKING_ID',  '');

function writeToJavascript($name, $value) {
  echo "var $name = '$value';\n";
}