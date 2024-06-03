# Seven Books

[![License](https://img.shields.io/badge/License-Apache_2.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)
![Workflow Status](https://github.com/Hkaar/7Books/workflows/CI/badge.svg)

A website project to borrow physical books from a library through the internet.

## Requirements

- PHP version >= 8.1
- Composer
- Node.js

## User Guide

This is a guide for anyone wanting to use this web app locally

Clone the repo

```bash
git clone https://github.com/Hkaar/7Books.git
```

Go to the repo folder

```bash
cd 7Books
```

Install the required dependecies

```bash
composer install
```

Generate the env

`Bash` :

```bash
mv .env.example .env && cp .env .env.example
```

`Powershell` :

```powershell
Rename-Item .\.env.example .\.env ; Copy-Item .\.env .\.env.example
```

Generate the app key

```bash
php artisan key:generate
```

Run the migrations

```bash
php artisan migrate
```

And then serve it!

```bash
php artisan serve
```

## Contribution Guide c[_]

A guide on how to contribute to the project

### Rules

1. Create a new branch seperate from the 'master' for adding new things
2. Please explain what you're contributing in detail before submitting a PR

### How to contribute

And that's all, btw here's a table for your reward

ʕノ•ᴥ•ʔノ ︵ ┻━┻
