---
title: Nginx Configuration
description: Learn how to configure Nginx with Michman.
extends: _layouts.documentation
section: content
---

# Nginx Configuration

[TOC]



## Production Configuration

Michman is running Python projects on your servers using a standard combination of [Nginx][nginx] -
flexible and widely adopted open-source web server as an entry point to your application
and for serving static assets and [Gunicorn][gunicorn] as a WSGI server for your Python application. 



## Customizing Configuration

Michman pre-configures Gunicorn for you. Most likely you'll never need to change this config,
but you can still do it on the **Configuration** page of your project.

We also create a sane Nginx config for you, but in case your project requires some customization -
you can do it as well on the **Configuration** page of your project.

Only the virtual server part of the Nginx config - `server {...}` block - is customizable,
the main Nginx config is stored on your servers. Changing it is not advised, since it may pose a
security risk to your project. Here's a full main Nginx config we use for a reference:

```nginx
# Run worker processes from this generic user.
user nginx;

# Nginx will try to guess the number of CPU cores available and launch workers on all of them.
worker_processes auto;

pid /var/run/nginx.pid;

# Include configs for various optional Nginx features.
include /etc/nginx/modules-enabled/*.conf;

events {
    # Connections per worker process.
    worker_connections 1024;
    #multi_accept on;
}

http {

    # Log files location
    access_log /var/log/nginx/access.log;
    error_log /var/log/nginx/error.log;

    # Don't include nginx version in error pages and 'Server' header.
    server_tokens off;

    # MIME-types setting are in a separate file.
    include mime_types;
    # By default, any response mime type that isn't configured in mime_types file will be served as a generic binary file to be downloaded.
    default_type application/octet-stream;

    # uWSGI settings are in a separate file.
    #include uwsgi_params;

    # Gzip settings are in a separate file.
    include gzip.conf;

    # These directives optimize the way nginx sends big static files on the OS level. Read docs for more info.
    sendfile    on;
    tcp_nopush  on;
    tcp_nodelay on;

    # Keep an idle connection to the upstream server open for 60 seconds.
    keepalive_timeout 60s;

    # Don't allow the browser to render the page inside an iframe on third-party resources.
    # Prevents clickjacking.
    add_header X-Frame-Options SAMEORIGIN;
    # Disable content-type sniffing on some browsers.
    add_header X-Content-Type-Options nosniff;
    # Enable XSS filter built into recent versions of most web-browsers.
    add_header X-XSS-Protection "1; mode=block";
    # Client's browser will not add "Referer" header to requests from the site's pages.
    # "Referer" may leak some info about the users to third-parties.
    add_header Referrer-Policy no-referrer;

    # Proper charset is crucial.
    charset utf-8;

    # Required to have long domain names in server {...} blocks, like v3 .onion addresses
    # or just long punycode domains.
    server_names_hash_bucket_size 128;

    # SSL settings are in a separate file.
    include ssl_params;

    # Include actual sites configs ("server" blocks).
    include /etc/nginx/sites-enabled/*;

}
```



[nginx]: https://nginx.org/en/docs/ "Official Nginx Open Source Documentation"
[gunicorn]: https://gunicorn.org "Gunicorn Official Website and Documentation"
