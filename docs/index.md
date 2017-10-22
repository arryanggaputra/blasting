---
layout: default
permalink: /
---

# Blasting - Frameworkless

[![Build Status](https://travis-ci.org/arryanggaputra/blasting.svg?branch=master)](https://travis-ci.org/arryanggaputra/blasting)
[![Total Downloads](https://poser.pugx.org/arryanggaputra/blasting/downloads)](https://packagist.org/packages/arryanggaputra/blasting)
[![Latest Unstable Version](https://poser.pugx.org/arryanggaputra/blasting/v/stable.svg)](https://packagist.org/packages/arryanggaputra/blasting)
[![License](https://poser.pugx.org/arryanggaputra/blasting/license.svg)](https://packagist.org/packages/arryanggaputra/blasting)

Blasting is a PHP Frameworkless that helps you quickly learn and run yet powerful web applications without framework, such as Laravel, Symfony, etc. I believe development must be an enjoyable, creative experience to be truly fulfilling. Blasting attempts to take the pain out of development by easing common tasks used in the majority of web projects.

While they’re great and can do some cool things (Laravel, Symfony, etc), they’re usually overkill for what you need and not “modularized” enough to where you can only use certain parts and kill the rest. Imagine when you are in the Restauran, what you want to buy is a meal, but they give you the whole Restaurant.

## Installation & First Run
```bash
mkdir newproject && cd newproject
wget https://github.com/arryanggaputra/blasting/archive/master.zip
unzip master.zip
mv blasting-master/* .
rm -R master.zip blasting-master
composer install
php -S localhost:8000 server.php
```

Open your browser and go to `http://localhost:8000`


## Big Thanks
- [PHP League Router](https://github.com/thephpleague/route) for handling the fastest routing than Laravel
- [Whoops](https://github.com/filp/whoops) PHP errors for cool kids
- [Zend Diactoros](https://github.com/zendframework/zend-diactoros) PSR-7 HTTP Message implementation
- [Twig Template](https://twig.symfony.com) The flexible, fast, and secure template engine for PHP
