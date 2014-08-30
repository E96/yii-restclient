# Установка
## Composer
```json
{
    "require" : {
        "e96/yii-restclient" : "~1.1"
    },
    "repositories" : [
        {
            "type" : "vcs",
            "url" : "git@github.com:holycheater/yii-curl.git"
        },
        {
            "type" : "vcs",
            "url" : "git@bitbucket.org:e96shop/yii-restclient.git"
        }
    ]
}
```
## App config

```php
<?php
return [
    'components' => [
        'restSorcery' => [
            'class' => 'RestClient',
            'baseUrl' => 'http://api.master.beta96.ru',
        ],
    ]
]
```
