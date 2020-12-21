<?php



if ($_SERVER[HTTP_HOST] != 'localhost') {
    define("ENVIRONMENT", "dev1");
} else {
    define("ENVIRONMENT", "dev");
}
