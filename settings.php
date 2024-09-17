<?php

//Copied code courtesy of Antwan

//Paths
const BASE_PATH = '/CLE2/'; //CLE2
const INCLUDES_PATH = __DIR__ . '/';
const DSN = 'mysql:host=localhost;dbname=DBNAME';
const USERNAME = 'root';
const PASSWORD = '';


//Custom error handler, so every error will throw a custom ErrorException
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});
