<?php
/**
 * System plugin for loading the library LIB_GBJ
 *
 * @package    Joomla.Plugin
 * @subpackage System.Gbj
 * @copyright  (c)2017 Libor Gabaj
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @since      3.8
 */

defined('_JEXEC') or die;

/**
 * System plugin definition class
 *
 * @package  Joomla.Class
 * @license  GNU General Public License version 2 or later; see LICENSE.txt
 * @since    3.8
 */
class PlgSystemGbj extends JPlugin
{
	/**
	 * Method to catch the onAfterInitialise event and register custom library.
	 *
	 * @return void
	 */
	public function onAfterInitialise()
	{
		$classPrefix = ucfirst($this->_name);
		$libFolder = DIRECTORY_SEPARATOR . $this->_name;
		$libName = 'lib_' . $this->_name;

		JLoader::registerPrefix($classPrefix, JPATH_LIBRARIES . $libFolder);
		JFactory::getLanguage()->load($libName, JPATH_SITE);
	}
}
