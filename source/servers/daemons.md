---
title: Daemons
description: Manage daemons on your servers.
extends: _layouts.documentation
section: content
---

# Daemons

[TOC]



## Overview

Daemons are long-running scripts and processes you wish to keep alive on your server.
Michman uses [Supervisor][supervisor] to manage daemons on your servers.
If the process stops executing, Supervisor will automatically restart the process.
Supervisor is designed to be easy to use, and you don't even have to read its docs.

:::info
While you can use Daemons feature to manage your Django queues,
Michman has a dedicated feature specifically for that - [Queues][docs-queues].
:::



## Creating Daemons

Go to your server's **Daemons** page to create and manage daemons.

To create a new daemon Michman will need:

**Command** - The command that should be run by the daemon

**User** - Linux user on your server that will run the daemon. By default `michman` user is used.

**Directory** - The directory in which to run your command from. Leave empty to use the user's home directory.

**Processes** - Supervisor can maintain multiple instances of your process. 1 by default.

**Start seconds** - Supervisor will ensure your process is running for at least this number of seconds before considering it healthy.
Default 1 should be fine for most processes.



[supervisor]: http://supervisord.org "Supervisor Documentation"
[docs-queues]: /projects/queues "Michman Docs Project Queues"
