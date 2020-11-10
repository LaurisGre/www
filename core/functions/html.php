<?php
function html_attr(array $attr): string
{
	$att_string = '';
	foreach ($attr as $att_name => $att_value) {
		$att_string .= "$att_name=\"$att_value\" ";
	}

	return $att_string;
}

function form_attr($form)
{
	$defaults = ['METHOD' => 'POST'];
	return html_attr(($form['attr'] ?? []) + $defaults);
}

function input_attr(string $field_name, array $field): string
{
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
