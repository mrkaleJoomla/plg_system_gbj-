<?php
/**
 * @package    Joomla.Component
 * @subpackage  System.Gbj
 * @copyright  (c) 2017 Libor Gabaj. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since      3.7
 */

defined('_JEXEC') or die;

/**
 * System plugin to load custom library and layouts.
 *
 * @since  3.7
 */
class PlgSystemGbj extends JPlugin
{
	/**
	 * Method to catch the onAfterInitialise event and register custom library.
	 *
	 * @return  void
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
