# Iteration 5:
### **List of things done:**
Brandon:
- added REST API (get/post)
- Merged Ramiro's and Erik's Code

Ramiro:
- Changed the old navigation bars on all the pages to make it consisten with the navigation bar found on the landing page.
-  added a sidenav to navigate through the website once the user logged in 
-  Debugged the code to make the new navbar fit with 0 issues. 
-  Started work on PDF preview by trying to reuse the image preview code, but didn’t have time to finish.
-  My work can be viewed on: https://github.com/PepeTapia/362group2/tree/Ramiro-Iteration5


### Results
This is our final iteration. While we did not finish everything entirely, the product works and runs well.

Things that do not work (that we found):
- Erik's file actions functionality do not work completely after merge (was working before merge)

## REST API
Link: https://verdant-oven-330403.wl.r.appspot.com
### /api/get
    - Url Parameters:
        - bucket = name of storage
        - optional: filename = name of json file (without extension)
    - Given bucket only: returns every json file inside bucket
        - ex: /api/get?bucket=group7 
    - Given both: returns specific file from bucket
        - ex: /api/get?bucket=group7&filename=hello

![image](https://user-images.githubusercontent.com/55907638/144702857-abafb795-1c91-4864-a8e8-c2577f77e672.png)
![image](https://user-images.githubusercontent.com/55907638/144702988-78f363cf-a829-47a3-a66f-db114bb32fea.png)


### /api/post
    - Url Parameters:
        - bucket = name of storage
        - filename = name of json file (without extension)
        - request body with json data
    - Given all three, stores data as json file inside bucket in Cloud Storage
        - ex: /api/post?bucket=group7&filename=hello
        
![image](https://user-images.githubusercontent.com/55907638/144702819-6c000121-f50c-447a-b4bd-72c115892047.png)
![image](https://user-images.githubusercontent.com/55907638/144702843-18ce3cd8-3477-4403-bf50-3dba8137a6cb.png)

## **SETUP:**

**You can also download the project files from the Google Drive link in Discord that has everything pre-installed and ready to deploy**

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

