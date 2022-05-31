---
title: SSH Keys
description: Manage your SSH access keys.
extends: _layouts.documentation
section: content
---

# SSH Keys

[TOC]



## Adding SSH Keys to Your Servers

Before you provision a server for the first time, you should add your own SSH keys to your account.
You can do this from your Michman Account [SSH Keys Page][ssh].

[//]: # (TODO: Is this ever correct? How is our user isolation actually works?)
During server creation Michman will add these keys to `michman` user on your server.
This will allow you to manually SSH into your server as `michman` user.



## Michman Access Key

During the server creation process Michman will generate its own keypair so that it may access the server.
It will add the public key from this keypair to the `authorized_keys` file of both the `root` and `michman` users.
Please make sure not to remove to this key, otherwise Michman won't be able to manage your server.

:::
If this key is ever removed for some reason,
you'll have to manually copy the public key from your server's **Manage** page and place it in both
`/home/michman/.ssh/authorized_keys` file and the `/root/.ssh/authorized_keys` file on your server.
:::



[ssh]: https://app.michman.dev/account/ssh "Michman Account SSH Keys Management Page"
