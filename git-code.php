<?php 
/*
Plugin Name: Git-code
Plugin URI: http://grapstore.com
Description: Access to your repository
Author: Sebastian Pożoga
Version: 1.0
Author URI: http://pozoga.eu
*/

/*js scripts
wp_register_script('jquery-cookie-script', plugins_url('js/jquery.cookie.js', __FILE__), array('jquery'), '1.0', true);
wp_register_script('recomendation-script', plugins_url('js/main.js', __FILE__), array('jquery','jquery-cookie-script'), '1.0', true);
//js
wp_enqueue_script('recomendation-script');*/
wp_register_script('google-code-prettify-script', 'https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js');

error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'CodeParser.php';

/*
 *	Shortcodes
 */



//[github]
$GIT_FUNC_ATTS = array(
	'url'=>'SebastianPozoga/WP-Github-Plugin/blob/master/errors/noUrl.js',
	'baseurl' => "https://raw.github.com/";
);

function github_func( $atts ){
	//prepare variables
	global $GIT_INSERT_FUNC_ATTS;
	$atts = shortcode_atts($GIT_INSERT_FUNC_ATTS, $atts);
	$url = $atts['baseurl'].$atts['url'];
	$section = $atts['section'];

	//get code
	$code = file_get_contents($url);

	//parse code
	if($section){
		//
	}else{
	}
	
	//prepare color code
	wp_enqueue_script('google-code-prettify-script');
	$parts = pathinfo($url);
	$class = 'language-'.$parts['extension'];

	//create output
	return '<pre class="prettyprint"><code class="'.$class.'">'.$code.'</code></pre>';
}
add_shortcode( 'github', 'github_func' );
