10. Send Model Data from Controller to view
      -Task : Display all category in GUI
      -Path:"/category/list" 
      -Treatment: CategoryController ==> name function: ListCategory
      -Result : page list.blade.php 

   - in Controller CategoryController : using model for interact with DB ===>
        //Get all catogries
         public function ListCategory(){
             // recover all data of Categories by using her model: Category from DB
             $categories = Category::all();
             //dd($categories);
             return view('list')->with('categories',$categories);
         }
    - View result in view by foreach and -> to access to item : list.blade.php
       @foreach($categories as $category)
                 <tr>
                     <th scope="row">{{ $category->id }}</th>
                     <td>{{ $category->name }}</td>
                     <td>{{ $category->description }}</td>
                 </tr>
        @endforeach     

11. Request Validation 
    - When send empty data ans send it show an error in view page, my solution
    now is when empty just recieve message error =>required is solution in input but 
    when client delete from inspecter the problem is return.
    -SOLUTION : validator , so in addController function ==>
     $request ->validate(
            [
               'name'=>'required|string|max:255',
               'description'=>'required|string'
            ]
       ); // this is return message error and i can use in view to show it
    //Remark : 'name' and 'description' for input in name ="" 
    - form.blade.php : display this message by using @error below each input field
    @error("name") // name in input name="name"
        {{ $message }}
    @enderror
    - when i fill field and other none , and i refresh the content when i fill the filed is dispear
    so i use : value = {{ @old('name') }} // name in input name="name"
    ==> is used to repopulate form fields with the old input data after a form submission fails
    (for example, due to validation errors).
    - in addController when i add back to : "category/list"
     ==> return redirect("category/list")
12. Delete Data & Flash Message   
       -Task : Create button supprimer to delete category
       -Path : "/category/delete/{id}"
       -Treatement : CategoryController =>deleteCategory(id)
       -Result : redirect to page list("/category/list")
    - in CategoryController : //Delete Category 
          public function deleteCategory($id){
              $categories =Category::find($id); //retrives category by id
      
              $categories->delete(); //delete category

              return redirect("category/list")->with('msg','Your Category has delete with succes');
          }
    - in web.php :  Route::get('/category/delete/{id}', [CategoryController::class, 'deleteCategory']);
       ==>example when i visit : http://127.0.0.1:8000/category/delete/7 is delete id 7.
    - in list.blade.php i create button in form link :<td> <a class="btn btn-danger" href="/category/delete/{{ $category->id }}">Delete</a></td>
    - after delete category give me message i explain this :
      - return redirect("category/list")->with('msg','Your Category has delete with succes'); //so i pass a data as message
      - in list.blade.php : 
           @if ($message = Session::get('msg'))
                 <div class="alert alert-success" role="alert">
                      {{ $message }}
                 </div>
            @endif
            // Session::get('msg') :retrieves a session value associated with the key 'msg' and stores it in the variable $message.  
      - Do the same in function addCategory {
            .............
            return redirect("category/list")->with('msg','Your Category has adding with succes'); //beacuse in the same redirect
      }      
    -Now in model i use static function (all , find) ..... and function (save , delete).       