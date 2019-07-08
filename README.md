# Tanda API PHP Library

This library uses GuzzleHttp to make API request to the Tanda API.

## Installation

1. `composer require "razorcreations/tanda"`

## Example

```php
<?php

$token = 'yourSecretTokenHere';

$tanda = new \RazorCreations\Tanda($token);

$users = $tanda->getAllUsers();

```