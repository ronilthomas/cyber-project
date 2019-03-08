# A different way to store passwords  
This is a web applcation that stores passwords in images rather than a database.
---
This is one of my projects in cyber security. The application has a registration and login feature which is done in PHP. When the password has to be saved or read, the control moves over to python scripts to save or retrieve a password. The Login and Registration process is as below:

## Registration or Encryption
* Hash is generated from the plaintext
* Hash is sent python code
* Hash is converted in to it's binary form
* An image is accessed and the hash in it's binary form is placed in to the image using LSB substitution
* The image is saved as a new file in a secure location

## Login or Decryption

* Hash is generated from the plaintext and converted to it's binary form
* The required image is accessed according to the username
* A python script converts the number of pixels needed into it's binary form
* The binary values are compared with the binary form of the hash
* The user is granted access if the values match
