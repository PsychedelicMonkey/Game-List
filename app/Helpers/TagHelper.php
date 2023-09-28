<?php

namespace App\Helpers;

class TagHelper
{
    public static function formatTags(string $tags): array
    {
        $arr = explode(',', $tags);
        $arr = array_map('trim', $arr);
        return array_map('ucfirst', $arr);
    }
}
