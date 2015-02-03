<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

	$languages = implode("|", array_keys(Configure::read("Languages.available")));
	Router::connect('/:language/:controller/:action/*', array(), array('language' => $languages));
	Router::connect('/:language/:controller', array('action' => 'index'), array('language' => $languages));
	Router::connect('/:language/', array('controller' => 'pages', 'action' => 'display', 'home'), array('language' => $languages));

	Router::connect('/admin/', array('controller' => 'pages', 'action' => 'index', 'prefix' => 'admin'));
	Router::connect('/:slug', array('controller' => 'pages', 'action' => 'display'), array("pass" => array("slug")), array("slug" => "(?!admin)"));
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
