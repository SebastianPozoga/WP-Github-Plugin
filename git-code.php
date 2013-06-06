<?php 
/*
Plugin Name: Git-code
Plugin URI: http://grapstore.com
Description: Access to your repository
Author: Sebastian Pożoga
Version: 1.0
Author URI: http://pozoga.eu
*/

wp_register_script('google-code-prettify-script', 'https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js');

include 'GitCodeParser.php';


//[github]
$GIT_FUNC_ATTS = array(
	'url'=>'SebastianPozoga/WP-Github-Plugin/blob/master/errors/noUrl.js',
	'baseurl' => "https://raw.github.com/",
	'section' => null
);

function github_func( $atts ){
	//prepare variables
	global $GIT_FUNC_ATTS;
	$atts = shortcode_atts($GIT_FUNC_ATTS, $atts);
	$url = $atts['baseurl'].$atts['url'];
	$section = $atts['section'];

	//get code
	$code = file_get_contents($url);

	//parse code
	if($section){
		$parser = new GitCodeParser();
		$code = $parser->get($section, $code);
	}
	
	//prepare color code
	wp_enqueue_script('google-code-prettify-script');
	$parts = pathinfo($url);
	$class = 'language-'.$parts['extension'];

	//create output
	return '<pre class="prettyprint"><code class="'.$class.'">'.$code.'</code></pre>';
}

add_shortcode( 'github', 'github_func' );
