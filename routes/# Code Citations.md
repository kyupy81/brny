# Code Citations

## License: unknown
https://github.com/henryleeworld/laravel-inertia-scaffolding/blob/5ea98e665b0d1c2b7134a27eb7e84e84588037a1/bootstrap/app.php

```
use Illuminate\Foundation\Application;
   use Illuminate\Foundation\Configuration\Exceptions;
   use Illuminate\Foundation\Configuration\Middleware;

   return Application::configure(basePath: dirname(__DIR__))
       ->withRouting(
           web: __DIR__.'/../routes/web.php',
           api: __DIR__.'/../routes/api.php',
           commands: __DIR__.'/../routes/console.php',
           health: '/up',
       )
       ->withMiddleware(function (Middleware $middleware) {
           $middleware->web(append: [
               \
```


## License: MIT
https://github.com/curio-team/sdlogin/blob/b11ba3c4fd4118acdf00ee90f13a4309a7ccc035/bootstrap/app.php

```
use Illuminate\Foundation\Application;
   use Illuminate\Foundation\Configuration\Exceptions;
   use Illuminate\Foundation\Configuration\Middleware;

   return Application::configure(basePath: dirname(__DIR__))
       ->withRouting(
           web: __DIR__.'/../routes/web.php',
           api: __DIR__.'/../routes/api.php',
           commands: __DIR__.'/../routes/console.php',
           health: '/up',
       )
       ->withMiddleware(function (Middleware $middleware) {
           $middleware->web(append: [
               \
```


## License: unknown
https://github.com/128na/SimutransCrossSearch/blob/87638fe3020a58afe72901fd4f6b97e63bbce7cf/bootstrap/app.php

```
use Illuminate\Foundation\Application;
   use Illuminate\Foundation\Configuration\Exceptions;
   use Illuminate\Foundation\Configuration\Middleware;

   return Application::configure(basePath: dirname(__DIR__))
       ->withRouting(
           web: __DIR__.'/../routes/web.php',
           api: __DIR__.'/../routes/api.php',
           commands: __DIR__.'/../routes/console.php',
           health: '/up',
       )
       ->withMiddleware(function (Middleware $middleware) {
           $middleware->web(append: [
               \
```


## License: unknown
https://github.com/128na/SimutransCrossSearch/blob/87638fe3020a58afe72901fd4f6b97e63bbce7cf/bootstrap/app.php

```
use Illuminate\Foundation\Application;
   use Illuminate\Foundation\Configuration\Exceptions;
   use Illuminate\Foundation\Configuration\Middleware;

   return Application::configure(basePath: dirname(__DIR__))
       ->withRouting(
           web: __DIR__.'/../routes/web.php',
           api: __DIR__.'/../routes/api.php',
           commands: __DIR__.'/../routes/console.php',
           health: '/up',
       )
       ->withMiddleware(function (Middleware $middleware) {
           $middleware->web(append: [
               \
```


## License: unknown
https://github.com/henryleeworld/laravel-inertia-scaffolding/blob/5ea98e665b0d1c2b7134a27eb7e84e84588037a1/bootstrap/app.php

```
use Illuminate\Foundation\Application;
   use Illuminate\Foundation\Configuration\Exceptions;
   use Illuminate\Foundation\Configuration\Middleware;

   return Application::configure(basePath: dirname(__DIR__))
       ->withRouting(
           web: __DIR__.'/../routes/web.php',
           api: __DIR__.'/../routes/api.php',
           commands: __DIR__.'/../routes/console.php',
           health: '/up',
       )
       ->withMiddleware(function (Middleware $middleware) {
           $middleware->web(append: [
               \
```


## License: MIT
https://github.com/curio-team/sdlogin/blob/b11ba3c4fd4118acdf00ee90f13a4309a7ccc035/bootstrap/app.php

```
use Illuminate\Foundation\Application;
   use Illuminate\Foundation\Configuration\Exceptions;
   use Illuminate\Foundation\Configuration\Middleware;

   return Application::configure(basePath: dirname(__DIR__))
       ->withRouting(
           web: __DIR__.'/../routes/web.php',
           api: __DIR__.'/../routes/api.php',
           commands: __DIR__.'/../routes/console.php',
           health: '/up',
       )
       ->withMiddleware(function (Middleware $middleware) {
           $middleware->web(append: [
               \
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               '
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               '
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               '
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               '
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' =>
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' =>
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' =>
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' =>
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               '
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               '
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               '
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               '
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' =>
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' =>
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' =>
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' =>
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware
```


## License: unknown
https://github.com/diegopacheco/Diego-Pacheco-Sandbox/blob/168c5a9d01db8e5fbf20b92b5855e5183dc37132/scripts/php/composer-fun/hello-world-laravel/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/pyrocms/pyrocms/blob/f16695b052989fdedc8c8fa4bb3700955998b520/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: MIT
https://github.com/robclancy/presenter/blob/9eae87c0ff075673d358fdc4f44a845f66e65db5/examples/laravel-10.x/app/Http/Kernel.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```


## License: unknown
https://github.com/idiotlabs/laravel-serverless/blob/8ef2a16ef0e05587f41e02a6001eebf2b263fa1d/bootstrap/app.php

```
::class,
           ]);

           $middleware->alias([
               'auth' => \App\Http\Middleware\Authenticate::class,
               'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
               'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
               'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
               'can' => \Illuminate\Auth\Middleware\Authorize::class,
               'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
               'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
               'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
               'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
               'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::
```

