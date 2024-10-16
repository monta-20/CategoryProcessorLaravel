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
   - 
   - 