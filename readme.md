![ScreenShot](https://raw.githubusercontent.com/bedus-creation/laradash/master/docs/screenshot.png)


# Install 
```
composer require aammui/laradash:dev-master
```
# publish the Config file
```
php artisan vendor:publish --provider="Aammui\Laradash\LaradashServiceProvider" --force
```

## Add Route to Routes List in web.php
```
use Aammui\Laradash\Facade\Laradash;

Laradash::route();
```

## Routes List
```
php artisan route:list
```

## Add Resources to webpack.mix.js
```
mix.sass('resources/sass/laradash/laradash.scss', 'public/laradash/css');
```

# Inside Project

This is build with laravel 5.7 && the resources folder are copied with respect to the laravel 5.7 folder structure (if laravel version < 5.7 ) please manully copied the sass and folder from /resources/sass/ to /resources/assets/sass/

In app.scss

add the line 

```
@import 'laradash' 

```

Now build the project and offcourse you should have installed the node dependency 

```
npm install

npm run dev

```

## Category

Each Post may belongs to any numbers of category
Each Category belongs to any numbers of post
So this relationship will be many to many

## Tag

Each Post may belongs to any numbers of Tag
Each Tag may belongs to any numbers of Post
So this relationship will be many to many


## Media

We have use Image Intervention for image stuff
Relationship is many to many

### For Image

```
data=>[
    'base_url'=>'https://youtube.com',
    'user_id'=>'1231237612001',
    'type'=>'image',
    'in_json'=>[
        'url'=>[
            'small'=>'/image/100-1sjfAScqwesrtcmn.jpg',
            'medium'=>'/image/300-1sjfAScqwesrtcmn.jpg',
            'large'=>'/image/600-1sjfAScqwesrtcmn.jpg'
        ]
    ]
]
```

### Data For Video

We will store the Iframe that can be directly display into
The Iframe.
Time of length will be store in seconds

```data=>[
    'base_url'=>'https://youtube.com',
    'user_id'=>'1231237612001',
    'type'=>'video',
    'in_json'=>[
        'url'=>[
            'small'=>'/embeded/ajsdhfjsfd',
            'medium'=>'/embeded/ajsdhfjsfd',
            'large'=>'/embeded/ajsdhfjsfd'
        ],
        'length'=>'12312313'
    ]
]

```

## Sitemap 

Sitemap will be in /sitemap.xml


## SocialAuthController


## File Upload

```

// HTML

<div id="profile" class="edit" style="background-image:url('/')">
    <div id="cover" class="btn btn-success" input-field="cover_image" data-value="21">Update Cover Image</div>
</div>

```

```

//Javascript

$('#cover').fileupload({
    serverUploadUrl:'https://sahuba.com/medias',
    serverAllFileUrl:'https://sahuba.com/medias'
});

```


## select2

```
<select name="tags[]" id="tags-input" multiple class="form-control"></select>
```

### Tags should be in the following form

```
{
    results: [
        {
            text: "Electronics and communication"
        },{
            text: "laravel"
        },{
            text: "php framework"
        },{
            text: "web devcelopment"
        },{
            text: "Computer Science"
        }
    ],
    pagination: {
        more: false
    }
}

```


```
$('#tags-input').select2({
    ajax:{
        url: '/tags',
        dataType: 'json',
        delay:1000,
        data: function (params) {
            return {q: params.term}
        },
        processResults: function (data) {
            return {
                results: data.results.map(function(item){
                    return {
                        id: item.text,
                        text: item.text
                    };
                })
            }
        }
    },
    tags:true
});
```

