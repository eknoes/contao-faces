<?php
/**
 * Table tl_ce_faces
 */
$strName = 'tl_content';

$GLOBALS['TL_DCA'][$strName]['fields']['staff_id'] = array(
  'label' => array('Collaborator', 'People who should be shown in alphabetical order.'),
  'sql' => 'text NULL',
  'inputType' => 'select',
  'foreignKey'              => "tl_ce_faces.CONCAT(title, ' ', surname, ' ', lastname)",
  'eval' => array("multiple" => true, "chosen" => true)
);
$GLOBALS['TL_DCA'][$strName]['fields']['staff_render'] = array(
  'label' => array('Style', 'Popup is a simple list of names where you can access more information after clicking the name in a popup. Accordion is a name list, where you can access more information in accordion-stlye. '),
  'sql' => 'varchar(15) NOT NULL DEFAULT \'Standard\'',
  'inputType' => 'select',
  'options' => array(
    '0' => 'Standard',
    '1' => 'Popup',
    '2' => 'Accordion',
  ),
);
$GLOBALS['TL_DCA'][$strName]['fields']['staff_more'] = array(
  'label' => array('Show detailed information', ''),
  'sql' => 'tinyint(1) NULL',
  'inputType' => 'checkbox',
);


$GLOBALS['TL_DCA'][$strName]['palettes']['faces'] = "{type_legend},type;headline,staff_id,staff_render,staff_more";
?>
