<?php
function html_attr(array $attr): string
{
	$att_string = '';
	foreach ($attr as $att_name => $att_value) {
		$att_string .= "$att_name=\"$att_value\" ";
	}

	return $att_string;
}

function input_attr(string $field_name, array $field): string
{
	// $att_arr = [];
	// foreach ($field[$field_name] as $att_name => $att_value) {
	// 	if (gettype($att_value) != 'array' && $att_name != 'label') {
	// 		$att_arr[$att_name] = $att_value;
	// 	} else if (gettype($att_value) === 'array') {
	// 		foreach ($att_value as $extra_name => $extra_value) {
	// 			if ($extra_name === 'attr') {
	// 				foreach ($extra_value as $extra_att_name => $extra_att_value) {
	// 					$att_arr[$extra_att_name] = $extra_att_value;
	// 				}
	// 			}
	// 		}
	// 	}
	// }

	$att_arr = [
		'name' => $field_name,
		'type' => $field['type'],
		'value' => $field['value'] ?? ''
	] + ($field['extra']['attr'] ?? []);

	return html_attr($att_arr);
}

function button_attr(string $button_id, array $button): string
{
    $attributes = [
            'name' => 'action',
            'type' => $button['type'] ?? 'submit',
            'value' => $button_id,
        ] + ($button['extra']['attr'] ?? []);

    return html_attr($attributes);
}

?>