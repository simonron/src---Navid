<?php

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

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

$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/script.js');

// Add Stylesheets
//$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/template.css');
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/main.css');

// Use of Google Font
if ($this->params->get('googleFont'))
{
	$doc->addStyleSheet('//fonts.googleapis.com/css?family=' . $this->params->get('googleFontName'));
	$doc->addStyleDeclaration("
	h1, h2, h3, h4, h5, h6, .site-title {
		font-family: '" . str_replace('+', ' ', $this->params->get('googleFontName')) . "', sans-serif;
	}");
}

// Check for a custom CSS file
$userCss = JPATH_SITE . '/templates/' . $this->template . '/css/user.css';

if (file_exists($userCss) && filesize($userCss) > 0)
{
	$this->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/user.css');
}

?>

	<!DOCTYPE html>
	<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<jdoc:include type="head" />
		<!--[if lt IE 9]><script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
	</head>

	<body>
	<div class="site wrapper">
		
			<!-- Mobile sidebar -->
			<div class='mobile-sidebar-left'>
					<jdoc:include type="modules" name="mobile_sidebar_left" />
			</div>

			<div class='cover' onclick='onClickCover()'></div>

			<!-- Mobile Menu Button -->
			<div class='mobile-menu-bar'>
				<div class='mobile-menu-button' onclick='onClickMenu();'><span>&#9776;</span></div>
			</div>
			<div id="mask" onClick="desktop_reset()"></div>


			<!-- Body -->
			<div class="body">
						<span id="top_of_site"></span>
				<div class="container">

					<!-- Header -->
					<header class="header" role="banner">
						<div class="header-inner clearfix">
							<a class="brand pull-left" href="<?php echo $this->baseurl; ?>/">
								<!--			<?php echo $logo; ?>
						<?php if ($this->params->get('sitedescription')) : ?>
							<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription'), ENT_COMPAT, 'UTF-8') . '</div>'; ?>
						<?php endif; ?>-->
							</a>
							<div class="header-search top-logo">
								<jdoc:include type="modules" name="top_logo" style="xhtml" />
							</div>
						</div>
					</header>
					<!--			<?php if ($this->countModules('above_hero')) : ?>-->

					<nav class="navigation" role="navigation">
						<div class="main-menu ">
							<jdoc:include type="modules" name="main_menu" style="xhtml" />
				
						</div>
							</nav>
						
						<div>
							<jdoc:include type="modules" name="above_hero" style="xhtml" />
			
						
								</div>
				


					<!--			<?php endif; ?>-->
		
					<jdoc:include type="modules" name="hero" style="xhtml" />


					<div id="main_block">


						<!-- Begin Sidebar -->
						<div id="sidebar">
							<div class="sidebar_nav">
								<jdoc:include type="modules" name="sidebar" style="xhtml" />
							</div>
						</div>
						<!-- End Sidebar -->


						<main id="content" role="main">
							<!-- Begin Content -->
							<jdoc:include type="modules" name="above_main" style="xhtml" />


							<jdoc:include type="message" />

							<jdoc:include type="component" />
							<jdoc:include type="modules" name="under_main" style="xhtml" />

							<!-- End Content -->
						</main>



						<div id="aside" class="right-sidebar">
							<!-- Begin RightSidebar -->

							<jdoc:include type="modules" name="right_sidebar" style="well" />
							<!-- End Right Sidebar -->
						</div>



					</div>
				</div>
			</div>
			<!-- Footer -->
			<footer class="footer" role="contentinfo">
				<div class="container">
					<hr />
					<jdoc:include type="modules" name="footer" style="xhtml" />


					<p>
						<a href="#" id="back-top">
							<!--<?php echo JText::_('TPL_PROTOSTAR_BACKTOTOP'); ?> -->
						</a>
					</p>
					<p>
						<!--&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>-->
					</p>
				</div>
			</footer>
			<jdoc:include type="modules" name="livereload" style="none" />
		</div>

	</body>

	</html>