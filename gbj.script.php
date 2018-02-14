<?php

/**
 * Installation script
 *
 * @package    Joomla.Plugin
 * @subpackage System.Gbj
 * @copyright  (c)2018 Libor Gabaj
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @since      3.8
 */

defined('_JEXEC') or die();


/**
 * Installation class
 *
 * @license  GNU General Public License version 2 or later; see LICENSE.txt
 * @since    3.8
 */
class PlgSystemGbjInstallerScript
{
	/**
	 * Called before any type of action
	 *
	 * @param   string           $route   Which action is happening
	 *                                    (install|uninstall|discover_install)
	 * @param   jadapterinstance $adapter The object running this script
	 *
	 * @return boolean True on success
	 */
	public function preflight($route, JAdapterInstance $adapter)
	{
		if (!JLibraryHelper::isEnabled('gbj'))
		{
			JFactory::getApplication()->enqueueMessage(
				JText::_('PLG_SYSTEM_GBJ_ERROR_NO_LIBRARY'),
				'error'
			);

			return false;
		}

		return true;
	}

	/**
	 * Called at the installation
	 *
	 * @param   jadapterinstance $adapter The object running this script
	 *
	 * @return void
	 */
	public function install(JAdapterInstance $adapter)
	{
		$db		 = JFactory::getDBO();
		$query	 = $db->getQuery(true)
			->update('#__extensions')
			->set("enabled='1'")
			->where("type='plugin'")
			->where("folder='system'")
			->where("element='gbj'");
		$db->setQuery($query);
		$db->execute();
	}

}
