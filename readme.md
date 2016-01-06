## Running Umbraco and Laravel together on IIS 8.0

IIS Virtual Applications and Directories configuration:

Virtual Directory | Physical Path        | Application
----------------- | -------------------- | -----------
/                 | site\wwwroot         | Yes
/laravel          | site\laravel5\public | Yes

1. Umbraco code gets put in (by default) `D:\home\site\wwwroot`
2. Laravel code gets put in `D:\home\site\laravel5`
3. Ensure Laravel's public folder has `Web.config` file, with the usual rewrite rules.
4. Change Laravel's `config/app.php` application URL setting to point to the new one.
5. Add the virtual directories in the table above in Azure->App Services->Web app->Application Settings->Virtual applications and directories.
6. Try to access Umbraco. It should work.
7. Try to access Laravel at `http://jpmtestcms.azurewebsites.net/laravel`. It should error 500. This is because Umbraco's Web.config is being applied to Laravel. Lets fix that.
8. https://our.umbraco.org/forum/getting-started/installing-umbraco/16868-Non-Umbraco-Virtual-Directory?p=0
9. Umbraco should work again, but the admin interface at `/umbraco` will error 500.
10. Fix it by following http://stackoverflow.com/questions/4209999/an-asp-net-setting-has-been-detected-that-does-not-apply-in-integrated-managed-p
11. Double check Laravel, Umbraco, and Umbraco Admin are all working fine.
12. Profit!