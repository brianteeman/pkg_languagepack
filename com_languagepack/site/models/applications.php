<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_languagepack
 *
 * @copyright   Copyright (C) 2020 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

/**
 * Language pack list model class.
 *
 * @since  1.0
 */
class LanguagepackModelApplications extends ListModel
{
	/**
	 * Method to get a \JDatabaseQuery object for retrieving the data set from a database.
	 *
	 * @return  \JDatabaseQuery  A \JDatabaseQuery object to retrieve the data set.
	 *
	 * @since   1.0
	 */
	protected function getListQuery()
	{
		$db = $this->getDbo();

		return $db->getQuery(true)
			->select('*')
			->from($db->quoteName('#__languagepack_applications'));
	}

	/**
	 * Method to count the number of unique languages managed by this component.
	 *
	 * @return  integer
	 *
	 * @since   1.0
	 */
	public function getUniqueLanguages()
	{
		$db = $this->getDbo();

		$query = $db->getQuery(true)
			->select('count(DISTINCT(lang_code))')
			->from($db->quoteName('#__languagepack_languages'));

		$db->setQuery($query);
		return (int) $db->loadResult();
	}
}
