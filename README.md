Twine-Statusboard
=================

Twine Statusboard is a small translator of the Twine-API, used to show a temperature-widget on the Panic Statusboard app. It will request the Twine-API and present temperature data in JSON format suitable for the Statusboard graph widget. It is created using PHP to be simple and versatile, and require as little setup as possible.

## Settings
You need to set your Twine data to public, and get the access key and twine ID. If you do not know how to do this, please follow my instructions for the [twine-temp repository](https://github.com/christiandt/twine-temp). You can then replace the placeholder data for the $twine_id and $access_key variables with your twine ID and access key respectively.

You can set the update frequency by changing the graph "refreshEveryNSeconds"-variable. Changing the datapoint "value"-variable from $temp_celsius to $temp_fahrenheit will change the temperature measurement from Celsius to Fahrenheit.

## Running
If you access the URL of your running server, you should see JSON encoded data ready to be used in Statusboard.
When you have assured that the API translator is up and running, you can add it as a new graph widget, or use the following link format:

    panicboard://?url=YOUR_URL&panel=graph
    
(Where you change YOUR_URL with the URL your code is running)

If you use an outdated version of PHP, you might not have support for JSON_PRETTY_PRINT. If you encounter this problem, just remove the pretty-print as it only makes the JSON-data human-readable and serves no other purpose.

## Screenshot
You should now see the following widget in statusboard

![](/img/photo.PNG)
