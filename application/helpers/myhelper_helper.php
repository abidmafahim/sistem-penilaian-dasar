<?php

//Login menggunakan Bcrypt

if (!function_exists('get_hash')) {
	function get_hash($PlainPassword)
	{
		$option = [
			'cost' => 5,
		];
		return password_hash($PlainPassword,PASSWORD_DEFAULT, $option);
	}
}

if (!function_exists('hash_verified')) {
	function hash_verified($PlainPassword,$HashPassword)
	{
		return password_verify($PlainPassword, $HashPassword) ? true : false;
	}
}

//Anti injection

 function anti_injection($data)
{
	$filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	return $filter;
}
?>