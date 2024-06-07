<?php

namespace Helpers;


class InputValidator
{
    public static function sanitize($data)
    {
        return htmlspecialchars(strip_tags($data));
    }

    public static function validateTaskData($title, $description, $status = null)
    {
        return !empty($title) && !empty($description) && ($status === null || is_bool($status) || in_array($status, [0, 1]));
    }
}