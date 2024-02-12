<?php
// Assume $userTime is the datetime input in the user's local timezone
$userTime = '2024-02-12 10:00:00'; // Example datetime
$userTimezone = 'America/New_York'; // User's timezone

// Create a DateTime object with the user's local timezone
$dateTime = new DateTime($userTime, new DateTimeZone($userTimezone));

// Convert the time to UTC
$dateTime->setTimezone(new DateTimeZone('UTC'));

// Format the DateTime object for storage
$utcTime = $dateTime->format('Y-m-d H:i:s'); // Time in UTC for database storage
echo $utcTime;
