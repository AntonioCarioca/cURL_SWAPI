<?php

// Define the base URL of the Star Wars API.
$base_url = 'https://swapi.dev/api/people/';

// Check if the 'page' parameter is passed in the URL. If not, set it to 1.
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Starting page

// Construct the request URL, including the page parameter
$url = $base_url . '?page=' . $page;

// Initialize the cURL library and set some options.
$ch = curl_init($url);

// Set custom headers for the request
$headers = [
	 // Set the Content-Type header to indicate JSON content.
	'Content-Type: application/json'
];

curl_setopt_array($ch, [
	// Set the option to verify the peer's SSL certificate. In this case, 
	// it's set to false to ignore SSL verification.
	CURLOPT_SSL_VERIFYPEER => false,
	// Set the option to return the transfer as a string instead of
	// outputting it directly.
	CURLOPT_RETURNTRANSFER => true,
	// Set a custom request method for the cURL transfer. 
	// In this case, it's a GET request.
	CURLOPT_CUSTOMREQUEST  => 'GET',
	// This option is used to set an array of HTTP headers to include in the request.
	// Each element in the array represents a single header line in the HTTP request.
	CURLOPT_HTTPHEADER => $headers
]);

// Execute the request and decode the JSON response into a PHP object.
$output = json_decode(curl_exec($ch));

// Loop through the results of the request
foreach ($output->results as $item) {
    // Display the name and height of each character
    echo 'Name: ' . $item->name . '<br>';
    echo 'Height: ' . $item->height . '<br>';
    
    // Loop through the films in which each character appeared
    foreach ($item->films as $film) {
    	// Display the title of the film
        echo 'Film: ' . $film . '<br>';
    }
    // Add a horizontal line between the results of each character.
    echo '<hr>';
}

// Pagination buttons
echo '<div>';
if ($output->previous != null) {
    // 'Previous' button if there is a previous page.
    echo '<a href="?page=' . ($page - 1) . '">Previous</a> | ';
}

// Display page numbers as buttons
for ($i = 1; $i <= ceil($output->count / 10); $i++) {
    if ($i == $page) {
        // Current page in bold
        echo '<strong>' . $i . '</strong> ';
    } else {
        // Other pages as links
        echo '<a href="?page=' . $i . '">' . $i . '</a> ';
    }
}

if ($output->next != null) {
    // 'Next' button if there is a next page.
    echo '| <a href="?page=' . ($page + 1) . '">Next</a>';
}
 // Close the pagination buttons div.
echo '</div>';
