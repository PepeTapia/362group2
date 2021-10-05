# Iteration 2:

Project hosted on Google Cloud and files stored in Google Cloud Storage.

- app.yaml handles static files for website.
- index.php handles redirecting requests.

## **SETUP:**

**If you downloaded my .7zip file from Discord and extracted to "C:/Users/name", you just need to follow Step 1, type "cd C:/Users/name/titanbin", and you are good to host!**

1. Download Cloud SDK installer and initialize GCloud to our project: https://cloud.google.com/sdk/docs/quickstart

2. Clone github and extract titanbin file to "C:/Users/name" 

3. Type in cmd the following:
      ```  
      "cd C:/Users/name/titanbin"

      "compose install" 
      ```

4. After installation finishes, delete the compose.lock file in titanbin directory

5. You will also need "keyfile.json" file in titanbin directory to connect to Google Cloud Storage in home.php, which can be downloaded from our Discord.

7. Now, you can either host locally or type "gcloud app deploy" to host web application to Google Cloud. 

## **NOTE:**
For **_href_** attributes, you can put just the file name and its type ("test.php") and set up what directories the file is in via index.php.

**EXAMPLE:**

![example](https://user-images.githubusercontent.com/55907638/135773345-4fa579a4-65d7-45b6-a6d9-26f998cff46f.png)
