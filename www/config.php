<?php

define('BASE_DOMAIN',           '"example.com"');
define('GA_TRACKING_ID',        '"UA-61296937-1"');
define('ENABLE_BITLY_TRACKING', 'false');

function writeToJavascript($name, $value) {
  echo "var $name = $value;\n";
}