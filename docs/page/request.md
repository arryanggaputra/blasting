---
layout: default
permalink: /request
title: Request
description: Most of the routes for your application will be defined in the `src/Http/Routes.php` file. The simplest consist of a URI and a Closure callback. Wildcard Routes, Request Verbs, Route Condition, Route Group.
---

# Routing


* [Basic Request](#basic-request)

## Basic Request
You may access all user input with a few simple methods. You do not need to worry about the HTTP verb used for the request, as input is accessed in the same way for all verbs.

**Retrieving An Input Value**
```php
$name = input('name');
```

**Retrieving A Default Value If The Input Value Is Absent**
```php
$name = input('name', 'Arryangga');
```


