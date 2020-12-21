<?php


define("ENVIRONMENT", "dev");

if ($_SERVER[HTTP_HOST] != 'localhost') {
    define("ENVIRONMENT", "dev1");
}
