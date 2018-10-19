<?php
class CMXRequest {
    // private instance variables
    private $config;
    private $ip;
    private $response;

    /**
     * Constructor for CMXRequest object
     * config_path: path to config.json with format specified in README.md
     * ip: ip to be looked up
     */
    public function __construct($config_path, $ip) {
        $this->config = json_decode(file_get_contents($config_path), true);
        $this->ip = $ip;
        $this->send();
    }

    /**
     * Return the ip associated with this request
     */
    public function getIP() {
        return $this->ip;
    }

    /**
     * Return the response information from the CMX proxy
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * Return authentication string for header formatted according to RFC 7617
     */
    private function basic() {
        return "Basic " . base64_encode($this->config["username"] . ":" . $this->config["password"]);
    }

    /**
     * Send HTTP request to the CMX proxy
     */
    private function send() {
        $ch = curl_init();
        $query = http_build_query([ // create query string
            "ipAddress" => $this->ip
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return as string instead of outputting directly
        curl_setopt($ch, CURLOPT_URL, $this->config["location_endpoint"] . $query); // create query URL
        curl_setopt($ch, CURLOPT_HTTPHEADER, [ // add basic authentication header
            "Authorization: " . $this->basic()
        ]);

        $resp = curl_exec($ch); // send request
        curl_close($ch); // close request
        $this->response = json_decode($resp, true); // decode json into associative array
    }
}