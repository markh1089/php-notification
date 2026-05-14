# BACKEND CODING CHALLENGE: Notification Service

For this challenge, please complete the task **without using AI tools**.  
You may use other resources (documentation, tutorials, forums, etc.), but AI-assisted coding tools are not permitted.

Although we use AI tools internally, this challenge is designed to assess **your own skills and problem-solving approach**.

## Scenario
A colleague began refactoring the notification service but had to leave unexpectedly due to an emergency.  
They left behind partially completed code and asked you to finish the implementation.

The goal of the service is to send notifications to users via email and SMS.

## Time and Goals
Please spend no more than 90 minutes on this task.  
If you get stuck, don’t hesitate to ask for clarification or guidance.  

### Your goals are to:
1. Re-implement the `SendResult` class which was accidentally deleted. It should hold information about the success/failure and a reference ID.
2. Fix the dependency injection in `bin/console` to properly wire the `NotificationService` and its channels.
3. Implement the missing parts of the `NotificationService` and the `EmailSendingService`.
4. Create and implement a new `SmsSendingService` channel (the `SMS` type is already defined in `NotificationType`).
5. Implement a robust error-handling strategy, including custom exceptions for cases like unsupported channels or failed sends.
6. Ensure the `EmailSendingService` validates email addresses.
7. Ensure the code is clean, well-documented, and follows best practices.
8. Write a brief README explaining your approach and solution.
9. Bonus: Add unit tests to verify your implementation.

## Getting Started 
install dependencies
```bash
composer i
```
You can run the console command using:
```bash
php bin/console app:send_notification Email recipient@example.com "Hello world"
```
```bash
php bin/console app:send_notification SMS 07123456789 "Hello world"
```
Currently, it will fail due to missing dependencies and incomplete implementations.

## Testing
Tests are held in the root `\test` directory

To run PHPUnit all tests
```bash
./vendor/bin/phpunit
```

To run a specific test append the terminal command with `--filter {testName}`
```bash
./vendor/bin/phpunit --filter PhoneValidatorTest
```

## Submission
Please submit your solution as a GitHub repository and share the repository link with us.


### Approach/Solution

Initially, got the project up and running, and started running the commands. 

I identified the task list from top to bottom and tried to manage my branching strategy around that. For the most part each branch i merged in represented a task section.

For the `SendResult` class, i kept as a basic DTO to maintain immutability throughout its usage. I could see where it was expected as a return type and implemented dummy data within the DTO until i could hook it up correctly

As for dependency injection into the `./bin/console` this was all a bit foreign for me coming from a Laravel background, the comment identified that I needed to bring the `NotificationService` class which i could further interrogate to see that it accepted an array of channels (`emailSendingService` and `SmsSendingService`).

Added the `libpphonenumber-for-php` (https://github.com/giggsey/libphonenumber-for-php) package to handle phone validation. I set this up to accept GB phone numbers by default, however this can be extended to allow for other phone numbers to be accepted based on the passing of the country code as an attribute.

Added custom exception handling - utilised the `SendingServiceInterface` & `NotificationServiceInterface` docblocks to identify what classes I should be creating and what exactly I should be creating this for.

Tests are not my strong point, however I have created some quick tests to handle some of the classes, but if i was to do this again, i would likely start with a TDD approach. As it isn't my strongest suite, I left it till the end.

Additionally, I moved a few classes around into different folder structures to how I would seperate and isolated classes with shared output standards. 
