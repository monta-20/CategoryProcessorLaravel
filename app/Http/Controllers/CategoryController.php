<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCategory(Request $request){
        //print this request 
       // dd($request->name); // Dump and Die . it is helper function for print and stop execution of the script
        //Treatement adding new Category
        $request ->validate(
            [
               'name'=>'required|string|max:255',
               'description'=>'required|string'
            ]
       ); // this is return message error and i can use in view to show it
        //Remark : 'name' and 'description' for input in name ="" 
        $c = new Category(); //I create new Category model empty
        $c->name = $request->name; //field name in categories table. // name is in input filed name="name"
        $c->description = $request->description; //description is in input filed name="description"

        if($c->save()){//Sauvgarde $c in table categories
            return redirect("category/list") ;
        }else{
            return "The data is not save";
        }
        
    }
    //for forum add category
    public function ShowFormCategory(){
        return view('form');
    }
    //Get all catogries
    public function ListCategory(){
        // recover all data of Categories by using her model: Category from DB
        $categories = Category::all();
       // dd($categories);
        return view('list')->with('categories',$categories);
    }
}
