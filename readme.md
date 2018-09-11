# Install 

composer require aammui/laradash

# publish the file

php artisan vendor:publish 

&& select for provider=Aammui\Laradash\LaradashServiceProvider

# Screenshot
![ScreenShot](https://raw.githubusercontent.com/bedus-creation/laradash/master/docs/screenshot.png)

# Inside Project

This is build with laravel 5.7 && the resources folder are copied to with respect to the laravel 5.7 folder structure (if laravel < 5.7 ) please manully copied the sass and folder from /resources/sass/ to /resources/assets/sass/

In app.scss

add the line 

```
@import 'laradash' 

```

Now build the project and offcourse if install the node dependency 

```
npm install

npm run dev

```