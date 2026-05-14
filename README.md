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
You can run the console command using:
```bash
php bin/console app:send_notification Email recipient@example.com "Hello world"
```
```bash
php bin/console app:send_notification SMS 07123456789 "Hello world"
```
Currently, it will fail due to missing dependencies and incomplete implementations.

## Submission
Please submit your solution as a GitHub repository and share the repository link with us.
