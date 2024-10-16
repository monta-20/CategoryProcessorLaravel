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