# Contibuting

This document should serve as a guideline for contributing to this repository and also serve as a basic git tutorial. This will provide the team with a single source for all the commonly use git commands. 

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

## References

## Basics

## Working with SSH keys

## Workflow

When you are ready to add stuff it is a good idea to make sure that everything on your local machine is up to date with what actually exists on the repository. So the first thing to do is:

```
    git checkout master
    git pull origin master
```

This pulls any changes to the master branch onto your local machine.

Next, make sure that you have all branches available to you:

```
   git remote update
``
My output was:
```
    Fetching origin
    From github.com:AliNoor1/BuildIt
    * [new branch]      develop    -> origin/develop
```
So I see that there is a new branch and its one that I will be using. To get this branch onto my local machine:
```
    git checkout develop
```

