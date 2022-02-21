# SURVEY


## Description

This Project is a simple program to Manage Surveys!

### Implemented with:

* Laravel
* Javascript
* Bootstrap
* JQuery
* HTML
* CSS


### Features:

1. Add a new Survey with a chain of Yes/No questions.
2. Take a survey, and the ability to re-do it.
3. The ability to add unlimited number of notes while taking the survey.
4. View all the submissions of certain survey.
5. Delete a survey.
6. Dashboard with Two Charts (Bar, Line) describe the status of the surveys.
7. Send notification Email to the Survey creator after save a submission.

###### Note: I could implement the other wanted features but I hadn't have the time to do it.



## Installation

1. First clone the project
2. Move to the Project Directory.
```bash
cd survey
```
3. Use composer to install the requirement packages
```bash
composer install
```
4. Make a fresh copy of the .env file.
5. Create a MySQL database and update the .env file with the credentials.
6. Generate the database schema.
```bash
php artisan migrate
```
7. Generate the App Key.
```bash
php artisan key:generate
```
7. Update Email variables in the .env file to make sure that the emails will be sent successfully (The failure due to this issue is ignored!).

## Usage

```bash
php artisan serve
```
Surf to the given url like:
```bash
http://127.0.0.1:8000
```
##### SURVEY is ready now!

#

![Screenshot](https://i.ibb.co/nP0jG0g/survey-screenshot.jpg)