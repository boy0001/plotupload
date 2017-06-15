For FastAsyncWordlEdid (FAWE) use fawe upload

To install:
 - Make sure you have a web server with PHP installed
 - Move the plotupload or faweupload files to your web directory (PlotSquared or FastAsyncWorldEdit)
    Note: Either will work for both plugins, there's just a different style and text
 - (If you get errors, make sure PHP isn't horribly outdated)
 - Configure the style and any other settings in plotupload/config/configuration.php
 - Change the url in PlotSquared settings.yml
 - Test out /plot download
 
 Installing on a Dedicated Server or VPS:
 - Make sure you have web server (apache2 recommended) and the latest php installed
 - Put the files into the following directory /var/www/html
 - To allow users to upload to the server allow the file to write chmod -R 0777 /var/www/html
 - Then follow the above steps to allow all other functionality.

Benefits over the old interface:
 - This can run on a different machine to your server
 - You can connect multiple servers to the same web interface
 - Downloads/Uploads are entirely unlisted/anonymous
 - You can upload files from your computer
 - Supports multiple formats (MCA/Schematic)
 - You can delete a file after you download it
 
What functionality is no longer present:
 - Plot/User Search (sacrificed for multi-server support)
 - REST-API
 
Notes:
 - If you are going to monetize this (e.g. for donators) please consider the amount of effort that has gone into PlotSquared; currently we get very little in terms of contributions. 

 
