# Contibuting
 
This document should serve as a guideline for contributing to this repository and also serve as a basic git tutorial. This will provide the team with a single source for all the commonly use git commands. This is document is a work in progess, some things may be redundant but I'll clean it up as the project progresses. Later this weekend, I will probably break this into sections because this has become somewhat lengthy. I'm still missing some things but I wanted to get something up tonight. 

For git basics and commonly used git commands see: [references.md](/references/references.md)

## Ideal Workflow

As a team we should probably discuss how we want the workflow to be in our next meeting, we can use anything but it is probably a good idea to agree on a standard and stick to it. In my opinion, the only workflow we want to avoid is [centralized workflow](https://www.atlassian.com/git/tutorials/comparing-workflows#centralized-workflow) because it makes conflicts more of an issue, which may make us more hesitant to commit changes frequently.

With that in mind, I think the most important thing is that we do not do any actual *work* on the `master` branch. Once the project grows in complexity we will want `master` to always be a working release of the webpage and only merge changes into `master` when they are fully functional.

What I am proposing is sort of a dumbed down version of the gitflow workflow that is described in detail [here](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) and [here](http://nvie.com/posts/a-successful-git-branching-model/)

The basic idea is this:

- There will always be at least two branches in the repo: `develop` and `master`.
- `master` remains stable and all code is considered production ready
- all our work is done in some `feature-branch` that is branched off of `develop` and merged back onto `develop` when that feature has been added.
- `develop` is generally kept further ahead of `master` as the candidate for the next stable working release
- when the whole team has agreed that the features in the `develop` branch are working and ready for release then we pull request and merge `develop` into `master` and tag it with a release version.

[Example of Workflow](/references/workflow-example.md)

This would prevent any one of us from making changes to `master` that break our most current working prototype while simultaneously allowing us to set sprint goals to keep the team focussed on working toward the next *minimum viable product*. In this way we can avoid getting bogged down in details of features that may be beyond the scope of what we can accomplish and we will always have a stable release. At the end of the semester we can submit the best working version of our project instead of potentially getting stuck with an unfinished rough draft that doesn't really work.
 


