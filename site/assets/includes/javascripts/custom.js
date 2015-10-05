/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function($)
{
	$(document).ready(function()
	{
		$('.readmore').each(function() {
		    var $pTag = $(this).find('p');
		    if($pTag.text().length > 83){
		        var shortText = $pTag.text();
		        shortText = shortText.substring(0, 83);
		        $pTag.addClass('fullArticle').hide();
		        shortText += '<a style="cursor:pointer" class="read-more-link"> ... Read more ></a>';
		        $pTag.append('<a class="read-less-link" style="cursor:pointer"> &lt; Hide More</a>');
		        $(this).append('<p class="preview">'+shortText+'</p>');
		    }
		});

		$(document).on('click', '.read-more-link', function () {
		    $(this).parent().hide().prev().show();
		});

		$(document).on('click', '.read-less-link', function () {
		    $(this).parent().hide().next().show();
		});
	})
})(jQuery);