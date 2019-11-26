# bpi-fsm
Sample Finite Automation Logic for BPI test by Jimmy La.

For this test example purpose, the application will use angularJS as the client to display the Finite Automation Logic that is processed in PHP.  

In this example I have just simulated the data returned from PHP processing as the "API" exchange and then it can be displayed in the bpi angularJS app.  In some real world cases, the client could request data from PHP backend through API's calls, and/or perform other database queries to get additional data etc...

The processing will be triggered when the angular app sends the POST "input" data to PHP.  The user can only enter "1" or "0" in the input box and then PHP (API) will process the input submitted.  The final state "answer" will be displayed dynamically.

# There are a few simple setup steps:
1.) bower install angular (ie it can just be installed on project root)

2.) bower install angular-route (ie it can just be installed on project root)

3.) composer require --dev phpunit/phpunit ^7 (ie it can just be installed on api directory)

There are also PHP units tests included in api/tests folder: FiniteStateMachineTests.php

# Sample URL
The web app can be used in a sample/test url: http://rodimusdev.tk/web/bpi-fsm/app/index.html#/

1.) Enter inputs 0 or 1

2.) Click process to request the logic and data

3.) The final answer (ie S0 = 0) will be displayed dynamically to angular client

