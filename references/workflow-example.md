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

`develop` branch will usually be just ahead of the `master` branch. It will not necessarily always be stable but at all times it should contain all of the work for the next stable release. So to do any real work, I still want to create a new branch to contain *only* the changes that I am making. I want my new branch to be branched off of `develop` not `master` so that I am working with the most up to date code base. Since I just ran `git checkout develop` , I know that I am on that branch. Now I create the branch that I will actually work with and give it a descriptive title that makes it clear exactly what I will be changing. In this example I am editting and adding the `CONTRIBUTING.md` file.

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
    git merge --no-ff add-contributing.md
    git push origin develop
    git branch -d add-contributing.md
```

![delete branch from github.com](/references/MarkdownIMG/delete-branch.png)

The `--no-ff` flag causes the merge to always create a new commit object, even if the merge could be performed with a fast-forward. This avoids losing information about the historical existence of a feature branch and groups together all commits that together added the feature. Compare:

![merge --no-ff](/references/MarkdownIMG/merge-without-ff.png)

This might seem kind of overly complicated now, but as the project grows in complexity it will make it easier to see the full history of repository if we need to revert any changes. Further explanation seee: [Source1](http://nvie.com/posts/a-successful-git-branching-model/) [Source2](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow)

## Pull Request and Merge

In this case, since master is not a release candidate yet and I have not made any changes to any code. I am going to pull request and merge `develop` onto the master branch so that I can show how to do it and CONTRIBUTING.md exists on the master branch

If this were a working release we would have some sort of version tag associated with this, but it is not so I guess at this point `master` simply reflects version 0.

So now I have completed all the steps above, committing numerous changes along the way to my `add-contributing.md` branch and merged that onto the `develop` branch. I simply go over to the github website where I see that there have been changes to the `develop` branch and click compare & pull request, then follow the instructions.

![pull request](/references/MarkdownIMG/pull-request.png)

Github then checks for conflicts to see if the branch can be merged. At this point we would wait for the rest of the team to decide whether to merge into master, but again this is not a release so it is safe to proceed.

Now I checkout `master` and pull the changes from the remote back to my local machine.

```
    git checkout master
    git pull origin master
```

Which shows the following output:

```
    remote: Counting objects: 1, done.
    remote: Total 1 (delta 0), reused 0 (delta 0), pack-reused 0
    Unpacking objects: 100% (1/1), done.
    From github.com:AliNoor1/BuildIt
      * branch            master     -> FETCH_HEAD
      8d5a4ac..24f86b8  master     -> origin/master
    Updating 8d5a4ac..24f86b8
    Fast-forward
      CONTRIBUTING.md               | 226 ++++++++++++++++++++++++++++++++++++++++++
      MarkdownIMG/delete-branch.png | Bin 0 -> 192490 bytes
      MarkdownIMG/pull-request.png  | Bin 0 -> 200659 bytes
      3 files changed, 226 insertions(+)
      create mode 100644 CONTRIBUTING.md
      create mode 100644 MarkdownIMG/delete-branch.png
      create mode 100644 MarkdownIMG/pull-request.png
```

