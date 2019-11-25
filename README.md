# bpi-fsm
Sample Finite Automation Logic for BPI test by Jimmy La

For this test example purpose, the application will use angularJS as the client to display the Finite Automation Logic and then do the processing in PHP.  

In this example I have just simulated the data from PHP as the "API" data to be returned and then displayed in the bpi app.  In some real world cases, the client could request data from PHP backend as API's calls, or other database data/queries etc...

The processing will be triggered when the angular app sends POST input data to PHP.  The usercan only enter 1 or 0 and then PHP (API) will process the input submitted and return the final state answer.  It will provide the angular client to display dynamically to the user for a better experience.

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

