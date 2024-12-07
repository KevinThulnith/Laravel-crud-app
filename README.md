<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel project

### Setting up the project. All commands executed on project directory command prompt.

1. Creating an Application :

method one

```bash
laravel new <project-name>
```

method two

```bash
composer create-project laravel/laravel <project-name>
```

2. Go to project directory :

```bash
cd <project-name>
```

3. Install npm packages :

_&&_ Separates commaands

```bash
npm install && npm run build
```

4. Go to project directory :

```bash
cd <project-name>
```

5. Test project :

```bash
composer run dev
```

6. Run server :

```bash
php artisan serve
```

## Project database and models

Setting up the project. All commands executed on project directory command prompt.

1. Create DB connection on .env file :

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example-app
DB_USERNAME=root
DB_PASSWORD=
```

2. Make first migrations save migrations :

```bash
php artisan migrate
```

3. Prepare migration :

```bash
php artisan make:migration create_products_table
```

4. Set up table columns and migrate : <br>
   **go to the migration file and make changes** nable name must be plural

```bash
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->integer("quantity");
            $table->decimal("price", 10, 2);
            $table->text("description");
            $table->timestamps();
        });
    }
```

5. Genarate model class for the table:

_model name must be plural_

```bash
php artisan make:model products
```

6. Edit created model :

In app/Models there is coresponding file to edit,

```bash
class products extends Model
{
    protected $fillable = ["name", "quantity", "price", "description"];
}
```

## Controller and Route

edit project files to view, controll db data.

1. Make controller class :

Controller class is created in app/Http/Controllers

```bash
php artisan make:controller productsController
```

2. Create a view _resources/views_ basic html/php:

3. Link view to controller:

```bash
class productController extends Controller
{
    public function index()
    {
        return view('product.index');
    }
}
```

4. Create route on routes/web.php and link controller class:

```bash
use App\Http\Controllers\productController;

Route::get('/product', [productController::class, 'index'])->name('product.index');
```

5. Create form view :

_add the folowing to view errors and form security_ describe form method inside brackets

```bash
    @csrf
    @method('post')
```

```bash
  <div class="div">
    @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $item)
            <ul>{{$item}}</ul>
        @endforeach
      </ul>
    @endif
  </div>
```

6. Function that responds to form :

```bash
    public function store(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'quantity' => 'required|decimal:0,2',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $newProduct = product::create($data);

        return redirect(route('product.index'));
    }
```

7. Create form route link function :

```bash
Route::post('/product', [productController::class, 'store'])->name('product.store');
```

8. link form to a route :

```bash
  <form action="{{route('product.store')}}" method="post">
```

## Select, insert, delete, update data

edit project files to view, controll db data.

1. Insert data :

Validate data before inserting

```bash
    $data = $req->validate([
        'name' => 'required',
        'quantity' => 'required|decimal:0,2',
        'price' => 'required|numeric',
        'description' => 'required',
    ]);
    $newProduct = product::create($data);
```

2. Select data :

_SELECT \* FROM <table-name>_ in laravel

```bash
    $products = product::all();
```

3. Delete data :

```bash
   $product->delete();
```

4. Update data :

```bash
    $data = $req->validate([
        'name' => 'required',
        'quantity' => 'required|decimal:0,2',
        'price' => 'required|numeric',
        'description' => 'required',
    ]);
    $product->update($data);
```

## Set up Login\ Register

All commands executed on project directory command prompt.

1. Rerriev required packages to project :

```bash
 composer require laravel/breeze --dev
```

2. Install required packages to project :

```bash
 php artisan breeze:install
```

Select blade as front end, press enter twice

3. Install npm :

```bash
 npm install
```
