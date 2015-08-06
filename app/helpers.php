<?php

if (! function_exists('base_url')) {
    /**
     * @var string $input
     * @return string
     */
    function base_url($input = '')
    {
        $url = parse_url($input);

        return array_get($url, 'scheme') . '://' . array_get($url, 'host');
    }
}
