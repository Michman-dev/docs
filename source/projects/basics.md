---
title: Projects Basics
description: Learn about deploying a variety of Python projects.
extends: _layouts.documentation
section: content
---

# Projects Basics

[TOC]



## Creating Projects

Projects are created on your Michman-managed servers.

To create a project open your server's management page and go to the **Projects** page.

The configuration options available are:

**Domain** - the main domain name on which your project will be served.
It will also be used as the name of your project inside Michman's UI.

**Aliases** - additional domains that the project should respond to.

**Type** - the type of your project.
This will determine the list of additional software installed on your servers,
Nginx and Gunicorn setup, and the customization and management options available to your for this project.

**Python version** - the version of Python to use for running this project.
This can be changed later, for example, when you'll want to upgrade your project to newer versions of Python.

**Allow wildcard subdomains** - this flag will allow your project to be served from any subdomains of your main domain.
So for example, if your main domain is `example.com` this flag will allow
the same project to be accessed on `foo.example.com`, and `foo.bar.example.com` and any other subdomain.

You can also have a new database created for your project on this step right away.



## Installation

Before you able to install your project you'll need to connect your Michman account to the Git repository with your project.
[More info][docs-git]

After connecting to your Git and creating your project go to your project's management page.
Now you'll need to install your project on the server. To do so you'll need to set:

**Repository** - Git repository with your project's source code.

**Branch** - Git branch that will be deployed on your servers.

**Python package name** - your Python application's package name,
which is also the name of the directory containing the entry point to your application - `wsgi.py` file.
For most Django/Flask application it is the same as the project (or repo) name.

**Web root directory** - this is the directory from which the public files of your project will be served.
For typical Django apps it is usually `static` or `project_name/static`

**Install dependencies** - check this to automatically install dependencies from the `requirements.txt` file
into the project's venv on your server.

**Requirements file** - this allows you to customize the name and location of your requirements file.
The path is relative to the project's root. The default for most Python projects is `requirements.txt`

**Use deploy key** - as an additional safety measure you can have a separate SSH key for deploying this project.
Make sure to add this key to your Git account settings before proceeding.

Press **Install Repository** to save the configuration of your project and pull the source code onto your servers.
The project **will not** be deployed and **will not** be running and accessible from the Internet until you perform
a [deployment.][docs-deployment]



[docs-git]: /account/git "Michman Docs Source Control"
[docs-deployment]: /projects/deployment "Michman Docs Project Deployment"
