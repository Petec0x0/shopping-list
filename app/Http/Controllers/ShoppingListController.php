<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ShoppingList;


class ShoppingListController extends Controller
{	
	/**
	* Get all shopping list items and 
	* their category image
	*/
    public function index(){
        $list = ShoppingList::with('category')->get();
        
        return $list;
    }
	
	/**
	* Store new item
	*/
	public function store(Request $request){
		// get post request data
		$name = $request->post('item_name');
		$description = $request->post('description');
		$category_id = $request->post('category');
		$price = $request->post('price');
		$checked = false;
		
		$list = ShoppingList::create([
			'name' => $name,
			'description' => $description,
			'category_id' => $category_id,
			'price' => $price,
			'checked' => $checked,
		]);		
        return $list;
    }
	
	/**
	* Update item
	*/
	public function update(Request $request){
		// get post request data
		$item_id = $request->post('item_id');
		
		$item = ShoppingList::find($item_id);	
		$item->checked = !$item->checked;
		$item->save();
		
        return $item;
    }
	
	/**
	* Delete item
	*/
	public function delete(Request $request){
		// get post request data
		$item_id = $request->post('item_id');
		
		$item = ShoppingList::find($item_id);	
		
        return $item->delete();
    }
	
	/**
	* Get all categories
	*/
	public function categories(){
        $categories = Category::all();
        
        return $categories;
    }

}
