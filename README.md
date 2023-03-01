# ATM-Project

## Web application which simulate work of ATM.

### Technologies used:

* [PHP](#php)
* [HTML](#html)
* [CSS(Bootstrap)](#css-bootstrap)
* [JavaScript](#javascript)

## Introduction
##### Web application allows user to:

* Create account.
* Login in on account.
* See their current balance.
* Withdraw money.
* Allows user to chose given denomination for withdraw or to enter custom value for withdraw.
* Allows user to see their transaction history by downloading PDF file with transaction amount and exact date.
* Change their pin.
* Every page have log out and back on previous page option.

##### Web application also have different administrator page which allows admin to:

* Check all information about users (their full name, username, password, balance, amount of last transaction and date of last transaction).
* Admin can block, unbock, edit all user info and also add new user.
* Admin page also have log out and back on previous page option.


##### Important to mention that during account creation there is a conditions which need to met if user want to create account.

* All field must be filled.
* Username must contain first letter uppercase, one number, one special character and need to have lenght of 6 characters.
* Password/PIN code must be in form of four digits.
* If user try to enter his credentials which already exist on sign up page, application will display error where inform him that his account already exist so he can chose to sign in instead.
* If user didnt sign up and try to enter credentials on sign in page, application will also display error which says that his account doesnt exist.
* If by any case admin block existing user, on sign in page when user try to log in he will get message that his account is blocked.

User ID input also have filter_input function.

## Dump file is located in database folder.
