<?php

require_once('dbhelper.php');
$sql = 'select * from om where day(date) = (select day(current_date()));';
execute($sql);

?>