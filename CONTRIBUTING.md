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

(maybe include an image here)

When I have finished making all the changes that I planned for this branch I want to merge it back onto the `develop` branch, so that I leave `develop` in an up to date state for the next contributor(s). In this example I am just working with a trivial markdown file, but if it were actual code that I was writing I would want to throughoughly test the code on my local machine to make sure it is working *before* I merge back to the `develop` branch. After I have finished my tests and pushed all of my code from this branch, I switch back to the `develop` branch, merge the branch I was just working on and push the changes from the develop branch back to remote/origin/develop. It is now safe to delete the `add-contributing.md` branch from my local machine. I can also delete this branch on the github website, as well.

```
    git checkout develop
    git merge add-contributing.md
    git push origin develop
    git branch -d add-contributing.md
```

