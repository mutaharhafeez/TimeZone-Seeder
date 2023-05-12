# TimeZone-Seeder
A Laravel Seeder that populates a database table with all available time zones and their corresponding display names.

The TimeZone-Seeder uses the DateTimeZone class in PHP to retrieve a list of all available time zones. It then loops through each time zone and retrieves the timezone abbreviation and display name. If the timezone abbreviation is "GMT" or "LMT", it is ignored. Otherwise, the TimeZone model is created with the timezone identifier and the abbreviation and identifier are concatenated to create the display name. The firstOrCreate() method ensures that duplicate time zones are not added to the database.

By using this seeder, you can easily populate your Laravel application's database with all available time zones and their display names, making it easy for your users to select their preferred timezone.
