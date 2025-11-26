protected $routeMiddleware = [
    // default bawaan Laravel
    
    'role' => \App\Http\Middleware\CheckRole::class,
    'admin' => \App\Http\Middleware\AdminOnly::class,
    'karyawan' => \App\Http\Middleware\KaryawanOnly::class,
];
