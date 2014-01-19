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
* Add palettes to tl_content
*/
$GLOBALS['TL_DCA']['tl_content']['palettes']['simple_countdown'] = 'name,type,headline,simple_countdown_title;{miscellaneous_legend},simple_countdown_tstamp,simple_countdown_description;{expert_legend:hide},align,space,cssID';



/**
* Add fields to tl_content
*/

$GLOBALS['TL_DCA']['tl_content']['fields']['simple_countdown_description'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['simple_countdown_description'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'                    => array('tl_class'=>''),
       'sql'                     => "text NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['simple_countdown_tstamp'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['simple_countdown_tstamp'],
	'exclude'                 => true,
	'inputType'               => 'text',
       'default'                 => time(),
	'sorting'                 => true,
	'eval'                    => array('mandatory'=>true, 'maxlength'=>10, 'datepicker'=>$this->getDatePickerString(), 'submitOnChange'=>false, 'rgxp' => 'date'),
       'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

