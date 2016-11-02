<?php

class Response {

    public static function json($value) {
        echo json_encode($value);
        exit();
    }

}
