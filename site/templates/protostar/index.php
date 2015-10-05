<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php // Use of Google Font ?>
	<?php if ($this->params->get('googleFont')) : ?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
			}
		</style>
	<?php endif; ?>
	<?php // Template color ?>
	<?php if ($this->params->get('templateColor')) : ?>
	<style type="text/css">
		body.site
		{
			border-top: 3px solid <?php echo $this->params->get('templateColor'); ?>;
			background-color: <?php echo $this->params->get('templateBackgroundColor'); ?>
		}
		a
		{
			color: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary
		{
			background: <?php echo $this->params->get('templateColor'); ?>;
		}
		.navbar-inner
		{
			-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
		}
	</style>
	<?php endif; ?>
	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
	echo ($this->direction == 'rtl' ? ' rtl' : '');
?>">

	<!-- Body -->
	<div class="body">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
			<!-- Header -->
			<header class="header" role="banner">
				<div class="header-inner clearfix">
					<a class="brand pull-left" href="<?php echo $this->baseurl; ?>/">
						<?php echo $logo; ?>
						<?php if ($this->params->get('sitedescription')) : ?>
							<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>'; ?>
						<?php endif; ?>
					</a>
					<div class="header-search pull-right">
						<jdoc:include type="modules" name="position-0" style="none" />
					</div>
				</div>
			</header>
			<?php if ($this->countModules('position-1')) : ?>
				<nav class="navigation" role="navigation">
					<div class="navbar pull-left">
						<a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
					</div>
					<div class="nav-collapse">
						<jdoc:include type="modules" name="position-1" style="none" />
					</div>
				</nav>
			<?php endif; ?>
			<jdoc:include type="modules" name="banner" style="xhtml" />
			<div class="row-fluid">
				<?php if ($this->countModules('position-8')) : ?>
					<!-- Begin Sidebar -->
					<div id="sidebar" class="span3">
						<div class="sidebar-nav">
							<jdoc:include type="modules" name="position-8" style="xhtml" />
						</div>
					</div>
					<!-- End Sidebar -->
				<?php endif; ?>
				<main id="content" role="main" class="<?php echo $span; ?>">
					<!-- Begin Content -->
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-2" style="none" />
					<!-- End Content -->
				</main>
				<?php if ($this->countModules('position-7')) : ?>
					<div id="aside" class="span3">
						<!-- Begin Right Sidebar -->
						<jdoc:include type="modules" name="position-7" style="well" />
						<!-- End Right Sidebar -->
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-3 span3 smf-social-button-position-general">
			<div class="s4" id="LnkBr1-l5l" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l">
				<div id="LnkBr1-l5litemsContainer" class="s4itemsContainer" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0">
					<div style="width:38px;height:38px;margin-bottom:0;margin-right:6px;display:inline-block;" class="s4imageItem" id="LnkBr1-l5li0qti" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.0">
						<a href="https://www.facebook.com/SabrinaMemorialFoundation" target="_blank" id="LnkBr1-l5li0qtilink" class="s4imageItemlink" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.0.0">
							<div id="LnkBr1-l5li0qtiimage" style="width:38px;height:38px;position:absolute;" class="s4imageItemimage" data-state="loaded" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.0.0.0">
								<img alt="" style="width:38px;height:38px;object-fit:cover;" src="http://static.wixstatic.com/media/b1cd13f9d4dfb1450bbb325285106177.png_srz_p_38_38_75_22_0.50_1.20_0.00_png_srz" id="LnkBr1-l5li0qtiimageimage" class="s4imageItemimageimage" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.0.0.0.0">
							</div>
						</a>
					</div>
					<div style="width:38px;height:38px;margin-bottom:0;margin-right:6px;display:inline-block;" class="s4imageItem" id="LnkBr1-l5limage22iv" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.1">
						<a href="https://twitter.com/SabrinaMemorial" target="_blank" id="LnkBr1-l5limage22ivlink" class="s4imageItemlink" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.1.0">
							<div id="LnkBr1-l5limage22ivimage" style="width:38px;height:38px;position:absolute;" class="s4imageItemimage" data-state="loaded" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.1.0.0">
								<img alt="" style="width:38px;height:38px;object-fit:cover;" src="http://static.wixstatic.com/media/09b721261e9fba8dd8a96ee539a0743f.png_srz_p_38_38_75_22_0.50_1.20_0.00_png_srz" id="LnkBr1-l5limage22ivimageimage" class="s4imageItemimageimage" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.1.0.0.0">
							</div>
						</a>
					</div>
					<div style="width:38px;height:38px;margin-bottom:0;margin-right:6px;display:inline-block;" class="s4imageItem" id="LnkBr1-l5limageg3j" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.2">
						<a href="http://www.youtube.com/channel/UCA2pYykQ_oPxYw-v0R84_lQ" target="_blank" id="LnkBr1-l5limageg3jlink" class="s4imageItemlink" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.2.0">
							<div id="LnkBr1-l5limageg3jimage" style="width:38px;height:38px;position:absolute;" class="s4imageItemimage" data-state="loaded" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.2.0.0">
								<img alt="" style="width:38px;height:38px;object-fit:cover;" src="http://static.wixstatic.com/media/013df6506b037d2282bcf31ac709449c.png_srz_p_38_38_75_22_0.50_1.20_0.00_png_srz" id="LnkBr1-l5limageg3jimageimage" class="s4imageItemimageimage" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$LnkBr1-l5l.0.2.0.0.0">
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 span4 smf-paypal-button-position-general">
          	<div style="width: 171px;height: 80px;" class="s5" data-state="hasContent" id="i478zcpg" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg">
          		<div id="i478zcpgiFrameHolder" class="s5iFrameHolder" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg.0">
          			<iframe width="100%" style="border:none;" height="93px" src="http://www.sabrinamemorial.org.usrfiles.com/html/4c2bb9_02316a46c772b8c8d485a64b61f62e6e.html" data-reactid=".0.$SITE_ROOT.$desktop_siteRoot.$SITE_HEADER.1.1.$i478zcpg.0.0">
          			</iframe>
          		</div>
          	</div>
        </div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
			<hr />
			<jdoc:include type="modules" name="footer" style="none" />
			<p class="pull-right">
				<a href="#top" id="back-top">
					<?php echo JText::_('TPL_PROTOSTAR_BACKTOTOP'); ?>
				</a>
			</p>
			<p>
				&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
			</p>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
