<?php
$GLOBALS['TL_CTE']['content']['faces'] = 'Eknoes\ContaoFaces\ContentElement\FacesElem';

$GLOBALS['BE_MOD']['content']['faces'] = array(
  'tables' => array(
    'tl_ce_faces'
  )
);

  if (TL_MODE == 'FE') {
    $GLOBALS['TL_CSS'][] = 'bundles/contaofaces/faces.css|static';
  }


?>
