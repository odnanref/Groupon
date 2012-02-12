Groupon Api client in PHP 5.3

You can copy directly from the:
src/php/ 
directory to your use case path be it in Zend Framework or other development
environment.


This code uses the namespace prefix:
Netcrash

A how to use example can be seen in the:
src/php/Netcrash/Groupon/example
directory, and can be run by using:
php exampleusage_output.txt

You will require groupon API key for online testing.
And using it like:
$api = new \Netcrash\Groupon\apiClient();
$api->setToken("API_KEY");

And can use the GCurl "Driver" or develop your own
this can be found in the directory
src/php/Netcrash/Groupon/ApiQuery/Driver/

Setting a driver can be done by using:
// this
$api->setDriver(new \Netcrash\Groupon\ApiQuery\Driver\GTest()); // for testing
// or this
$api->setDriver(new \Netcrash\Groupon\ApiQuery\Driver\GCurl()); // for online api

You can list divisions by using:
$api->getDivisions();

List deals by using:
$api->getDeals();

View a Deal Detail:
$Deal = $api->getDealById("GROUPON_DEAL_ID");

DataObjects are used to represent the results you can find these in:
src/php/Netcrash/Groupon/DataObject/
Deal has a more detailed class DealOptions because it has many properties for other return
values like price, array are returned.

Examples of return data in the json format were kept in (and other details used for testing and development):
src/php/Netcrash/Groupon/example/jsonexamples/


