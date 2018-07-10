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
        return base64_encode($this->config["username"] . ":" . $this->config["password"]);
    }

    public function send() {
        return $this->basic();
    }
}