# ShopWired PHP SDK
PHP library to interact with ShopWired

# Usage
## Installation

```
composer require appoly/shopwired-php-sdk
```

## Authentication
If using `.env` to handle environment variables, add:
```
SHOPWIRED_API_KEY=xxxxxxxx
SHOPWIRED_SECRET=xxxxxxx
```
If not:
```
import Appoly\ShopWiredPHPSDK\ShopWiredClient;
...

ShopWiredClient::setCredentials($api_key, $secret);
```

## Let's do something
To get all products:
```
import Appoly\ShopWiredPHPSDK\Models\Products\Products;
...

$products = Products::all()

```

# Documentation

The classes and methods are based wholly on the endpoints available in the API: https://help.shopwired.co.uk/api/introduction/api-home

Each class will have (up to) the following available functions:

```
Product::all($options = []);
Product::get($id);
Product::count($options = []);
Product::update($id, $data);
Product::create($data);
Product::delete($id)
```



