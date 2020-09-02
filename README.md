# WAREHOUSE REST API USING PHP version 7.4 AND FRAMEWORK CODEGINITER 3.1


# Setup and Modifications
* Download the setup
* Modify config file change -- $config['base_url']='TO YOUR URL';  
* Import MySQL DATABASE FILE
* Modify your database file -- change database configuration.


#You can use [POSTMAN](https://www.getpostman.com/)

# How to TEST API IN POSTMAN 
* You can test the API by including header 
	Content-Type = application/x-www-form-urlencoded OR application/json
	Client-Service = frontend-client
	Auth-Key = simplerestapi

 IN EVERY REQUEST THESE THREE HEADERS WILL BE COMMON

#Once API get `login` you must include `id` & `token` that you get after successfully login. The header for both look like this `User-ID` & `Authorization`

