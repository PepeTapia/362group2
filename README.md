# Iteration 4:
### **List of things done:**
Brandon:
- reimplement CloudSQL for login system
- added dedicated bucket for each user
- merged Ramiro's intro page to project

Ramiro:

- Streamlined the code & cleaned up the site
- Created Login/Signup form
- Moved Contact Us form to main page instead of having its own separate page
- Redesigned the website (still a WIP)
- Implemented separate sites into the landing page

## **SETUP:**
**All files here are not meant to be ran but used for reference.**

**You can also download the project files from the Google Drive link in Discord that has everything pre-installed and ready to deploy.**

1. Download Cloud SDK installer and initialize GCloud to our project: https://cloud.google.com/sdk/docs/quickstart

2. Clone github, extract titanbin folder to any directory you want (preferably C:/Users/_Name_)

3. Extract vendor.7z file into titanbin folder as well (this are dependencies needed for the project)

4. You will also need "keyfile.json" file in titanbin folder to connect to Google Cloud Storage in home.php, which can be downloaded from our Discord.

5. Now, you can either host locally or type "gcloud app deploy" to host web application to Google Cloud. 


## NOTE:
1) For redirecting to another file/url via php:

    - use ```echo "<script> location.href='/home.php'; </script>";``` rather than ```header(location: home.php);```

2) For **_href_** attributes:
    - you can put just the file name and its type ("test.php") and set up what directories the file is in via index.php.

    - **EXAMPLE:**

       ![example](https://user-images.githubusercontent.com/55907638/135773345-4fa579a4-65d7-45b6-a6d9-26f998cff46f.png)

