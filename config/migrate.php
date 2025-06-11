<?php

$basePath = dirname(__DIR__);
$databasePath = $basePath . '/database/db.sqlite';
$migrationsPath = $basePath . '/database/migrations';

if (!file_exists($databasePath)) {
    touch($databasePath);
}

$db = new PDO("sqlite:" . $databasePath);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupérer tous les fichiers de migration
$migrationFiles = glob($migrationsPath . '/*.php');
sort($migrationFiles); // Pour exécuter dans l'ordre

foreach ($migrationFiles as $file) {
    echo "Executing migration: " . basename($file) . PHP_EOL;
    $migration = require $file;
    $migration($db);
}

echo "✅ Migrations terminées.\n";