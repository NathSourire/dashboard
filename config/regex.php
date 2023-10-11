<?php  
define('REGEX_NAME', "^[A-Za-z0-9 \-éèêëïîôöùûüçàáâäæœÉÈÊËÎÏÔÖÙÛÜÇÀÁÂÄÆŒ']+$");
define('REGEX_POSTAL', "(?:0[1-9]|[1-8]\d|9[0-8])\d{3}");
define('REGEX_PASSWORD', "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$");
define('REGEX_DATE', "^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$");
define('REGEX_MILEAGE', "^[A-Za-z0-9 \-']+$");
