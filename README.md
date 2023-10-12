# API Name
API Demo

# Brief Description
This is a simple RESTful API built with PHP and the Slim framework for interacting with a 
MySQL database. It provides endpoints for creating, reading, updating, and deleting records in a database table named "names."
 
## API Endpoints
**GET /getName/{fname}/{lname}**
**Function:** Retrieve a greeting message that includes a user's first name and last name.
**Required Parameters:** fname (first name), lname (last name).

**POST /postName**
**Function:** Insert a new record with first name and last name into the "names" database table.
**Request Payload:** ![image](https://github.com/emm-jee/API/assets/145326653/753b7e2e-6f72-497a-b4a9-87ce7f1c917e)

**GET /postPrint**
**Function:** Retrieve all records from the "names" database table.
**No required parameters.**

**PUT /updateName/{id}**
**Function:** Update an existing record in the "names" table by providing the record's id.
**Required Parameters:** id (record identifier).
**Request Payload:** ![image](https://github.com/emm-jee/API/assets/145326653/fff4b3cd-93dc-4fe7-bfc5-cbaca11b844c)

**DELETE /deleteName/{id}**
**Function:** Delete a record from the "names" table by providing the record's id.
**Required Parameters:** id (record identifier).
![image](https://github.com/emm-jee/API/assets/145326653/14cdec0e-1fd7-472c-8958-36b20a335e46)

Explain the structure of the request payload, including any required or optional fields.
You can use JSON examples to illustrate.

**The API expects JSON payloads for POST and PUT requests with the following structure**
{
    "fname":"mike jefferson",
    "lname":"vizcarra"
}
**IF succesfull response**
{
    "status": "success",
    "data": null
}
**else**
{
    "status": "error",
    "message": "Error message"
}

**Possiblie status codes encountered during the process
404
200**

## Usage
To use this API, you can send HTTP requests to the defined endpoints using a tool like Postman or 
by implementing HTTP requests in your application.

Provide code
examples or instructions on how to use your API.
**example:**
open POSTMAN then type **localhost/api/public/postPrint** select the method **GET**
**localhost/api/public/ - this is the path where I store the source code for my API**
**The Reponse should be the content of your DATABASE**
 
## License
The code does not include a specific license declaration. 
 


## Contributors
This project utilize powerful libraries and frameworks to bring its functionality to life:
Slim Framework: A lightweight yet robust PHP micro-framework for handling HTTP requests and routing.
PDO (PHP Data Objects): The PHP extension that enables seamless database interactions, used here for MySQL connectivity.
Psr\Http Message Interfaces: Essential PHP interfaces for working with HTTP requests and responses.

## Contact
Information


Contact me via gmail **mjeffersonvizvizcarra@gmail.com**
