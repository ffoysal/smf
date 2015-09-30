<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('formbehavior.chosen', 'select');
?>

<?php echo $this->loadTemplate('form'); ?>
<?php if (count($this->results) > 0) :
	echo $this->loadTemplate('results');
else :
	echo $this->loadTemplate('error');
endif; ?>
</div>