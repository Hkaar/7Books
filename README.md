# Seven Books

A website project to borrow physical books from a library through the web

## Guides for users

This is a guide for anyone wanting to use this web app locally

Clone the repo
```
git clone https://github.com/Hkaar/7Books.git
```

Go to the repo folder
```
cd 7Books
```

And then serve it!
```
php artisan serve
```

## Guides for contributors

### Rules
1. Create a new branch seperate from the 'master' for adding new things
2. Please explain what you're contributing in detail before submitting a PR

### How to contribute

To contribute please follow these steps!

1. Clone the repo to your machine
```
git clone https://github.com/Hkaar/7Books.git
```

2. Go to the project folder
```
cd 7Books
```

3. Create a new branch for your contribution
```
git branch <your-feature-name>
```

4. Switch to the new branch
```
git checkout <your-branch-name>
```

Now that's all for the setup, now you can change anything within the branch for your contribution. Next follow these steps for adding your changes to the local branch

1. Stage the files you want to change
```
git add <path> // for staging a single file
git add . // for adding all the current uncommited changes
```

2. Then commit it to the branch
```
git commit -m "<your-commit-message>"
```

Once the features are done, you can push your changes to the remote repo

```
git push https://github.com/Hkaar/7Books.git <local-branch-name>
```

Your push is going to create a pull request for us to review. Whenever the pull request is approved you can just delete the local branch after a pull

```
git checkout master
git pull https://github.com/Hkaar/7Books.git master
git branch -d <local-branch-name>
```

Don't forget to always do a pull from the remote master to update your local repo!

```
git pull https://github.com/Hkaar/7Books.git master
```

Have a fun time contributing and using our app!