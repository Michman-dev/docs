---
title: Project Deployment
description: Deploying projects with Michman.
extends: _layouts.documentation
section: content
---

# Project Deployment

[TOC]



## Manual Deployment

Once your project is configured your can deploy it manually from the **Deployment** page at any moment.



## Automatic Deployment

You can also enable **Quick Deployment**.
Once enabled your project will be automatically deployed any time you push new changes to
the configured deployment branch of the configured Git repo.



## Project's Environment

Environment variables for you project are provided in the most typical way -
as a `.env` file in the root directory of your project.

We pre-configure the values with sane defaults. You can view and change them on the
**Configuration** page of your project.



## Deploy Script

Any time your project is deployed Michman will run its deployment Bash script.
It is intended to be used to run database migrations, static assets generation and whatever
else your project needs to be performed on each deployment.

We pre-configure this script with a sane default for you.
You can view and change this script on the **Configuration** page of your project.
