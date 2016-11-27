# Simple Cache


## Redis Cache

```
use Predis\Client;

$client = new Client();
$cache = new Pongtan\SimpleCache($client);
```