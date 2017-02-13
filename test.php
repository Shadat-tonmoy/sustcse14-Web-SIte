<?php
	$date = date("Y-m-d");
	$past_days = date("Y-m-d", strtotime("$date -2 day"));
	echo "$date $past_days";
?>