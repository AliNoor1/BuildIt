# BuildIt

For Git workflow guidelines, discussion and examples see: [CONTRIBUTING.md](/CONTRIBUTING.md)

For discussion of next working release see: [release-notes.md](https://github.com/AliNoor1/BuildIt/blob/develop/release-notes.md) on the `develop` branch.

## Vision Statement

Help amateurs learn about and create their dream home improvements.
 
## Project Description

A user-friendly website where hobbyists, contractors, and everyday homeowners can go to plan a shed project.

### Desired Features

- several pre-designed options will be laid out to choose from
- there will be a system to compute the costs of the materials used in the project.
- a forum section will be included where the user can do the project themselves and seek advice from experienced builders
- user can upload their design on the website and have contractors bid on the project
- at the end of the project the user can rate the contractor on the work that they have done
- users and contractors will both have profiles on the site to have access to the forums and bidding page
 
   
## Project Structure

```
/BuildIt
  |-- CSS
  |-- JS
  |-- HTML
  |-- img
  |-- data
  index.html
```

## Apache Resources
In order to test locally, you will need an apache server to run the PHP code. Here is how I got setup:
https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-16-04
And if you want to move your webroot to a directory other than /var/www/html (this isn't what I followed but it looks similar--Can't find the one That I looked at):
https://www.digitalocean.com/community/tutorials/how-to-move-an-apache-web-root-to-a-new-location-on-ubuntu-16-04