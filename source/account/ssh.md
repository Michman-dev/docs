---
title: SSH Keys
description: Manage your SSH access keys.
extends: _layouts.documentation
section: content
---

# SSH Keys

[TOC]



## Adding SSH Keys to Your Servers

Before you provision a server for the first time, you should add your SSH keys to your account. You can do this from the account page (opens new window) in the Forge dashboard.



## Michman Access Key

During the server creation process Michman will generate its own keypair so that it may access the server.
It will add the public key from this keypair to the `authorized_keys` file of both the `root` and `michman` users.
Please make sure not to remove to this key, otherwise Michman won't be able to manage your server.

:::
If this key is ever removed for some reason,
you'll have to manually copy the public key from your server's **Manage** page and place it in both
`/home/michman/.ssh/authorized_keys` file and the `/root/.ssh/authorized_keys` file on your server.
:::
