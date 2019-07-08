# Tanda API PHP Library

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