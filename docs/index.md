---
layout: default
permalink: /
---

# Blasting - Frameworkless

[![Build Status](https://travis-ci.org/arryanggaputra/blasting.svg?branch=master)](https://travis-ci.org/arryanggaputra/blasting)
[![Total Downloads](https://poser.pugx.org/arryanggaputra/blasting/downloads)](https://packagist.org/packages/arryanggaputra/blasting)
[![Latest Unstable Version](https://poser.pugx.org/arryanggaputra/blasting/v/stable.svg)](https://packagist.org/packages/arryanggaputra/blasting)
[![License](https://poser.pugx.org/arryanggaputra/blasting/license.svg)](https://packagist.org/packages/arryanggaputra/blasting)

Blasting is a PHP Frameworkless that helps you quickly learn and run yet powerful web applications without framework, such as Laravel, Symfony, etc.

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