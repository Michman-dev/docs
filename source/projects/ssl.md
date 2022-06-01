---
title: HTTPS and SSL
description: Configure SSL on your servers.
extends: _layouts.documentation
section: content
---

# SSL and HTTPS

[TOC]



## SSL Certificate

To use serve your project using the encrypted HTTPS protocol you will need to receive
an SSL certificate on your server.

Michman uses Let's Encrypt to receive free industry standard SSL certificates for your servers.

Go to your server's **SSL** page and type the domain to request a certificate for.

:::info
You should have you DNS configured such that the server is accessible by your domain before requesting a certificate,
otherwise the request will fail.
:::

As soon as your server receives an SSL certificate, 
the project that uses the domain will have HTTPS enabled automatically.
