vcl 4.1;

backend default {
    .host = "php-apache-environment";
    .port = "80";
}

backend imageProxy {
    .host = "imgproxy";
    .port = "8080";
}

sub vcl_recv {
    if (req.url ~ "^/image-proxy-cdn/") {
        set req.url = regsub(req.url, "image-proxy-cdn/", "");
        set req.backend_hint = imageProxy;
    }
}
