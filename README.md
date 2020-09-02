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

List of the API : FOR AUTHENTICATE ADMIN/USER

`[POST]` `/auth/login` json `{ "username" : "pooja", "password" : "Pooja123$"}`

`[GET]` `/Admin`

`[POST]` `/Admin/create` json `{ "username" : "xx" ,"password":"xx","name" : "x" cannot be empty}`

`[PUT]` `/Admin/update/id` json `{"name" : "x" cannot be empty}`

`[GET]` `/Admin/detail/id`

`[DELETE]` `/Admin/delete/id`


`[GET]` `/Productapi/product/

`[POST]` `/Productapi/create` json `{Pass in POSTMAN BODY "product_name","description","price","quantity","stock" cannot be empty}`

`[PUT]` `/Productapi/update/id` json `{Pass in POSTMAN PARAMS--"product_name","description","price","quantity","stock" cannot be empty}`

`[GET]` `/Productapi/detail/id`

`[DELETE]` `/Productapi/delete/id`


`[GET]` `/Categoryapi/category/

`[POST]` `/Categoryapi/create` json `{Pass in POSTMAN BODY "cat_name" cannot be empty}`

`[PUT]` `/Categoryapi/update/id` json `{Pass in POSTMAN PARAMS--"cat_name" cannot be empty}`

`[GET]` `/Categoryapi/detail/id`

`[DELETE]` `/Categoryapi/delete/id`


`[POST]` `/auth/logout`

List of the API : FOR CLIENT


`[GET]` `/Client/product/`

`[GET]` `/Client/product/id`

`[GET]` `/Client/category/`

`[GET]` `/Client/category/id`

