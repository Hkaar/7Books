# Introduction

A website project to borrow physical books from a library through the internet

## Requirements
- PHP version >= 8.1
- Composer
- Node.js
- JS-Doc

## User Guide

This is a guide for anyone wanting to use this web app locally

Clone the repo
```
git clone https://github.com/Hkaar/7Books.git
```

Go to the repo folder
```
cd 7Books
```

Install the required dependecies
```
composer install
```

Generate the app key
```
php artisan key:generate
```

Run the migrations
```
php artisan migrate
```

And then serve it!
```
php artisan serve
```

## Contribution Guide c[_]

A guide on how to contribute to the project

### Rules :
1. Create a new branch seperate from the 'master' for adding new things
2. Please explain what you're contributing in detail before submitting a PR

### How to contribute :

**Step 1: Setup the project**

Clone the repo to your machine

```
git clone https://github.com/Hkaar/7Books.git
```

Go to the project folder

```
cd 7Books
```

Install all the required packages

```
composer install
```

Generate the app key

```
php artisan key:generate
```

Run the migrations
```
php artisan migrate
```

Make sure it's working by serving it

```
php artisan serve
```

**Step 2: Work setup**

Go to the project directory (if you haven't)

```
cd 7Books
```

Create a new branch for your contribution

```
git branch <your-feature-name>
```

Switch to the new branch

```
git checkout <your-branch-name>
```

**Step 3: Work on your stuff & things**

Whenever you have a thing to save

```
git add <path> // for staging a single file
```

or

```
git add . // for adding all the current uncommited changes
```

Then commit it to the branch

```
git commit -m "<your-commit-message>"
```

**Step 4: Upload your feature!**

Once the features are done, you can push your changes to the repo

```
git push https://github.com/Hkaar/7Books.git <local-branch-name>
```

Your push is going to create a pull request for us to review

**Step 5: Finisher**

If the pull request is accepted, update your local repo with the changes

```
git checkout master
```

```
git pull https://github.com/Hkaar/7Books.git master
```

```
git branch -d <local-branch-name>
```

Don't forget to always do a pull from the remote master to update your local repo!

```
git pull https://github.com/Hkaar/7Books.git master
```

And that's all, btw here's a table for your reward

**ʕノ•ᴥ•ʔノ ︵ ┻━┻**