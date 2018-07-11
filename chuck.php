<?php

class ChuckQuote {
    public $text;

    public function __construct() {
        $this->text = $this->getQuote();
    }

    public function getQuote() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.chucknorris.io/jokes/random");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $resp = json_decode(curl_exec($ch), true);
        curl_close();
        return $resp["value"];
    }
}