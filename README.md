# Tanda API PHP Library


[![Latest Stable Version](https://poser.pugx.org/razorcreations/tanda-php/v/stable)](https://packagist.org/packages/razorcreations/tanda-php) [![Total Downloads](https://poser.pugx.org/razorcreations/tanda-php/downloads)](https://packagist.org/packages/razorcreations/tanda-php) [![License](https://poser.pugx.org/razorcreations/tanda-php/license)](https://packagist.org/packages/razorcreations/tanda-php)

This library uses GuzzleHttp to make API request to the Tanda API.

🚧 Please note this is very much a work in progress... 🚧

## Installation

1. `composer require "razorcreations/tanda-php"`

## Example

```php
<?php

$token = 'yourSecretTokenHere';

$tanda = new \RazorCreations\Tanda\APIClient($token);

$users = $tanda->getAllUsers();

```

## Tanda API Documentation

https://my.tanda.co/api/v2/documentation#top
