---
title: Introduction
description: Learn how to deploy your Django project with Michman.
extends: _layouts.documentation
section: content
---

# Introduction

[TOC]



## What is Michman?

**Michman** is a server management and project deployment service tailored for applications built with Django or Python in general.

After connecting to your preferred server provider, Michman will provision a new servers,
apply a number of security hardening practices and install:

- Python
- venv
- Gunicorn
- Nginx
- MySQL, PostgreSQL or MariaDB
- Redis or Memcached
- Uncomplicated Firewall (UFW)
- Logrotate
- Automatic Security Updates
- ...and more!

And then Michman will help you with managing daemons, queues, scheduled jobs, SSL certificates.

After a server is ready Michman will handle deploying and running your Django/Python application in testing, staging or production for you.


## Found something wrong?

Michman documentation is [open-source][github].

If you've found something in these docs that is confusing, incorrect or incomplete,
please consider submitting a pull request on [GitHub][github].

:::
Or just drop me a note on [bogdan@michman.dev](mailto:bogdan@michman.dev), and I'll sort it out!
:::



[github]: https://github.com/michman-dev/docs "Michman Docs GitHub Repo"
