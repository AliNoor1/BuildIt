# References

This reference file can serve as good place to link to info about any of the tools we are using to help keep the team up to speed. Everyone should feel free to edit this and add sections and links to tools that you are researching/using.

Files like this one, and README.md are just plain text file that are decorated using [markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)

## Github References

The most powerful way to use git is from the command line. There are a wide variety of [GUI options](https://git-scm.com/downloads/guis) that exist but they do not contain all git features and are not necessarily up to date. If you insist on doing your developement work in windows you will probably want to use something like [Git Bash](https://gitforwindows.org/), in either case you will need to do your own research to ensure that you can replicate the appropriate [workflow](/workflow-example.md). For our purposes that probably won't be too difficult because we won't likely need all of the myriad features of git. 

For a quick and dirty basic rundown of git's common commands see [git-basics.md](/git-basics.md)

Other good introductory info can be found in the [Github Guides](https://guides.github.com/)

For a more thorough explanation I recommend looking at [Pro Git](https://git-scm.com/book/en/v2)

#### SSH keys

If you haven't yet set any SSH keys for github you will notice that it asks for your username and password everytime you push or pull from origin. This gets old fast.

SSH keys allow you to just type a password once per session. To set one up follow all the steps in this guide:

[SSH keys](https://help.github.com/articles/connecting-to-github-with-ssh/)

There is one step that the guide fails to mention. For each repo you wish to use an ssh key for you need to access github.com via SSH instead of https. To switch from https to ssh navigate to the directory that contains this repository and type:

```
    git remote set-url git@github.com:AliNoor1/BuildIt.git
```

If for some reason you are having difficulty accessing the repository this way then you can switch back to https with:

```
    git remote set-url https://github.com/AliNoor1/BuildIt.git
```




