## Running Umbraco and Laravel together on IIS 8.0
http://jpmtestcms.azurewebsites.net/ -> Umbraco
http://jpmtestcms.azurewebsites.net/laravel -> Laravel

1. Umbraco code gets put in (by default) `D:\home\site\wwwroot`
2. Laravel code gets put in `D:\home\site\laravel5`
3. Ensure Laravel's public folder has `Web.config` file, with the usual rewrite rules.
4. Change Laravel's `config/app.php` application URL setting to point to the new one.
5. Add the virtual directories in Azure->App Services->Web app->Application Settings->Virtual applications and directories.

Virtual Directory | Physical Path        | Application
----------------- | -------------------- | -----------
/                 | site\wwwroot         | Yes
/laravel          | site\laravel5\public | Yes

6. Try to access Umbraco. It should work.
7. Try to access Laravel at `http://jpmtestcms.azurewebsites.net/laravel`. It should error 500. This is because Umbraco's Web.config is being applied to Laravel. Let's fix that.
8. https://our.umbraco.org/forum/getting-started/installing-umbraco/16868-Non-Umbraco-Virtual-Directory?p=0
9. Profit!
