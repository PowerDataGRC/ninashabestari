# Nina Shabestari Portfolio Site

This repository contains a static portfolio site built with Markdown and MkDocs.

## What this site does
- Builds a website from Markdown files.
- Uses MkDocs for navigation and styling.
- Deploys automatically through GitHub Actions.
- Uploads the built site to Hostinger by FTP.

## Folder structure
- `docs/` = website content
- `mkdocs.yml` = site configuration
- `.github/workflows/deploy.yml` = GitHub Actions workflow

## How to edit the site
1. Open the `docs/` folder.
2. Edit the page you want:
   - `index.md` for Home
   - `projects.md` for Projects
   - `resources.md` for Resources
   - `contact.md` for Contact
3. Save your changes.
4. Commit and push to GitHub.
5. GitHub Actions will build and deploy the site automatically.

## Writing rules
- Use headings for sections.
- Use bullet lists for skills and project items.
- Keep paragraphs short.
- Do not delete the front matter at the top of a page.
- Do not rename files unless you also update `mkdocs.yml`.

## GitHub Actions
In the repository settings, add these secrets (select the repo -> Settings -> Secrets and variables -> Repository  secret):
- FTP_SERVER
- FTP_USERNAME
- FTP_PASSWORD
  
[GitHub Secrets](docs/images/Git_secrets.png)
## Front matter
Each page starts with metadata like this:

```md
***
title: Home
***
```

Leave this in place so MkDocs can name pages correctly.

## Local preview
This repository is designed for GitHub Actions deployment. You do not need to install MkDocs locally unless you want to test on your own computer.

## Deployment
GitHub Actions builds the site and uploads the generated files to Hostinger over FTP.