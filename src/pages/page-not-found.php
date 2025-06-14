<?php
echo "ERROR:                 ";
var_dump(filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT));
echo '/n';
var_dump($_GET);