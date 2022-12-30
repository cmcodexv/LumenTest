<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('services', 'GetServiceController');
$router->get('serviceAvailability', 'GetHoursServiceAvaiblesController');
$router->post('booking', 'CreateBookingController');
