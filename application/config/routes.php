<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// WEBSITE ROUTES
$route['home'] = 'front_end/Home';

// BACKOFFICE ROUTES
	// LOGIN ROUTES
	$route['alfredatwork/login/auth'] = 'alfred_at_work/Login/auth';
	$route['alfredatwork/logout'] = 'alfred_at_work/Login/logout';
	$route['alfredatwork/login'] = 'alfred_at_work/Login';
	$route['alfredatwork'] = 'alfred_at_work/Login';

	// FORGOT PASSWORD ROUTES
	$route['alfredatwork/forgot-password/recovery-email'] = 'alfred_at_work/Forgot_password/send_recovery_email';
	$route['alfredatwork/forgot-password'] = 'alfred_at_work/Forgot_password';

	// SET PASSWORD ROUTES
	$route['alfredatwork/set-password/update-password'] = 'alfred_at_work/Set_password/update_password';
	$route['alfredatwork/set-password/(:any)'] = 'alfred_at_work/Set_password/index/$1';

	// DASHBOARD ROUTES
	$route['alfredatwork/dashboard/archive_mailchimp'] = 'alfred_at_work/Dashboard/archive_mailchimp';
	$route['alfredatwork/dashboard/archive_system_data/(:any)'] = 'alfred_at_work/Dashboard/archive_system_data/$1';
	$route['alfredatwork/dashboard'] = 'alfred_at_work/Dashboard';

	// GALLERY ROUTES
	$route['alfredatwork/gallery/delete/(:any)'] = 'alfred_at_work/Gallery/delete/$1';
	$route['alfredatwork/gallery/insert'] = 'alfred_at_work/Gallery/insert';
	$route['alfredatwork/gallery/switch-status/(:any)'] = 'alfred_at_work/Gallery/switch_status/$1';
	$route['alfredatwork/gallery'] = 'alfred_at_work/Gallery';

	//HOME
	$route['alfredatwork/home'] = 'alfred_at_work/Home';

	// GALLERY DETAILS ROUTES
	$route['alfredatwork/gallery-details/highlight/(:any)'] = 'alfred_at_work/Gallery_details/highlight/$1';
	$route['alfredatwork/gallery-details/real-name/(:any)'] = 'alfred_at_work/Gallery_details/real_name/$1';
	$route['alfredatwork/gallery-details/artist-name/(:any)'] = 'alfred_at_work/Gallery_details/artist_name/$1';
	$route['alfredatwork/gallery-details/website/(:any)'] = 'alfred_at_work/Gallery_details/website/$1';
	$route['alfredatwork/gallery-details/phone/(:any)'] = 'alfred_at_work/Gallery_details/phone/$1';
	$route['alfredatwork/gallery-details/description/(:any)'] = 'alfred_at_work/Gallery_details/description/$1';
	$route['alfredatwork/gallery-details/header-picture/(:any)'] = 'alfred_at_work/Gallery_details/header_picture/$1';
	$route['alfredatwork/gallery-details/thumbnail-picture/(:any)'] = 'alfred_at_work/Gallery_details/thumbnail_picture/$1';
	$route['alfredatwork/gallery-details/(:any)'] = 'alfred_at_work/Gallery_details/index/$1';

	// ARTWORK ROUTES
	// $route['alfredatwork/artworks/delete/(:any)'] = 'alfred_at_work/Artworks/delete/$1';
	// $route['alfredatwork/artworks/insert'] = 'alfred_at_work/Artworks/insert';
	$route['alfredatwork/artworks/switch-status/(:any)'] = 'alfred_at_work/Artworks/switch_status/$1';
	$route['alfredatwork/artworks/(:any)'] = 'alfred_at_work/Artworks/index/$1';

	// ARTWORK DETAILS ROUTES
	$route['alfredatwork/artwork-details/thumbnail-picture/(:any)'] = 'alfred_at_work/Artwork_details/thumbnail_picture/$1';
	$route['alfredatwork/artwork-details/header-picture/(:any)'] = 'alfred_at_work/Artwork_details/header_picture/$1';
	$route['alfredatwork/artwork-details/availability/(:any)'] = 'alfred_at_work/Artwork_details/availability/$1';
	$route['alfredatwork/artwork-details/description/(:any)'] = 'alfred_at_work/Artwork_details/description/$1';
	$route['alfredatwork/artwork-details/price/(:any)'] = 'alfred_at_work/Artwork_details/price/$1';
	$route['alfredatwork/artwork-details/medium/(:any)'] = 'alfred_at_work/Artwork_details/medium/$1';
	$route['alfredatwork/artwork-details/year/(:any)'] = 'alfred_at_work/Artwork_details/year/$1';
	$route['alfredatwork/artwork-details/name/(:any)'] = 'alfred_at_work/Artwork_details/name/$1';
	$route['alfredatwork/artwork-details/(:any)'] = 'alfred_at_work/Artwork_details/index/$1';

	// GALLERY ROUTES
	// $route['alfredatwork/events/delete/(:any)'] = 'alfred_at_work/Events/delete/$1';
	// $route['alfredatwork/events/insert'] = 'alfred_at_work/Events/insert';
	$route['alfredatwork/events/switch-status/(:any)'] = 'alfred_at_work/Events/switch_status/$1';
	$route['alfredatwork/events'] = 'alfred_at_work/Events';

	// GALLERY DETAILS ROUTES
	$route['alfredatwork/event-details/thumbnail-picture/(:any)'] = 'alfred_at_work/Event_details/thumbnail_picture/$1';
	$route['alfredatwork/event-details/header-picture/(:any)'] = 'alfred_at_work/Event_details/header_picture/$1';
	$route['alfredatwork/event-details/eventbrit/(:any)'] = 'alfred_at_work/Event_details/eventbrit/$1';
	$route['alfredatwork/event-details/facebook/(:any)'] = 'alfred_at_work/Event_details/facebook/$1';
	$route['alfredatwork/event-details/address/(:any)'] = 'alfred_at_work/Event_details/address/$1';
	$route['alfredatwork/event-details/description/(:any)'] = 'alfred_at_work/Event_details/description/$1';
	$route['alfredatwork/event-details/date/(:any)'] = 'alfred_at_work/Event_details/date/$1';
	$route['alfredatwork/event-details/name/(:any)'] = 'alfred_at_work/Event_details/name/$1';
	$route['alfredatwork/event-details/(:any)'] = 'alfred_at_work/Event_details/index/$1';


//FRONT_END
$route['home'] = 'front_end/Home';
$route['shop'] = 'front_end/Shop';
$route['work-in-progress'] = 'front_end/Work_in_progress';
$route['artists/(:any)'] = 'front_end/Artists/index/$1';
$route['artworks/(:any)'] = 'front_end/Artworks/index/$1';
$route['payment-your-address'] = 'front_end/Payment_address';
$route['payment-your-address/save-user-data'] = 'front_end/Payment_address/save_user_data';
$route['payment-recapituatif/(:any)'] = 'front_end/Payment_recapitulatif/index/$1';
$route['host-an-exhibition'] = 'front_end/Host_an_exhibition';
$route['where-is-the-boat'] = 'front_end/Where_is_the_boat';
$route['host-an-exhibition'] = 'front_end/Host_an_exhibition';
$route['services'] = 'front_end/Services';
$route['support-us'] = 'front_end/Support_us';
$route['support-us/newsletter'] = 'front_end/Support_us/newsletter';

// SYSTEME ROUTES
$route['default_controller'] = 'front_end/Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;	