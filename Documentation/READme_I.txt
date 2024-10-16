3 . First Touch
   - php artisan serve
   - Application laravel not necessity server(Xamp or Wamp(Largon)) because it has own server laravel.   
   - Concepts Larval : route ===> function(Controller) ===> view(pages):interfaces.
   - local address=>route : 127.0.0.1:8000("/").
   - View by default extension : .blade.php.
   - Not find two same path in route.

4. First Controller
   - Path : "page1/print" it load and correct for all framworks.
   - create controller : php artisan make:controller PageController.
   - Example calling controllers : Route::get('/page1', 'App\Http\Controllers\PageController@print_page1');

5. Send Data From Controller to View
   - return view('Data.index'); // to acces file index under folder Data.
   - return view('Data.index')->with("name",$name); //for passing data and view('name of variable use in template blade',variable) and in view use {{ variable }} to print it.
   - print table in view by @foreach(variable as item) ... @endforeach

6. First Migration
   - create new database in phpmyadmin name eshopping
   - connects my application to database in file .env and necessary champs:
     # DB_HOST=127.0.0.1
     # DB_DATABASE=eshopping
     # DB_PORT=3306
     # DB_USERNAME=root
     # DB_PASSWORD=     
   - php artisan make::migration create_categories_table // create migration  local in database/migration/..
   - result in file and important is in up :
   /*public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }*/ 
    - so the name of table is categories and i add two champ description and name : $table->string('name');
      $table->text('description');
    - php artisan migrate : to migrate my database in local , when i refresh in myphpadmin is give me the table.
    - I create another table prouducts in champs : name,description,quantite,price.==>same process as categories.        
    - For see all commande in php artisan : php artisan list

7. First Model
    - model is table in database and provide any esay way's to interact with the table data using Laravel Eloquent ORM.
    - so each model is connected to a table and typically represent an entity like categories and products.
    - create model : php artisan make:model Name(singuliar) ==> Category , Product
    - for any model folow this steps: 
       -Task : add new Category 
       -Path:"/category/add" 
       -Treatment: create new controller : CategoryController ==> name function: AddCategory
       -Result : print message  
       ==>File  CategoryController ===>
       class CategoryController extends Controller
            {
                public function AddCategory(){
                    //Treatement adding new Category
                    $c = new Category(); //I create new Category model empty
                    $c->name = "Sport"; //field name in categories table.
                    $c->description = "Sport is a physical activity or competition that promotes fitness, skill, and teamwork while providing entertainment and enjoyment.";
            
                    $c->save();//Sauvgarde $c in table categories
                    return "The Category has added!" ;
                }
            }
        ===>web.php : //Category add new data
                      Route::get('/category/add','App\Http\Controllers\CategoryController@AddCategory');
    - Question : How did you make a model and name it category? How did you connect it to the categories table in the BD?
    - Answer 1 :  you need to define the Category model and make sure it's connected to the categories table. Laravel will 
      automatically connect the model to the categories table based on the naming convention (plural form of the model name), 
      so you don't need to explicitly define the table name unless you are using a custom table name.   
    - Answer 2 : I can connect(bind) manullay : in model Cantegory 
         ===> class Category extends Model
            {
                protected $table ="categories";
            }
    - Every time i visit /category/add the same the result is added.

8. Model and tables
    - Create Forum to add category (dynamically adding).
       -Task : display forum 
       -Path:"/category/form" 
       -Treatment: create new controller : CategoryController ==> name function: ShowFormCategory
       -Result : page form.blade.php 
    -I use Bootstrap so i add two link CDN(CSS,JS) IN form.blade.php 

9. Form and Request
     -Task : adding data in DB 
     -Path:"/category/add" 
     -Treatment: CategoryController ==> name function: AddCategory
     -Result : display message : "Category adding in DB"
     ==> i do modification in function addCategory  
        -- step 1 connect button submit to function addCtegory
          ==>  <form action="/category/add" method="POST"> ......
        -- step 2 change get to post because (method="POST")
          ===>Route::get('/category/add','App\Http\Controllers\CategoryController@AddCategory');
            change to : Route::post('/category/add','App\Http\Controllers\CategoryController@AddCategory');
        -- step 3 secure your form : @csrf    
        -- step 4 in input give her name by name parameter in input :                 <input type="text" class="form-control" id="categoryName" name="name" placeholder="Enter category name" required>
        -- step 5 retrieve resut by Request and send data in controller AddController
           /* public function AddCategory(Request $request){
        
               $c = new Category(); //I create new Category model empty
               $c->name = $request->name; //field name in categories table. // name is in input filed name="name"
               
               if($c->save()){//Sauvgarde $c in table categories
                   return "The Category has added!" ;
               }else{
                   return "The data is not save";
               }
            }*/


            