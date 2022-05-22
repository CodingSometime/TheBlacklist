<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('ddmmyyyyToYYYYMMDD')) {
	function ddmmyyyyToYYYYMMDD($str)
	{
		$arrays = explode("/", $str);
		$yyyy = $arrays[2];
		$mm = $arrays[1];
		$dd = $arrays[0];

		return "$yyyy-$mm-$dd";
	}
}

if (!function_exists('getBreadcrumbs')) {
	function getBreadcrumbs($breadcrumbs)
	{
		$html = '<div class="row my-3">' . "\n";
		$html .= '<nav aria-label="breadcrumb">' . "\n";
		$html .= '<ol class="breadcrumb">' . "\n";

		$index = 0;
		foreach ($breadcrumbs as $key => $results) {
			++$index;
			foreach ($results as $label => $href) {

				$href = $href != "" ? $href : "#";
				$mylabel = @lang($label) != "" ? @lang($label) : $label;

				if ($index < count($breadcrumbs))
					$html .= '<li class="breadcrumb-item"><a href="' . $href . '">' . $mylabel . '</a></li>' . "\n";
				else
					$html .= '<li class="breadcrumb-item active" aria-current="page">' . $mylabel . '</li>' . "\n";
			}
		}
		$html .= '</ol>' . "\n";
		$html .= '</div>' . "\n";
		return $html;
	}
}


if (!function_exists('truncate')) {
	function truncate($val, $f = "0")
	{
		if (($p = strpos($val, '.')) !== false) {
			$val = floatval(substr($val, 0, $p + 1 + $f));
		}
		return $val;
	}
}

if (!function_exists('toCamelCase')) {
	function toCamelCase($arrays, $capitalizeFirstCharacter = false)
	{
		$returnArrays = array();

		foreach ($arrays as $key => $value) {
			$dataArray = array();

			foreach ($value as $k2 => $v2) {

				$strKey = strtolower($k2);
				$key2 = str_replace('_', '', ucwords($strKey, '_'));

				if (!$capitalizeFirstCharacter) {
					$key2 = lcfirst($key2);
				}

				$dataArray[$key2] = $v2;
			}
			$returnArrays[$key] = (object)$dataArray;
		}
		return $returnArrays;
	}
}

if (!function_exists('camelCaseToUnderscore')) {
	function camelCaseToUnderscore($arrays)
	{
		$returnArrays = array();
		foreach ($arrays as $key => $value) {
			$upperKey = strtoupper(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));
			$returnArrays[$upperKey] = $value;
		}

		return $returnArrays;
	}
}

if (!function_exists('responseOk')) {
	function responseOk($databaseResult = null)
	{
		$response = new stdClass();

		if (!$databaseResult) {
			$response->status = false;
			$response->result = null;
			$response->totalRows = 0;
			$response->message = "";
		}

		if (is_array($databaseResult) && count($databaseResult) == 0) {
			$response->status = false;
			$response->result = null;
			$response->totalRows = 0;
			$response->message = "No data found";
		}
		if (!is_array($databaseResult)) {
			$response->status = true;
			$response->result = $databaseResult;
			$response->totalRows = 1;
			$response->message = "Successfully";
		} else {
			$response->status = true;
			$response->result = $databaseResult;
			$response->totalRows = count($databaseResult);
			$response->message = "Successfully";
		}

		return $response;
	}
}

if (!function_exists('responseError')) {
	function responseError($databaseError = null, $customError = null)
	{
		$response = new stdClass();
		$response->status = false;
		$response->result = null;
		$response->totalRows = 0;
		$response->message = @$databaseError["message"];

		if (isset($customError)) {
			$response->message = $customError;
		}

		if (is_array(@$databaseError)) {
			$response->status = false;
			$response->result = $databaseError;
			$response->totalRows = count($databaseError);
			$response->message = "Something wrong";
		}

		return $response;
	}
}


if (!function_exists('nvl')) {
	function nvl($source, $target)
	{
		if (!$source || empty($source)) {
			return $target;
		} else {
			return $source;
		}
	}
}

if (!function_exists('decode')) {
	function decode($value, $source, $target1, $target2 = "")
	{
		if (!$source) {
			return $value;
		}

		if ($value == $source) {
			return $target1;
		} else {
			return $target2;
		}
	}
}
