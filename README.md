# Laravel приложение для рассчета цены продукта для покупателя

Документация API запросов

1. POST для регистрации

/api/register

Пример json тела запроса:
```
{
    "name": "name",
    "email": "test@email.com",
    "password": "password",
    "password_confirmation": "password"
}
```

Пример json ответа при успешном выполнении (200 OK):
```
{
    "user": {
        "name": "name",
        "email": "test@email.com",
        "updated_at": "2023-11-05T18:24:58.000000Z",
        "created_at": "2023-11-05T18:24:58.000000Z",
        "id": 2
    },
    "token": "1|ts0UN4AjZv28sjaXC8CRS3RkJsCYHwVHNJU4IpJYcb3a4126"
}
```

Пример json ответа при ошибки валидации (422 Unprocessable Entity):
```
{
    "message": "The name field is required. (and 2 more errors)",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password field is required."
        ]
    }
}
```

2. POST для авторизации

/api/login

Пример json тела запроса:
```
{
    "email": "test@email.com",
    "password": "password"
}
```

Пример json ответа при успешном выполнении (200 OK):
```
{
    "user": {
        "id": 2,
        "name": "name",
        "email": "test@email.com",
        "email_verified_at": null,
        "created_at": "2023-11-05T18:24:58.000000Z",
        "updated_at": "2023-11-05T18:24:58.000000Z"
    },
    "token": "3|Vc1skZloCl69n79q5WK1wfcFgm6V7NQvE3Mn9xFC8ec510db"
}
```

Пример json ответа при ошибки валидации (422 Unprocessable Entity):
```
{
    "message": "The email field is required. (and 1 more error)",
    "errors": {
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password field is required."
        ]
    }
}
```

3. POST для выхода

/api/logout

Пример json ответа если токен авторизации не правильный (401 Unauthorized):
```
{
    "message": "Unauthenticated."
}
```

Пример json ответа при успешном выполнении (200 OK):
```
{
    "message": "Success"
}
```

4. POST Для создания продукта

/api/products

Пример json тела запроса:
```
{
    "name": "Product name",
    "price": 100
}
```

Пример json ответа при успешном выполнении (200 OK):
```
{
    "product": {
        "user_id": 2,
        "name": "name",
        "price": 100,
        "updated_at": "2023-11-05T18:38:23.000000Z",
        "created_at": "2023-11-05T18:38:23.000000Z",
        "id": 2
    }
}
```

Пример json ответа если токен авторизации не правильный (401 Unauthorized):
```
{
    "message": "Unauthenticated."
}
```

Пример json ответа при ошибки валидации (422 Unprocessable Entity):
```
{
    "message": "The name field is required. (and 1 more error)",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "price": [
            "The price field is required."
        ]
    }
}
```

5. GET для расчёта цены

/products/{product_id}/calculate-price

Пример json тела запроса:
```
{
    "tax_number": "GR123456789"
}
```

Пример json ответа при успешном выполнении (200 OK):
```
{
    "price": 124
}
```

Пример json ответа при ошибки валидации (422 Unprocessable Entity):
```
{
    "message": "The tax number field is required.",
    "errors": {
        "tax_number": [
            "The tax number field is required."
        ]
    }
}
```

6. GET для получения списка продуктов

/products

Пример json тела запроса:
```
{
    "limit_rows": 50
    "page": 1
}
```

Пример json ответа при успешном выполнении (200 OK):
```
{
    "products": [
        {
            "id": 2,
            "user_id": 2,
            "name": "name",
            "price": "100.00",
            "created_at": "2023-11-05T18:38:23.000000Z",
            "updated_at": "2023-11-05T18:38:23.000000Z"
        }
    ]
}
```

Пример json ответа при ошибки валидации (422 Unprocessable Entity):
```
{
    "message": "The limit rows field is required. (and 1 more error)",
    "errors": {
        "limit_rows": [
            "The limit rows field is required."
        ],
        "page": [
            "The page field is required."
        ]
    }
}
```
