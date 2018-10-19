# cmx_util

PHP utility for use on the UTD Constellation project.

**This is not a wrapper for the [Cisco CMX API](https://www.cisco.com/c/en/us/td/docs/wireless/mse/10-2/api/b_cg_CMX_REST_API_Getting_Started_Guide/b_cg_CMX_REST_API_Getting_Started_Guide_chapter_01.html)**.

## Installing / Getting started

A quick introduction of the minimal setup you need to get a hello world up &
running.

### config.json
```json
{
    "username" : "",
    "password" : "",
    "map_endpoint" : "",
    "location_endpoint" : ""
}
```

```php
require_once("cmx_util.php");
$myNewRequest = new CMXRequest("config.json", ip);
$resp = $myNewRequest->getResponse();
```

This makes a request to the CMX proxy specified in config.json. The response is an associative array containing all of the information from the proxy.

### Initial Configuration

CMXUtil requires PHP >= 7.0 with curl.

## Features

CMXUtil abstracts the request to the CMX proxy away from the core Constellation server code. Currently, it simply parses the data but can be modified to change the data as needed.

## Configuration

All configuration for CMXUtil is done in a configuration JSON file with the following parameters.

| Key | Value |
| --- | ----- |
| username | Username for the CMX Proxy |
| password | Password for the CMX Proxy |
| map_endpoint | Map endpoint for the CMX proxy (.../maps?) |
| location_endpoint | Location endpoint for the CMX proxy (.../clients?) |