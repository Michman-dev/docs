---
title: Python
description: Manage Python installation on your servers.
extends: _layouts.documentation
section: content
---

# Python

[TOC]



## Overview

Michman can install and configure multiple versions of Pythons on your servers.
Currently supported major versions are 2.7, 3.7, 3.8, 3.9 and 3.10.



## Multiple Python Versions

When provisioning a new server you'll choose a Python version that will be installed and used by default.

Once the server is created you can install more versions from your server's management page.
All installed versions will be available to use when creating a new project or switching versions for an existing one.

You can uninstall a version of Python as long as it is not in use by any projects on that server and it isn't the last one installed.



## Updating Python Between Patch Releases

You can upgrade your Python installations between patch releases at any time using the **Update Patch Version** button.
Typically, these updates should not cause any breaking changes to your server. Some seconds of downtime are possible.
