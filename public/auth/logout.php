<?php

$basePath = dirname(__DIR__, 2);
require_once $basePath . '/config/bootstrap.php';

use App\Auth\LogoutUser;

LogoutUser::logout();