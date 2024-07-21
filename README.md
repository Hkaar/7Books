# Seven Books

[![License](https://img.shields.io/badge/License-Apache_2.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://GitHub.com/Naereen/StrapDown.js/graphs/commit-activity)
![Workflow Status](https://github.com/Hkaar/7Books/workflows/CI/badge.svg)

A website project to borrow physical books from a library through the internet.

## Requirements

- PHP version >= 8.1
- Composer
- Node.js

## How do i use this?

This is a guide or how to for anyone wanting to use this web app locally

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

Build the assets

```bash
npm run build
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

## How do i contribute?

See on how to contribute by going to the [contribution guide](https://github.com/Hkaar/7Books/blob/master/CONTRIBUTING.md) of the project

And that's all, btw here's a table for your reward

ʕノ•ᴥ•ʔノ ︵ ┻━┻
