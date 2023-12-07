<?php

/**
 * Sample PHP code for youtube.videos.list
 * See instructions for running these code samples locally:
 * https://developers.google.com/explorer-help/code-samples#php
 */

if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
  throw new Exception(sprintf('Please run "composer require google/apiclient:~2.0" in "%s"', __DIR__ . '/../'));
}
require_once __DIR__ . '/../vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('API code samples');
$client->setScopes([
  'https://www.googleapis.com/auth/youtube.readonly',
]);

// TODO: For this request to work, you must replace
//       "YOUR_CLIENT_SECRET_FILE.json" with a pointer to your
//       client_secret.json file. For more information, see
//       https://cloud.google.com/iam/docs/creating-managing-service-account-keys
$client->setAuthConfig(__DIR__ . '/client_secret_138903699564-bapa5v6hr79h3cits2s2jdvde2b7i89l.apps.googleusercontent.com.json');
$client->setAccessType('offline');

// Request authorization from the user.

$client->setRedirectUri('http://localhost:3000');
$authUrl = $client->createAuthUrl();
printf("Open this link in your browser:\n%s\n", $authUrl);
print('Enter verification code: ');
$authCode = trim(fgets(STDIN));

// Exchange authorization code for an access token.
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
$client->setAccessToken($accessToken);

// Define service object for making API requests.
$service = new Google_Service_YouTube($client);

$queryParams = [
  'id' => 'Ks-_Mh1QhMc'
];

$response = $service->videos->listVideos('snippet,contentDetails,statistics', $queryParams);
print_r($response);
