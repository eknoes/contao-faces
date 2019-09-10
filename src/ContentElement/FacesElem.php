<?php
namespace Eknoes\ContaoFaces\ContentElement;

class FacesElem extends \ContentElement
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_faces';

    /**
     * Compile the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE') {
            $this->genBeOutput();
        } else {
            $this->genFeOutput();
        }
    }

    /**
     * Erzeugt die Ausgebe für das Backend.
     * @return string
     */
    private function genBeOutput()
    {
        $this->strTemplate          = 'be_wildcard';
        $this->Template             = new \BackendTemplate($this->strTemplate);
        $this->Template->title      = $this->headline;
        $this->Template->wildcard = "<i>" . $this->staff_render . " FacesElement</i><br />";

        if(!empty($this->staff_id)) {
          $staffIds = unserialize($this->staff_id);
          $result = $this->Database->prepare("SELECT * FROM tl_ce_faces WHERE id IN (" . implode(",", $staffIds) . ") ORDER BY lastname")->execute();
          while ($result->next()) {
            $this->Template->wildcard .= $result->title . " " . $result->surname . " " . $result->lastname . "<br />";
          }
        }
    }

    /**
     * Erzeugt die Ausgebe für das Frontend.
     * @return string
     */
    private function genFeOutput()
    {
      switch($this->staff_render) {
        case 'Standard': #Standard
          $this->strTemplate = "ce_faces";
          break;
        case 'Popup': #Popup
          $this->strTemplate = "ce_faces_popup";
          break;

        case 'Accordion': #Accordion
          $this->strTemplate = "ce_faces_accordion";
          break;

        default:
          $this->strTemplate = "ce_faces";
      }


      $this->Template = new \BackendTemplate($this->strTemplate);

      $staffIds = unserialize($this->staff_id);
      $people = array();
      if(!empty($staffIds)) {
        $result = $this->Database->prepare("SELECT * FROM tl_ce_faces WHERE id IN (" . implode(",", $staffIds) . ") ORDER BY lastname")->execute();

        while ($result->next()) {

          $contactblock = "";
          if(!empty($result->position)) {
            $contactblock .= "<p style=\"font-weight: bold;\">" . $result->position . "</p>";
          }
          $contactblock .= '<p>';
          if(!empty($result->mail)) {
            $contactblock .= "E-Mail: <a class=\"mail\" href=\"mailto:" . $result->mail . "\">" . $result->mail . "</a><br />";
          }
          if(!empty($result->telephone)) {
            $contactblock .= "Phone: <a class=\"tel\" href=\"tel:" . $result->telephone . "\">" . $result->telephone . "</a><br />";
          }
          if(!empty($result->fax)) {
            $contactblock .= "Fax: <a class=\"fax\" href=\"fax:" . $result->fax . "\">" . $result->fax . "</a><br />";
          }
          if(!empty($result->link)) {
            $contactblock .= (!empty($result->linkText) ? $result->linkText : "Link") . ": <a class=\"link\" href=\"" . $result->link . "\">" . (strlen($result->link) > 50 ? substr($result->link, 0, 50) . "..." : $result->link) . "</a><br />";
          }
          $contactblock .= "</p>";

          $adressblock = "";
          if(!empty($result->adress)) {
            //$adressblock .= "<p>Adress:<br />";
            $adressblock .= "<p>" . nl2br($result->adress) . "<br />";
            if(!empty($result->room)) {
              $adressblock .= "Room " . $result->room . "<br />";
            }
            $adressblock .= "</p>";
          }

          if($this->staff_more) {
            $detailsblock = $result->text;
          } else {
            $detailsblock = "";
          }

          $people[] = array(
            'fullname' => $result->title . " " . $result->surname . " " . $result->lastname,
            'adressblock' => $adressblock,
            'contactblock' => $contactblock,
            'detailsblock' => $detailsblock,
            'portrait' => $result->portrait ? \FilesModel::findByUuid($result->portrait)->path : '/files/Images/people/avatar-icon-girlie.png',
           );
        }
      } else {
        $people = array();
      }

      $this->Template->people = $people;
    }
}
?>
