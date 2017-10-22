---
layout: default
permalink: /routing
title: Routing
description: Most of the routes for your application will be defined in the `src/Http/Routes.php` file. The simplest consist of a URI and a Closure callback. Wildcard Routes, Request Verbs, Route Condition, Route Group.
---

# Routing

Most of the routes for your application will be defined in the `src/Http/Routes.php` file. The simplest consist of a URI and a Closure callback.

* [Wildcard Routes](#wildcard-routes)
* [Request Verbs](#request-verbs)
* [Route Condition](#route-condition)
* [Route Group](#route-group)	

## Wildcard Routes
Wilcard routes allow a route to respond to dynamic parts of a URI. If a route has dynamic parts, they will be passed in to the controller as an associative array of arguments.
```php

$router->map('GET', '/user/{id}/{name}', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    // $args = [
    //     'id'   => {id},  // the actual value of {id}
    //     'name' => {name} // the actual value of {name}
    // ];

    return $response;
});
```

Dynamic parts of a URI can also be limited to match certain requirements.
```php

// this route will only match if {id} is numeric and {name} is a alpha
$router->map('GET', '/user/{id:number}/{name:word}', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    // $args = [
    //     'id'   => {id},  // the actual value of {id}
    //     'name' => {name} // the actual value of {name}
    // ];

    return $response;
});
```
There are several built in conditions for dynamic parts of a URI.
* `number`
* `word`
* `alphanum_dash`
* `slug`
* `uuid`

Dynamic parts can also be set as any regular expression such as `{id:[0-9]+}`.

For convenience, you can also register your own aliases for a particular regular expression using the `addPatternMatcher` method on `RouteCollection`. For example:
```php

$router->addPatternMatcher('wordStartsWithM', '(m|M)[a-zA-Z]+');

$router->map('GET', 'user/mTeam/{name:wordStartsWithM}', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    // $args = [
    //     'id'   => {id},  // the actual value of {id}
    //     'name' => {name} // the actual value of {name}
    // ];

    return $response;
});
```
The above pattern matcher will create an internal regular expression string: `{$1:(m|M)[a-zA-Z]+}`, where `$1` will interpret to `name`, the variable listed before the colon.


## Request Verbs
Route has convenience methods for setting routes that will respond differently depending on the HTTP request method.
```php
$route->get('/acme/route', 'Acme\Controller::getMethod');
$route->post('/acme/route', 'Acme\Controller::postMethod');
$route->put('/acme/route', 'Acme\Controller::putMethod');
$route->patch('/acme/route', 'Acme\Controller::patchMethod');
$route->delete('/acme/route', 'Acme\Controller::deleteMethod');
$route->head('/acme/route', 'Acme\Controller::headMethod');
$route->options('/acme/route', 'Acme\Controller::optionsMethod');
```

## Route Condition
There are times when you may wish to add further conditions to route matching other than the request verb and URI. Route allows this by chaining further conditions to the route definition.
```php
// this route will respond to http://example.com/acme/route
// or https://example.com/acme/route
$route->map('GET', '/acme/route', 'AcmeController::method')->setHost('example.com');

// this route will only respond to https://example.com/acme/route
$route->map('GET', '/acme/route', 'AcmeController::method')->setScheme('https')->setHost('example.com');
```

## Route Group	
Route groups are a way of organising your route definitions, they allow us to provide conditions and a prefix across multiple routes. As an example, this would be useful for an admin area of a website.
```php
$route->group('/admin', function ($route) {
    $route->map('GET', '/acme/route1', 'AcmeController::actionOne');
    $route->map('GET', '/acme/route2', 'AcmeController::actionTwo');
    $route->map('GET', '/acme/route3', 'AcmeController::actionThree');
});
```
The above code will define the following routes.
```
GET /admin/acme/route1
GET /admin/acme/route2
GET /admin/acme/route3
```

Route conditions can be applied to a group and will be matched across all routes contained in that group, specific routes within the group can override this functionality as displayed below.
```php
$route->group('/admin', function ($route) {
    $route->map('GET', '/acme/route1', 'AcmeController::actionOne');
    $route->map('GET', '/acme/route2', 'AcmeController::actionTwo')->setScheme('https');
    $route->map('GET', '/acme/route3', 'AcmeController::actionThree');
})
	->setScheme('http')
	->setHost('example.com');
```
The above code will define the following routes.
```
GET http://example.com/admin/acme/route1
GET https://example.com/admin/acme/route2
GET http://example.com/admin/acme/route3
```

More routing information can be read on [here](http://route.thephpleague.com)

