<?php

/**
 * Converts the given file to a json file
 *
 * @param array $array
 * @param string $file_name
 * @return boolean
 */
function array_to_file(array $array, string $file_name): bool
{
	$string_array = json_encode($array);
	$bytes_written = file_put_contents($file_name, $string_array);

	return $bytes_written !== false;
}

/**
 * Converts back from a json file in to an array
 *
 * @param string $file_name
 * @return void
 */
function file_to_array(string $file_name)
{
	return
		file_exists($file_name) ?
		json_decode(file_get_contents($file_name), true) ?? [] :
		false;
}
