<?php
class CMXRequest {
    private $config;
    private $ip;

    public function __construct($config_path, $ip) {
        $this->config = json_decode(file_get_contents($config_path), true);
        $this->ip = $ip;
    }

    public function getIP() {
        return $this->ip;
    }

    private function basic() {
        return "Basic " . base64_encode($this->config["username"] . ":" . $this->config["password"]);
    }

    public function send() {
        $ch = curl_init();
        $query = http_build_query([
            "ipAddress" => $this->ip
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->config["location_endpoint"] . $query);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: " . $this->basic()
        ]);

        $resp = curl_exec($ch);
        curl_close($ch);
        return json_decode($resp, true);
    }
}