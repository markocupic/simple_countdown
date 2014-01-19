<?php

/**
 * Contao Open Source CMS, Copyright (C) 2005-2013 Leo Feyer
 *
 * Contao Content Element "SimpleCountdown"
 *
 * @copyright  Marko Cupic 2007-2014
 * @author     Marko Cupic for Nina Gerling www.ena-webstudio.com
 * @package    SimpleCountdown
 * @license    LGPL
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace MCupic\SimpleCountdown;


/**
 * Class Integrity_Check
 *
 * Contao Content Element "SimpleCountdown"
 *
 * @copyright  Marko Cupic 2007-2014
 * @author     Marko Cupic for Nina Gerling www.ena-webstudio.com
 * @package    SimpleCountdown
 */
class SimpleCountdown extends \ContentElement
{

       /**
        * Template
        * @var string
        */
       protected $strTemplate = 'ce_simple_countdown';


       /**
        * Return if countdown has expired
        * Deactivate the content element if countdown has expired
        * @return string
        */
       public function generate()
       {

              $countdownExpired = false;

              $oneDay = 3600 * 24;
              if ($this->simple_countdown_tstamp + $oneDay - time() < 0)
              {
                     // Deactivate content element one day after event has expired
                     $countdownExpired = true;
                     \Database::getInstance()->prepare('UPDATE tl_content %s WHERE id=?')->set(array('invisible' => '1'))->execute($this->id);
              }

              if (TL_MODE == 'BE')
              {
                     $objTemplate = new \BackendTemplate('be_wildcard');
                     $objTemplate->wildcard = '### SIMPLE-COUNTDOWN ###';
                     $objTemplate->title = $this->headline . ($this->countdownExpired ? "<pre>" . $GLOBALS['TL_LANG']['tl_content']['simple_countdown_expired'] . "</pre>" : "");
                     $objTemplate->id = $this->id;
                     $objTemplate->link = $this->name;

                     return $objTemplate->parse();
              }

              // Return if countdown has expired
              if ($countdownExpired)
              {
                     return '';
              }

              return parent::generate();
       }


       /**
        * Generate content element
        */
       protected function compile()
       {

              $countdown = $this->simple_countdown_tstamp - time();
              if ($countdown <= 0)
              {
                     $countdown = 0;
              }

              $days = ceil($countdown / (3600 * 24));

              $this->Template->countdown = preg_split('//', $days, -1, PREG_SPLIT_NO_EMPTY);
              $this->Template->unit = ($days == 1 ? $GLOBALS['TL_LANG']['default']['simple_countdown']['day'][0] : $GLOBALS['TL_LANG']['default']['simple_countdown']['day'][1]);
              $this->Template->description = nl2br($this->simple_countdown_description);
       }

}
