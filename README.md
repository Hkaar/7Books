# Seven Books

![Workflow Status](https://github.com/Hkaar/7Books/workflows/tests/badge.svg)

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

#### Step 1: Setup the project

Clone the repo to your machine

```bash
git clone https://github.com/Hkaar/7Books.git
```

Go to the project folder

```bash
cd 7Books
```

Install all the required packages

```bash
composer install
```

Install the node.js dependecies

```bash
npm install
```

Copy & rename the .env.example to .env

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

Make sure it's working by serving it

```bash
php artisan serve
```

#### Step 2: Work setup

Go to the project directory (if you haven't)

```bash
cd 7Books
```

Create a new branch for your contribution

```bash
git branch <your-feature-name>
```

Switch to the new branch

```bash
git checkout <your-branch-name>
```

#### Step 3: Work on your stuff & things

Whenever you have a thing to save

```bash
git add .
```

or you can stage a single file

```bash
git add <path>
```

Then commit it to the branch

```bash
git commit -m "<your-commit-message>"
```

#### Step 4: Upload your features

Once the features are done, you can push your changes to the repo

```bash
git push origin <local-branch-name>
```

Your push is going to create a pull request for us to review

#### Step 5: Finisher

If the pull request is accepted, update your local repo with the changes

```bash
git checkout master
git pull origin master
```

```bash
git branch -d <local-branch-name>
```

Don't forget to always do a pull from the remote master to update your local repo!

```bash
git pull origin master
```

And that's all, btw here's a table for your reward

ʕノ•ᴥ•ʔノ ︵ ┻━┻
