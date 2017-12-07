<?php

namespace utils;

class API
{

    /**
     * Format the result of an API call
     * @param $status boolean
     * @param $message string
     * @param $data
     * @return array
     */
    public function result(boolean $status, string $message, $data)
    {
        return [
            "status"  => $status,
            "message" => $message,
            "data"    => $data
        ];
    }
}