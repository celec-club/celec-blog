<?php

if (!function_exists('generate_image_link')) {
    function generate_image_signature(string $imageName, string $width, string $height, string $resizeType): string
    {
        $key = config('imgproxy.imgproxy_key');
        $salt = config('imgproxy.imgproxy_salt');

        $keyBin = pack("H*", $key);
        if (empty($keyBin)) {
            die('Key expected to be hex-encoded string');
        }

        $saltBin = pack("H*", $salt);
        if (empty($saltBin)) {
            die('Salt expected to be hex-encoded string');
        }

        $path = "/rs:$resizeType:$width:$height/g:ce/format:webp/plain/local:///storage/app/public/$imageName";

        $signature = rtrim(strtr(base64_encode(hash_hmac('sha256', $saltBin . $path, $keyBin, true)), '+/', '-_'), '=');

        return $signature;
    }
}
