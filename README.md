# cURL_SWAPI - Consuming SWAPI via cURL.

This PHP script is designed to retrieve data from the Star Wars API (SWAPI) related to characters, display their names, heights, and the films they appeared in. It also includes pagination functionality to navigate through the results.

**Here's a breakdown of how it works:**

1. The script constructs a URL to fetch data from the SWAPI, including the page parameter if provided in the URL.
2. It then uses cURL to make a GET request to the SWAPI endpoint.
3. The response is decoded from JSON format.
4. It iterates over the results, displaying each character's name, height, and the films they appeared in.
5. Pagination buttons are displayed to navigate through the results, including 'Previous' and 'Next' buttons and buttons for each page.

**Here's a summary of the pagination logic:**

- If there's a 'previous' page available, it displays a 'Previous' button.
- It displays buttons for each page based on the total number of results divided by 10 (since SWAPI returns 10 results per page).
- If there's a 'next' page available, it displays a 'Next' button.

**Explanation of curl_setopt lines:**

- `CURLOPT_SSL_VERIFYPEER`: This line sets the option to verify the peer's SSL certificate. By default, cURL verifies the SSL certificate of the server to ensure a secure connection. However, in some cases, such as when working with self-signed certificates or during development, you may want to disable this verification. Setting it to `false` means that cURL will not verify the SSL certificate.

- `CURLOPT_RETURNTRANSFER`: This line sets the option to return the transfer as a string instead of outputting it directly. When set to `true`, cURL will return the response as a string from `curl_exec()` instead of outputting it directly to the browser.

- `CURLOPT_CUSTOMREQUEST`: This line sets a custom request method for the cURL transfer. By default, cURL performs a GET request. However, this line explicitly sets the request method to GET, which is redundant in this case but can be useful if you want to explicitly specify the request method for clarity.

- `CURLOPT_HTTPHEADER`: With these custom headers, you can include additional information in your cURL request, such as specifying the format of the data being sent or providing authentication credentials. This is useful for interacting with APIs that require specific headers to be present in the HTTP request.

These options are set to customize the behavior of the cURL request according to the requirements of the API being accessed.

Overall, this script provides a basic interface to interact with SWAPI and view information about Star Wars characters with pagination support.