<?php
/*
Plugin Name: WPTwit
Version: 1.1
Plugin URI: http://lakm.us/logit/
Description: Post to Twitter for posts created/updated with category="Twitter" based on Abraham' TwitterOauth. Used also Yourls URL Shortener.
Author: Arif Kusbandono
Author URI: http://lakm.us

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

$site_url = get_option('siteurl');
$twitcallback_url = $site_url .'/?is_twitter';

function wptwit_defaults() {
	$wptwit__preset = array();
	$wptwit__preset['oauth_key'] = 'C0*******************';
	$wptwit__preset['oauth_secret'] = 'V0***************************************';
	$wptwit__preset['oauth_token'] = 'after-allowed';
	$wptwit__preset['oauth_token_secret'] = 'after-allowed';
	$wptwit__preset['access_token'] = 'get back to this page';
	$wptwit__preset['access_token_secret'] = 'once allowed apps';
	return $wptwit__preset;
}

function wptwit_activate() {
	update_option('wptwit_settings', wptwit_defaults());
}

register_activation_hook(__FILE__,'wptwit_activate');

function wptwit_deactivate() {
	delete_option('wptwit_settings');
}

register_deactivation_hook(__FILE__,'wptwit_deactivate');


function wptwit_options() {
	global $site_url;
	$message = '';
	$options = get_option('wptwit_settings');
	if ($_POST) {
		if ( isset($_POST['oauth_key']) && isset($_POST['oauth_secret']) ) {
			if ( !isset($_POST['access_token']) && !isset($_POST['access_token_secret']) ) {
				$options['oauth_key'] = $_POST['oauth_key'];
				$options['oauth_secret'] = $_POST['oauth_secret'];
				update_option('wptwit_settings', $options);
				$message = '<div class="updated"><p>' . $options['oauth_key'] . 'x' . $options['oauth_secret'] .'<strong>&nbsp; Options saved.</strong></p></div>';	
				
				echo '<div class="wrap">';
				echo '<h2>WPTwit Options</h2>';
				echo $message;
				echo '<form method="post" action="options-general.php?page=wptwit.php">';
				echo "<p>Welcome to the WPTwit plugin options menu! Here you set first Key and Secret.</p>";
				echo '<h3>Key-Secret</h3>' . "\n";
				echo '<table class="form-table">' . "\n";
				echo '<tr><th scope="row">Key</th><td>' . "\n";
				echo '<input type="text" name="oauth_key" value="' . $options['oauth_key'] . '" />';
				echo '</td></tr>' . "\n";
				echo '<tr><th scope="row">Secret</th><td>' . "\n";
				echo '<input type="text" name="oauth_secret" value="' . $options['oauth_secret'] . '" />';
				echo '</td></tr>' . "\n";
				echo '</table>' . "\n";
				echo '<h3>Alloow This Apps!</h3>' . "\n";
				echo 'Sign in to Twitter and allow this application and then go back to this setting' . "\n";
				echo 'and fill in the required access token once you have allowed' . "\n";
				echo 'and saved options again' . "\n";
				echo '<p class="submit"><a href="'. $site_url .'/?is_twitter=init" target="_blank"><img src="'. WP_PLUGIN_URL .'/wptwit/images/lighter.png" alt="Sign in with Twitter"/></a></p>' . "\n";
				echo '<h3>Access-Token</h3>' . "\n";
				echo '<table class="form-table">' . "\n";
				echo '<tr><th scope="row">access-token</th><td>' . "\n";
				echo '<input type="text" name="access_token" value="' . $options['access_token'] . '" />';
				echo '</td></tr>' . "\n";
				echo '<tr><th scope="row">access-token-secret</th><td>' . "\n";
				echo '<input type="text" name="access_token_secret" value="' . $options['access_token_secret'] . '" />';
				echo '</td></tr>' . "\n";
				echo '</table>' . "\n";
				echo '<p class="submit"><input class="button-primary" type="submit" method="post" value="Update Options"></p>';
				echo '</form>';


				echo '</div>';
			}
			else {
				$options['oauth_key'] = $_POST['oauth_key'];
				$options['oauth_secret'] = $_POST['oauth_secret'];
				$options['access_token'] = $_POST['access_token'];
				$options['access_token_secret'] = $_POST['access_token_secret'];
				update_option('wptwit_settings', $options);
				$message = '<div class="updated"><p>' . $options['access_ktoken'] .'<strong>&nbsp; Options saved.</strong></p></div>';
				
				echo '<div class="wrap">';
				echo '<h2>WPTwit Options</h2>';
				echo $message;
				echo '<form method="post" action="options-general.php?page=wptwit.php">';
				echo "<p>Welcome to the WPTwit plugin options menu! Here you set first Key and Secret.</p>";
				echo '<h3>Key-Secret</h3>' . "\n";
				echo '<table class="form-table">' . "\n";
				echo '<tr><th scope="row">Key</th><td>' . "\n";
				echo '<input type="text" name="oauth_key" value="' . $options['oauth_key'] . '" />';
				echo '</td></tr>' . "\n";
				echo '<tr><th scope="row">Secret</th><td>' . "\n";
				echo '<input type="text" name="oauth_secret" value="' . $options['oauth_secret'] . '" />';
				echo '</td></tr>' . "\n";
				echo '</table>' . "\n";
				echo '<h3>Alloow This Apps!</h3>' . "\n";
				echo 'Sign in to Twitter and allow this application and then go back to this setting' . "\n";
				echo 'and fill in the required access token once you have allowed' . "\n";
				echo 'and saved options again' . "\n";
				echo '<p class="submit"><a href="'. $site_url .'/?is_twitter=init" target="_blank"><img src="'. WP_PLUGIN_URL .'/wptwit/images/lighter.png" alt="Sign in with Twitter"/></a></p>' . "\n";
				echo '<h3>Access-Token</h3>' . "\n";
				echo '<table class="form-table">' . "\n";
				echo '<tr><th scope="row">access-token</th><td>' . "\n";
				echo '<input type="text" name="access_token" value="' . $options['access_token'] . '" />';
				echo '</td></tr>' . "\n";
				echo '<tr><th scope="row">access-token-secret</th><td>' . "\n";
				echo '<input type="text" name="access_token_secret" value="' . $options['access_token_secret'] . '" />';
				echo '</td></tr>' . "\n";
				echo '</table>' . "\n";
				echo '<p class="submit"><input class="button-primary" type="submit" method="post" value="Update Options"></p>';
				echo '</form>';


				echo '</div>';				
					
				
			}
		}
//		update_option('wptwit_settings', $options);
//		$message = '<div class="updated"><p>' . $options['oauth_key'] . 'x' . $options['oauth_secret'] .'<strong>&nbsp; Options saved.</strong></p></div>';	
		
	}
	else {
	echo '<div class="wrap">';
	echo '<h2>WPTwit Options</h2>';
	echo $message;
	echo '<form method="post" action="options-general.php?page=wptwit.php">';
	echo "<p>Welcome to the WPTwit plugin options menu! Here you set first Key and Secret.</p>";
	echo '<h3>Key-Secret</h3>' . "\n";
	echo '<table class="form-table">' . "\n";
	echo '<tr><th scope="row">Key</th><td>' . "\n";
	echo '<input type="text" name="oauth_key" value="' . $options['oauth_key'] . '" />';
	echo '</td></tr>' . "\n";
	echo '<tr><th scope="row">Secret</th><td>' . "\n";
	echo '<input type="text" name="oauth_secret" value="' . $options['oauth_secret'] . '" />';
	echo '</td></tr>' . "\n";
	echo '</table>' . "\n";
	echo '<p class="submit"><input class="button-primary" type="submit" method="post" value="Update Options"></p>';
	echo '</form>';


	echo '</div>';
	}
}

function wptwit_AddPage() {
	add_options_page('WPTwit Options', 'WPTwit', '8', 'wptwit.php', 'wptwit_options');
}

add_action('admin_menu', 'wptwit_AddPage');

function yourls_api_call($long_url = '') {
	// EDIT THIS: your auth parameters
	$username = '*************';
	$password = '*************';
	$format = 'simple';				// output format: 'simple'
	
	// EDIT THIS: the URL of the API file
	$yourls_api_url = 'http://lakm.us/go/yourls-api-custom.php';
	if ( !empty($long_url) ) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $yourls_api_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);            // No header in the result
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
		curl_setopt($ch, CURLOPT_POST, 1);              // This is a POST request
		curl_setopt($ch, CURLOPT_POSTFIELDS, array(     // Data to POST
		'url'      => $long_url,
		'format'   => $format,
		'action'   => 'shorturl',
		'username' => $username,
		'password' => $password
		));

		// Fetch and return content
		$short_url = curl_exec($ch);
		curl_close($ch);
	}
	return $short_url;
}

function wptwit_url_service_len() {
	$url_service_len = strlen('{cont} http://lakm.us/123');
	return $url_service_len;
}

function wptwit_trim_post($long_post = '', $max_postlen = '') {
	if ( !empty($long_post) ) {
		$url_len = wptwit_url_service_len();
		if( strlen($long_post) > ($max_postlen) ) {
			$short_post = substr($long_post, 0, (($max_postlen - 1) - $url_len));
		}
		else {
			$short_post = $long_post;
		}
	}
	return $short_post;
}

function wptwit_init_oauth() {
	global $twitcallback_url;
	$options = get_option('wptwit_settings');
	 if(!class_exists('TwitterOAuth')) {
		include_once(WP_PLUGIN_DIR.'/wptwit/twitteroauth/twitteroauth.php');
	}

	/* Build TwitterOAuth object with client credentials. */
	$connection = new TwitterOAuth($options['oauth_key'], $options['oauth_secret']);
	 
	/* Get temporary credentials. */
	
	$request_token = $connection->getRequestToken($twitcallback_url .'=permanent');
	$options['oauth_token'] = $request_token['oauth_token'];
	$options['oauth_token_secret'] = $request_token['oauth_token_secret'];
	update_option('wptwit_settings', $options);
	$url = $connection->getAuthorizeURL($options['oauth_token']);
	return $url;
}

function wptwit_callback_oauth() {
	global $twitcallback_url;
	$options = get_option('wptwit_settings');
	 if(!class_exists('TwitterOAuth')) {
		include_once(WP_PLUGIN_DIR.'/wptwit/twitteroauth/twitteroauth.php');
	}

	/* Build TwitterOAuth object with client credentials. */
	$connection = new TwitterOAuth($options['oauth_key'], $options['oauth_secret'], $options['oauth_token'], $options['oauth_token_secret']);
	 
	/* Get permanent credentials. */
	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	$options['access_token'] = $access_token['oauth_token'];
	$options['access_token_secret'] = $access_token['oauth_token_secret'];
	unset($options['oauth_token']);
	unset($options['oauth_token_secret']);
	update_option('wptwit_settings', $options);
	return $access_token;
}

function wptwit_test_oauth() {
	$options = get_option('wptwit_settings');
	$content = '';
	 if(!class_exists('TwitterOAuth')) {
		include_once(WP_PLUGIN_DIR.'/wptwit/twitteroauth/twitteroauth.php');
	}
	if ($options['access_token'] && $options['access_token_secret']) {
		$connection = new TwitterOAuth($options['oauth_key'], $options['oauth_secret'], $options['access_token'], $options['access_token_secret']);
		$content = $connection->get('account/rate_limit_status');
	}
	return $content;
}

function wptwit_parse_request($wp) {
	global $site_url;
    // only process requests with "is_twitter=init"
    if ( array_key_exists('is_twitter', $wp->query_vars) ) {
       		if ( $wp->query_vars['is_twitter'] == 'init') {
				$oauth_url = wptwit_init_oauth();
				//$oauth_url = 'xdFrfg';
				$oauth_url = '<a href="'. $oauth_url .'"><img src="'. WP_PLUGIN_URL .'/wptwit/images/lighter.png" alt="Sign in with Twitter"/></a></a>';
				wp_die('Ready for Callback: '. $oauth_url,'Ready for Callback');
			
			}
			elseif ( $wp->query_vars['is_twitter'] == 'permanent') {
				$access_token = wptwit_callback_oauth();
				$msg = $access_token['oauth_token'];
				$msg = 'Access token: '. $msg . "\n" . 'Access secret: '. $access_token['oauth_token_secret'];
				wp_die($msg,'lakm.us Twitter API Callback');	
			}
			elseif ( $wp->query_vars['is_twitter'] == 'testapi') {
				$content =  wptwit_test_oauth();
				$msg = $content->remaining_hits;
				$msg = 'Test API. Remaining hits: '. $msg . "\n";
				wp_die($msg,'WP Twit API Test');	
			}
			else {
				$msg = 'WPTwit Failed';
				wp_die($msg,'Failed');
			}
		}
}


function wptwit_query_vars($vars) {
    $vars[] = 'is_twitter';
    return $vars;
}

function wptwit_update_status($post_ID) {
	$options = get_option('wptwit_settings');
	$key = $options['oauth_key'];
	$secret = $options['oauth_secret'];
	$token = $options['access_token'];
	$token_secret = $options['access_token_secret'];
	
	$my_post = get_post($post_ID);
	$my_category = get_the_category($post_ID);
	$my_permalink = get_permalink($post_ID);
	$status_text = $my_post->post_content;
	
	$max_postlen = '140';
	if ( strlen($status_text) > $max_postlen ) {
		$status_url = yourls_api_call($my_permalink);
		$status_text = wptwit_trim_post($status_text, $max_postlen);
		//$status_text = $status_text ."\t". $status_url;
		$status_text = $status_text . "\t" . '{cont}'. "\t" . $status_url;
		$message = array( 'status' => $status_text);
	}
	else {
		$message = array( 'status' => $status_text);
	}
	
    $push_Twitter = "false"; //default status of push status to facebook is false
    foreach (get_the_category($post_ID) as $my_category) {
		if ($my_category->cat_name == "Twitter") {
				$push_Twitter = "true";
		}
	}
	
	if(!class_exists('TwitterOAuth')) {
		include_once(WP_PLUGIN_DIR.'/wptwit/twitteroauth/twitteroauth.php');
	}

	
	if ( $push_Twitter == "true") {
		$connection = new TwitterOAuth($key, $secret, $token, $token_secret);
		$connection->post('statuses/update', $message);
		return $connection->http_code;
	}
	return 'nothing';
}

add_filter('query_vars', 'wptwit_query_vars');	
add_action('wp', 'wptwit_parse_request');
add_action('publish_post','wptwit_update_status');

?>
