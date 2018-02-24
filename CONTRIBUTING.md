# Contibuting
 
This document should serve as a guideline for contributing to this repository and also serve as a basic git tutorial. This will provide the team with a single source for all the commonly use git commands. This is document is a work in progess, some things maybe redundant but I'll clean it up as the project progresses. 

As a team we should probably discuss how we want the workflow to be but the most important thing is that we do not do any actual *work* on the `master` branch. Once the project grows in complexity we will want `master` to always be a working release of the webpage and only merge changes into `master` when they are fully functional.

## Getting Started

If you haven't cloned the repo yet this is how to do it. 

In general, change to a directory that is not already the directory of another github repository. I tend to keep all of my repositories in `~/Git` so the general setup is:
```
    cd Git
    git clone <url-of-repo>
```

Specifically, for this repo:

```
    git clone https://github.com/AliNoor1/BuildIt
```

This will create a sub-directory `~/Git/BuildIt`

**Important:** Do not attempt to clone a repository from within the same directory as another repostitory on your local machine. This will cause changes to the hidden `.git` file which will result in conflicts in both repositories. i.e. if you are in your `/BuildIt` directory **do not** attempt to clone a different repository. Instead `cd ..` to go back to the parent directory.


## Basics


Anytime you start working, you'll want to make sure you have the latest changes from remote/origin. Chane to your /BuildIt directory and:

first make sure you have access to both the `develop` and the `master` branch on your local machine.

```
    git branch
```

you should now see

```
    develop
  * master
```

If you do not see the develop branch you need to get it from remote/origin

```
    git remote update
    git checkout develop
```

Next, make sure your both of these branches on your local machine are up to date with remote/origin

```
    git checkout master
    git pull origin master
    git checkout develop
    git pull origin develop
``` 

The next step is to create a temporary branch to work on. Create a branch with a title that describes what you will be working on and checkout that branch. Some ~~good~~ decent examples of branch titles are something like: `update-mainpage-css`, `adding-sql-database`, `update-login-page` etc. In this example `your-working-branch` is the branch name, but it could be named anything.

```
    git branch your-working-branch
    git checkout your-working-branch
```

Now that you have checked out `your-working-branch` you can add/create/edit any files in your /BuildIt directory and the changes will only affect `your-working-branch`. 

At any point typing `git status` will tell you if you have any uncommitted changes. Frequently save your work to the remote repository in the following manner:

```
    git add .
    git commit -m "a short message describing the change goes here"
    git push origin your-working-branch
```

This allows us to revert back to any previous changes if the need occurs.

When you are satisfied with the changes that you have made and you have tested your code to make sure that nothing is broken, add and commit your changes and push to the origin of `your-working-branch` one last time. Then change back to the `develop` branch, merge `your-working-branch` and delete it. This ensures that `develop` is always up to date and you are not keeping a branch on your local machine that falls too far behind `develop`. Finally push to origin/develop to keep the remote repo up to date.

```
    git add .
    git commit -m "some message about the last change"
    git push origin your-working-branch
    git checkout develop
    git merge your-working-branch
    git push origin develop
```

`develop` is now up to date on your local machine and on the remote repository and your session is complete.

### Most Common Git Commands

`git branch` shows what branches are on your local machine and has an asterisk next to the branch that you are on

`git branch branch-name` creates a new branched called `branch-name`

`git branch -d branch-name` deletes the branch called `branch-name` this only works if you are on a different branch and is only recommended if you have already merged the changes from `branch-name`.

`git checkout branch-name` moves you onto the branch called `branch-name` at this point everything in your /BuildIt directory only reflects what exists in `branch-name`.

`git status` tells you if you have any uncommitted changes and if your branch is up to date with remote/origin

`git add filename.ext` adds `filename.ext` to the staging area so it is ready to commit

`git add .` adds all files that were changed to the staging area so they are ready to commit

`git commit -m "commit message"` commits your changes to the branch on your local machine, the `-m` allows you to type the commit message on this same line. If you do not include the `-m` flag then the terminal will open a text editor and ask you to type a commit message

`git push origin branch-name` pushes your most up to date local version of `branch-name` to the remote repository. You can now see that change on the web.

`git pull origin branch-name` pulls the most recent version of `branch-name` from the web to your local machine.

`git log` shows a log of all commits to the branch that you are working on, this is brought up in vim so you may have to type `q` to exit. 

There are many extensions to `git log`, personally I like to use:

`git log --graph --pretty=oneline --abbrev-commit` which has a more visual presentation of branches and merges.

## Workflow Example

When you are ready to add stuff it is a good idea to make sure that everything on your local machine is up to date with what actually exists on the repository. So the first thing to do is:

```
    git checkout master
    git pull origin master
```

This pulls any changes to the master branch onto your local machine.

Next, I make sure that I have all branches available to me:

```
   git remote update
```

My output was:

```
    Fetching origin
    From github.com:AliNoor1/BuildIt
    * [new branch]      develop    -> origin/develop
```

So I see that there is a new branch and it is one that I will be using. To get this branch onto my local machine:

```
    git checkout develop
```

`develop` branch will usually be just ahead of the `master` branch. It will not necessarily always be stable but at all times it should contain all of the work for the next stable release. So to do any real work, I still want to create a new branch to contain *only* the changes that I am making. I want my new branch to be branched off of `develop` not `master` so that I am working with the most up to date code base. Since I just ran `git checkout develop` , I know that I am on that branch. Now I create the branch that I will actually work with and give it a descriptive title that makes it clear exactly what I will be changing.

```
    git branch add-contributing.md
```

Now when I type `git branch`, I see the following output:

```
      add-contributing.md
    * develop
      master
```

The asterisk shows that I am still on the develop branch, so I switch to my new working branch:

```
    git checkout add-contributing.md
```

Now all the files in my directory correspond to my new branch which is currently up to date with the `develop` branch. I can now create my `CONTRIBUTING.md` file and edit it. Several times throughout the editting process I may want to save my work to the remote/origin repository. So I type:

```
    git add .
    git commit -m "added an example work flow section"
    git push remote add-contributing.md
```
I can now see that my changes have been pushed to github by viewing the `add-contributing.md` branch on the github website.


When I have finished making all the changes that I planned for this branch I want to merge it back onto the `develop` branch, so that I leave `develop` in an up to date state for the next contributor(s). In this example I am just working with a trivial markdown file, but if it were actual code that I was writing I would want to throughoughly test the code on my local machine to make sure it is working *before* I merge back to the `develop` branch. After I have finished my tests and pushed all of my code from this branch, I switch back to the `develop` branch, merge the branch I was just working on and push the changes from the develop branch back to remote/origin/develop. It is now safe to delete the `add-contributing.md` branch from my local machine. I can also delete this branch on the github website, as well, which keeps the repo free from clutter, both locally and on the web. We can always revert changes or create a new branch if need be. 

```
    git checkout develop
    git merge add-contributing.md
    git push origin develop
    git branch -d add-contributing.md
```

![delete branch from github.com](/MarkdownIMG/delete-branch.png)

