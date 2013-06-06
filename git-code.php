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

/*
 *	Const
 */


/*
 *	Helpers
 */

function git_get($url){
	return file_get_contents($url);
}

function git_get_section($code, $patter){
	
	return file_get_contents($url);
}

/*
 *	Function
 */

//[git]
function git_func( $atts ){
	return "NO IMPLEMENT!!!";
}
add_shortcode( 'git', 'git_func' );

//[git-insert]
$GIT_INSERT_FUNC_ATTS = array('url'=>'https://raw.github.com/SebastianPozoga/JavaClassSelector/master/java/eu/pozoga/jspf/classes/ClassFilter.java');

function git_insert_func( $atts ){
	global $GIT_INSERT_FUNC_ATTS;
	$a = shortcode_atts($GIT_INSERT_FUNC_ATTS, $atts);
	$code = git_get($a['url']);
	wp_enqueue_script('google-code-prettify-script');
	return '<pre class="prettyprint">'.$code.'</pre>';
}
add_shortcode( 'gitInsert', 'git_insert_func' );

//[github]
$GIT_FUNC_ATTS = array('url'=>'SebastianPozoga/JavaClassSelector/master/java/eu/pozoga/jspf/classes/ClassFilter.java');

function github_func( $atts ){
	//prepare variables
	global $GIT_INSERT_FUNC_ATTS;
	$a = shortcode_atts($GIT_INSERT_FUNC_ATTS, $atts);
	$url = 'https://raw.github.com/'.$a['url'];

	//get code
	$code = git_get($url);
	
	//prepare color code
	wp_enqueue_script('google-code-prettify-script');
	$parts = pathinfo($url);
	$class = 'language-'.$parts['extension'];

	//create output
	return '<pre class="prettyprint"><code class="'.$class.'">'.$code.'</code></pre>';
}
add_shortcode( 'gitInsert', 'github_func' );
