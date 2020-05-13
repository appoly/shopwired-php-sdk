# ShopWired PHP SDK
PHP library to interact with ShopWired - https://www.shopwired.co.uk/

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

# Throttling (Enabled by default)

*NOTE: THIS CAN CAUSE THREAD BLOCKING*

(https://help.shopwired.co.uk/api/introduction/api-rate-limiting)
> We use the leaky bucket algorithm as a controller.
> 
>The leaky bucket algorithm allows for infrequent bursts of calls to the API, and allows your APP to continue to make an unlimited amount of calls over time.
> 
> The bucket size is 40 and this cannot be exceeded at any given time. The leak rate is 2 calls per second that continually empty the bucket.
> 
> If your APP averages 2 calls per second then it will never trip the 429 too many requests error.
> 
> API calls will be processed almost instantaneously as long as there is room in your bucket. You can make quick bursts of API calls that exceed the leak rate as long as your average call rate does not exceed 2 calls per second.


This package, by default, will throttle your requests based on this algorithm and these parameters. This uses `sleep` to time requests once the limits are hit, will mean that thread may run slowly.

## Requirements

The throttling requires redis, to implement the limit between different sessions.

## Disable

Warning: Disabling the throttling may cause the request to fail with `429 too many requests`.

To disable the throttling use:

```
ShopWiredThrottle::disable();
```

