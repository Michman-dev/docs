---
title: Server Creation
description: Create servers with Michman.
extends: _layouts.documentation
section: content
---

# Creating Servers

[TOC]

## Overview

To create a server go to the Michman's [Server Dashboard][servers] (you need to be logged in).
But first you need to link Michman to your account on a supported [server provider][docs-providers].



## Server Types

Michman can create and manage several types of servers for you:

- App Servers
- Web Servers

:::info
More server types and software options are coming soon:

- Load Balancers
- Database Servers
- Cache Servers
- Worker Servers
- ...and more!

Drop me a note on bogdan@michman.dev if you have some specific need,
I'm happy to help with your project!
:::

### App Servers

Application servers are configured to include everything you need to deploy a typical Python/Django application
within a single server. They are provisioned with the following software:

- Python
- Nginx
- Gunicorn
- MySQL
- Redis
- Supervisor
- Uncomplicated Firewall (UFW)

Application servers are the most typical type of server provisioned and managed by Michman.
If you're unsure which server type you need, most likely you should choose an application server.

### Web Servers

Web servers contain the web server software you need to deploy a typical Python/Django application,
but they do not contain a database or cache.
These servers are meant to be networked to other dedicated database and cache servers or to managed database services.
Web servers are provisioned with the following software:

- Python
- Nginx
- Gunicorn
- Supervisor
- Uncomplicated Firewall (UFW)



## Region and Size

When you start creating your server, Michman will pull up a list of server sizes and regions available specifically
for your account on your chosen server provider.



[servers]: https://michman.dev/servers "Michman Server Dashboard"
[docs-providers]: /servers/providers "Michman Docs Server Providers"
