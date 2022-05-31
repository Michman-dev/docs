---
title: Databases
description: Manage database on your servers.
extends: _layouts.documentation
section: content
---

# Databases

[TOC]



## Overview

When creating a new server with Michman you can install a database and create a new database and a database user.
You can then use the Michman server's **Database** page to manage databases, users, and permissions.

:::warning
If you're creating a **Web Server**, you will not be able to install a database on that server.
Web servers are configured with the minimum amount of software needed to serve your Python application.
If you need a database and web server on the same server, you should choose an **App Server**.
:::



## Managing Databases

Over on the server's Database page you can: create or delete databases,
create or delete database users and edit database user's permissions.



## Connecting To Databases With a GUI Client

Databases on your servers are configured by default for local access only,
but most GUI clients will allow you to connect to such databases via SSH. 

When selecting the SSH key to use during authentication, ensure that you selected the same SSH key
that you've added to Michman.
For example, when using the [TablePlus][table-plus] database client:

![TablePlus SSH Connection Example](/assets/images/table-plus-ssh.png){class="w-full md:w-2/3"}



[table-plus]: https://tableplus.com "TablePlus Database GUI Client"
