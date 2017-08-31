<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['tables']['users']           = 'users';
$config['tables']['groups']          = 'groups';
$config['tables']['users_groups']    = 'users_groups';
$config['tables']['login_attempts']  = 'login_attempts';

$config['join']['users']  = 'user_id';
$config['join']['groups'] = 'group_id';

$config['hash_method']    = 'bcrypt';	// sha1 or bcrypt, bcrypt is STRONGLY recommended
$config['default_rounds'] = 8;		// This does not apply if random_rounds is set to true
$config['random_rounds']  = FALSE;
$config['min_rounds']     = 5;
$config['max_rounds']     = 9;
$config['salt_prefix']    = version_compare(PHP_VERSION, '5.3.7', '<') ? '$2a$' : '$2y$';

$config['site_title']                 = "Alfred At Work";       // Site Title, example.com
$config['admin_email']                = "no-replyl@alfredatwork.com.au"; // Admin Email, admin@example.com
$config['default_group']              = 'members';           // Default group, use name
$config['admin_group']                = 'admin';             // Default administrators group, use name
$config['identity']                   = 'email';             // You can use any unique column in your table as identity column. The values in this column, alongside password, will be used for login purposes
$config['min_password_length']        = 8;                   // Minimum Required Length of Password
$config['max_password_length']        = 20;                  // Maximum Allowed Length of Password
$config['email_activation']           = FALSE;               // Email Activation for registration
$config['manual_activation']          = FALSE;               // Manual Activation for registration
$config['remember_users']             = TRUE;                // Allow users to be remembered and enable auto-login
$config['user_expire']                = 86500;               // How long to remember the user (seconds). Set to zero for no expiration
$config['user_extend_on_login']       = TRUE;                // Extend the users cookies every time they auto-login
$config['track_login_attempts']       = TRUE;                // Track the number of failed login attempts for each user or ip.
$config['track_login_ip_address']     = TRUE;                // Track login attempts by IP Address, if FALSE will track based on identity. (Default: TRUE)
$config['maximum_login_attempts']     = 5;                   // The maximum number of failed login attempts.
$config['lockout_time']               = 600;                 // The number of seconds to lockout an account due to exceeded attempts
$config['forgot_password_expiration'] = 0;                   // The number of milliseconds after which a forgot password request will expire. If set to 0, forgot password requests will not expire.

$config['remember_cookie_name'] = 'remember_code';
$config['identity_cookie_name'] = 'identity';

$config['use_ci_email'] = TRUE; // Send Email using the builtin CI email class, if false it will return the code and the identity
$config['email_config'] = array(
	'mailtype' => 'html',
	'protocol' => 'smtp',
	'smtp_host' => 'ssl://smtp.gmail.com',
	'smtp_user' => 'atworkalfred@gmail.com',
	'smtp_pass' => 'Pptml2zuO9',
	'smtp_port' => 465,
	'newline' => "\r\n",
	'charset' => 'utf-8'
);

$config['email_templates'] = 'alfred_at_work/templates/emails/';
$config['email_activate'] = 'activate.tpl.php';
$config['email_forgot_password'] = 'forgot_password.tpl.php';
$config['email_forgot_password_complete'] = 'set_password.tpl.php';

$config['salt_length'] = 22;
$config['store_salt']  = FALSE;

$config['delimiters_source']       = 'config'; 	// "config" = use the settings defined here, "form_validation" = use the settings defined in CI's form validation library
$config['message_start_delimiter'] = ''; 	// Message start delimiter
$config['message_end_delimiter']   = ''; 	// Message end delimiter
$config['error_start_delimiter']   = '';		// Error message start delimiter
$config['error_end_delimiter']     = '';	// Error message end delimiter
