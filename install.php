<?php

require_once 'vendor/autoload.php';
require_once 'startup.php';

\Neoan3\Apps\Db::multi_query(file_get_contents(__DIR__. '/schema.sql'));

echo "done";