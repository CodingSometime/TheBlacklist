<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class PicklistModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function selectBoxGender($selected = null, $isReadOnly = false)
  {
    $arrays = array();
    array_push($arrays, array('OPTION_VALUE' => "", 'OPTION_NAME' => ""));
    array_push($arrays, array('OPTION_VALUE' => "M", 'OPTION_NAME' => "Male"));
    array_push($arrays, array('OPTION_VALUE' => "F", 'OPTION_NAME' => "Female"));

    foreach ($arrays as $k => $values) {
        $id = $values["OPTION_VALUE"];
        $name = $values["OPTION_NAME"];
        $options[$id] = $name;
    }

    $readOnly = "";
    if ($isReadOnly) $readOnly = "disabled";

    return form_dropdown('gender', $options, $selected, 'class="form-select" required ' . $readOnly);
  }

  public function selectBoxYesNo($selected = null, $isReadOnly = false)
  {
    $arrays = array();
    array_push($arrays, array('OPTION_VALUE' => "", 'OPTION_NAME' => ""));
    array_push($arrays, array('OPTION_VALUE' => "Y", 'OPTION_NAME' => "Yes"));
    array_push($arrays, array('OPTION_VALUE' => "N", 'OPTION_NAME' => "No"));

    foreach ($arrays as $k => $values) {
        $id = $values["OPTION_VALUE"];
        $name = $values["OPTION_NAME"];
        $options[$id] = $name;
    }

    $readOnly = "";
    if ($isReadOnly) $readOnly = "disabled";

    return form_dropdown('gender', $options, $selected, 'class="form-select" required ' . $readOnly);
  }
}
