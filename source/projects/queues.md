---
title: Python Queues
description: Easily manage queues.
extends: _layouts.documentation
section: content
---

# Queues

[TOC]



## Overview

Michman allows you to easily create, monitor and manage your queues.

Create as many queues as your project requires -
all queue workers will be monitored by Supervisor and restarted if they crash.
Also, all workers restarted automatically if the server is restarted.

Right now Michman supports only the queues most commonly used in Django projects - powered by [Celery.][celery]
Both Celery queues and Celery Beat scheduler are supported.



## Starting Queues Workers

Go to your project's **Queue** page to create and manage queues.

To create a new queue Michman will need:

**Celery app module** - Python module used by Celery. Also, the location of your `Celery.py` entrypoint file.
For most Django projects it will be `PROJECT_NAME.celery`

**Number of child processes** - You can run multiple workers with the same config to handle multiple jobs in parallel.
By default, Michman will run a child process for every CPU core on the server.

**Queues** - Comma-separated list of queues to be handled by the workers. Defaults to `Celery`

**Max tasks per child** - Restart a child process after it has handled this many tasks.
It makes sense to set this to some reasonable number that depends on the complexity of jobs in your project.
Helps to fight off memory leaks.

**Max memory per child** - The amount of RAM in MiB. A child process will be automatically restarted after allocating
this amount of RAM. Also helps to fight off memory leaks. Note that all the tasks that are started will be
completed by the child process regardless of this limit. Processes are only restarted after completing the
running tasks.

**Stop seconds** - When a child process is getting stopped for any reason, queue runner will wait for it to
gracefully stop for this amount of seconds, after which the process will be force stopped.
600 seconds by default. Increase if you have any really long-running tasks.



## Running Queue Workers

You can monitor the state of your workers, restart and stop them on the same page.



[celery]: https://docs.celeryq.dev/en "Celery Documentation"
