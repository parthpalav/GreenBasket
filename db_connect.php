<?php
/**
 * Database Connection Script
 * 
 * Establishes a connection to the greenbasket database using PostgreSQL
 */

// Get database credentials from environment variables
$host = getenv('PGHOST');
$port = getenv('PGPORT');
$username = getenv('PGUSER');
$password = getenv('PGPASSWORD');
$database = getenv('PGDATABASE');

// Connection string
$dsn = "pgsql:host=$host;port=$port;dbname=$database;user=$username;password=$password";

try {
    // Create PDO instance for PostgreSQL connection
    $conn = new PDO($dsn);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
