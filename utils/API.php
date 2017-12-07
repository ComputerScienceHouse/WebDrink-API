<?php

namespace WebDrinkAPI\Utils;

class API
{

    /**
     * Format the result of an API call
     * @param $status bool
     * @param $message string
     * @param $data
     * @return array
     */
    public function result(bool $status, string $message, $data)
    {
        return [
            "status"  => $status,
            "message" => $message,
            "data"    => $data
        ];
    }
}