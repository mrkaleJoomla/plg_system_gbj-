<?php
/**
 * System plugin for loading the library LIB_GBJ
 *
 * @package    Joomla.Plugin
 * @subpackage System.Gbj
 * @copyright  (c)2017-2019 Libor Gabaj
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
		// Load library with the same name as this plugin has
		$library = $this->_name;
		$classPrefix = ucfirst($library);
		$libName = 'lib_' . $library;
		$libFolder = realpath(JPATH_LIBRARIES . DIRECTORY_SEPARATOR . $library);

		if (file_exists($libFolder))
		{
			JLoader::registerPrefix($classPrefix, $libFolder);
			JFactory::getLanguage()->load($libName, JPATH_SITE);
		}
	}
}
