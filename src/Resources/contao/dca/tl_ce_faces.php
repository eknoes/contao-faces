<?php
/**
 * Table tl_ce_faces
 */
$strName = 'tl_ce_faces';

$GLOBALS['TL_DCA'][$strName] = array(
  'config' => array(
    'dataContainer' => 'Table',
    'switchToEdit'                => true,
    'enableVersioning'            => true,
    'sql' => array(
      'keys' => array(
        'id' => 'primary'
      )
    ),
    'notSortable' => false,
  ),
  'list' => array(
    'mode' => 1,
    'flag' => 1,
    'label'             => array(
  			'fields' => array('title','surname','lastname'),
  			'format' => '%s',
        'showColumns' => true,
  		),
    'operations'        => array(
			'edit'   => array(
				'label' => &$GLOBALS['TL_LANG'][$strName]['edit'],
				'href'  => 'act=edit',
				'icon'  => 'edit.gif'
			),
			'delete' => array(
				'label'      => &$GLOBALS['TL_LANG'][$strName]['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show'   => array(
				'label'      => &$GLOBALS['TL_LANG'][$strName]['show'],
				'href'       => 'act=show',
				'icon'       => 'show.gif',
				'attributes' => 'style="margin-right:3px"'
			),
		),
    'sorting' => array(
      'mode' => 1,
      'flag' => 3,
      'fields' => array("lastname"),
      ),
  ),
  'fields' => array(
    'id' => array(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
    'lastname' => array(
      'label' => array('Last name', ''),
      'inputType' => 'text',
      'eval' => array('mandatory' => true, 'tl_class' => 'w50'),
      'sql'                     => "varchar(100) NOT NULL",
    ),
    'surname' => array(
      'label' => array('First name', ''),
      'inputType' => 'text',
      'eval' => array('mandatory' => true, 'tl_class' => 'w50'),
      'sql'                     => "varchar(100) NOT NULL"
    ),
    'title' => array(
      'label' => array('Title', ''),
      'inputType' => 'text',
      'eval' => array('mandatory' => false),
      'sql'                     => "varchar(100) NOT NULL"
    ),
    'position' => array(
      'label' => array('Position', 'e.g. Secretary, Research Assistant, etc.'),
      'inputType' => 'text',
      'eval' => array('mandatory' => false, 'tl_class' => 'long'),
      'sql'                     => "varchar(100) NOT NULL"
    ),
    'mail' => array(
      'label' => array('E-Mail', 'E-Mail adress'),
      'inputType' => 'text',
      'eval' => array('mandatory' => false),
      'sql'                     => "varchar(100) NOT NULL"
    ),
    'telephone' => array(
      'label' => array('Telephone', 'Telephone number'),
      'inputType' => 'text',
      'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
      'sql'                     => "varchar(100) NOT NULL"
    ),
    'fax' => array(
      'label' => array('Fax', 'Fax number'),
      'inputType' => 'text',
      'eval' => array('mandatory' => false, 'tl_class' => 'w50'),
      'sql'                     => "varchar(100) NOT NULL"
    ),
    'adress' => array(
      'label' => array('Address', ''),
      'inputType' => 'textarea',
      'eval' => array('mandatory' => false),
      'sql'                     => "text NOT NULL"
    ),
    'room' => array(
      'label' => array('Room Number', ''),
      'inputType' => 'text',
      'eval' => array('mandatory' => false),
      'sql'                     => "text NOT NULL"
    ),
    'portrait' => array(
      'label' => array('Portrait', 'A Portrait of the person, best at 110px * 155px'),
      'inputType' => 'fileTree',
      'eval' => array(
        'multiple' => false,
        'mandatory' => false,
        'files' => true,
        'filesOnly' => true,
        'fieldType' => 'radio',
        'extensions' => 'jpg,png,gif',
        'tl_class' => 'staff_img'
      ),
      'sql'                     => "binary(16) NULL"
    ),
    'link' => array(
      'label' => array('Link', 'URL to e.g. Chair Page, personal homepage, etc.'),
      'inputType' => 'text',
      'eval' => array('mandatory' => false, 'tl_class' => 'long'),
      'sql'                     => "varchar(255) NOT NULL"
    ),
    'linkText' => array(
      'label' => array('Label', 'Label for the link'),
      'inputType' => 'text',
      'eval' => array('mandatory' => false),
      'sql'                     => "varchar(100) NOT NULL"
    ),
    'text' => array(
      'label' => array('Text', 'For more details a text can be added. It is only shown, when the \'show details\'-checkbox is true.'),
      'inputType' => 'textarea',
      'eval' => array('mandatory' => false, 'tl_class' => 'long', 'rte' => 'tinyMCE', 'allowHTML' => true),
      'sql'                     => "text NULL"
    ),
  ),
  'palettes' => array(
      'default'                     => 'title,surname,lastname,position,portrait;mail,telephone,fax;adress,room;linkText,link;text'
    ),
  );
