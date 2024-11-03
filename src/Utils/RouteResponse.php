<?php


namespace App\Utils;




class RouteResponse {
    public int $code = 200;
    public string $content_type = "text/html";
    public string $charset = "utf-8";
    public string $content = "";


    public function build() {
        http_response_code($this->code);
        header("Content-Type: {$this->content_type}; charset={$this->charset}");
        echo $this->content;
    }
}