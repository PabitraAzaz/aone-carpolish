<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default Home routes
$routes->get('/', 'Home::index');
$routes->get('/contact_us', 'Home::contact');
$routes->post('/contact_us', 'Home::contact');
$routes->get('/services', 'Home::services');
$routes->get('/single-service', 'Home::single_service');
$routes->get('/checkout', 'Home::checkout');
$routes->post('/checkout', 'Home::checkout');
$routes->get('/thankyou', 'Home::thankyou');
$routes->get('/home/download-booking-pdf', 'Home::downloadBookingPDF');
$routes->get('/test', 'Home::test');
$routes->get('/blogs', 'Home::blogs');
$routes->get('/before_after', 'Home::before_after');
$routes->get('/before_after_new', 'Home::before_after_new');
$routes->post('/before_after/generate-washed-car', 'Home::generate_washed_car');



$routes->match(['get', 'post'], '/login', 'Home::login');
$routes->match(['get', 'post'], '/registration', 'Home::registration');
$routes->match(['get', 'post'], '/profile', 'Home::profile');
$routes->match(['get', 'post'], '/logout', 'Home::profile_logout');


// $routes->get('/thank-you', 'Home::thank_you');


// Pabitra
$routes->group('brands', function ($routes) {
    $routes->get('(:segment)', 'Brands::index/$1');
    $routes->get('(:segment)/(:segment)/book-online', 'Brands::book_online/$1/$2');
});



// 


// Admin login/dashboard routes
$routes->group('admin/', function ($routes) {
    $routes->match(['get', 'post'], '/', 'Admin\LoginController::log_in');
    $routes->match(['get', 'post'], 'dashboard', 'Admin\DashboardController::dashboard');


    // -------------------------------------------Blogs-------------------------------------------//

    $routes->group('blogs', function ($routes) {
        $routes->get('/', 'AdminController\BlogController::index');
    });

    // -------------------------------------------End Blogs-------------------------------------------//



    // -------------------------------------------Slider-------------------------------------------//
    $routes->group('sliders', function ($routes) {
        $routes->get('/', 'Admin\SliderController::index');
        $routes->match(['get', 'post'], 'create/', 'Admin\SliderController::create');
        $routes->match(['get', 'post'], 'edit/(:num)', 'Admin\SliderController::edit/$1');
        $routes->get('delete/(:num)', 'Admin\SliderController::delete/$1');
    });
    // -------------------------------------------End Slider-------------------------------------------//



    // -------------------------------------------Brands-------------------------------------------//
    $routes->group('brands', function ($routes) {
        $routes->get('/', 'Admin\BrandsController::index');
        $routes->match(['get', 'post'], 'create/', 'Admin\BrandsController::create');
        $routes->match(['get', 'post'], 'edit/(:num)', 'Admin\BrandsController::edit/$1');
        $routes->get('delete/(:num)', 'Admin\BrandsController::delete/$1');
    });
    // -------------------------------------------End Brands-------------------------------------------//





    // -------------------------------------------Models-------------------------------------------//
    $routes->group('models', function ($routes) {
        $routes->get('/', 'Admin\BrandsController::modelIndex');
        $routes->match(['get', 'post'], 'create/', 'Admin\BrandsController::modelCreate');
        $routes->match(['get', 'post'], 'edit/(:num)', 'Admin\BrandsController::modelEdit/$1');
        $routes->get('delete/(:num)', 'Admin\BrandsController::modelDelete/$1');
    });
    // -------------------------------------------End Models-------------------------------------------//







    $routes->get('logout', 'Admin\DashboardController::logout');
});


// Contact messages
$routes->get('admin/Message', 'Admin\ContactController::message');
$routes->get('admin/message/delete/(:num)', 'Admin\ContactController::delete/$1');

// -----------------------------
// Admin Blogs Routes
// ----------------------------




// -----------------------------
// Public Blog Routes (using slug)
// -----------------------------

// Single blog view using slug, pointing to Admin\BlogsController::view
$routes->get('blogs/(:segment)', 'Admin\BlogsController::view/$1');

// Optional: If you want legacy numeric URLs (ID based), keep this
//$routes->get('single_blog/(:num)', 'Home::single_blog/$1');

// Frontend blogs listing (if needed)
$routes->get('blogs/', 'Home::blogs');
$routes->get('blogs/show/(:num)', 'Home::show/$1');





$routes->group('api/', ['namespace' => 'App\Controllers\Api'], function ($routes) {
    $routes->post('login', 'LoginController::log_in');

    $routes->post('place-order', 'Home::place_order');

    // $routes->post('place-order', 'Home::place_order');
    $routes->post('verify-payment', 'Home::verify_payment');
});
