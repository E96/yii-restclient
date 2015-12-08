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
            "url" : "git@github.com:E96/yii-restclient.git"
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
            'baseUrl' => '<api_url>',
        ],
    ]
]
```
