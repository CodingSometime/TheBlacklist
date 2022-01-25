<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('button_save')) {
	function button_save($label="", $action="")
	{
    $button =<<<EOD
    <button class="btn btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
    <circle cx="12" cy="14" r="2"></circle>
    <polyline points="14 4 14 8 8 8 8 4"></polyline>
    </svg> $label</button>
    EOD;

		return $button;
	}
}


if (!function_exists('button_edit')) {
	function button_edit($label="", $action="")
	{
    $button =<<<EOD
    <button class="btn btn-secondary shadow">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
    </svg> $label</button>
    EOD;

		return $button;
	}
}


if (!function_exists('button_delete')) {
	function button_delete($label="", $action="")
	{
    $button =<<<EOD
    <button class="btn btn-danger shadow">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    <line x1="4" y1="7" x2="20" y2="7"></line>
    <line x1="10" y1="11" x2="10" y2="17"></line>
    <line x1="14" y1="11" x2="14" y2="17"></line>
    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
    </svg> $label</button>
    EOD;

		return $button;
	}
}


if (!function_exists('button_view')) {
	function button_view($label="", $action="")
	{
    $button =<<<EOD
    <button class="btn btn-info shadow">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
    <circle cx="12" cy="14" r="2"></circle>
    <polyline points="14 4 14 8 8 8 8 4"></polyline>
    </svg> $label</button>
    EOD;

		return $button;
	}
}