<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
     public function home(){
    	$data = Category::all();
    	return view('admin.category.home',compact('data'));
    }

    public function getAdd(){
    	return view('admin.category.insert');
    }

    public function postAdd(Request $rq){
    	try {
    		$cat = new Category;
	    	$cat->cat_name = $rq->txtCatName;
	    	$cat->cat_url = str_slug($rq->txtCatName);
	    	$cat->cat_des = $rq->txtCatDes;
	    	$cat->created_at = Carbon::now()->toDateTimeString();
	    	$cat->updated_at = Carbon::now()->toDateTimeString();
	    	$cat->save();

	    	return redirect()->route('category/home')->with(['success'=>'Add Category Success']);	
    	} catch (Exception $e) {
			echo "Message: ".$e->getMessage();
			return redirect()->route('category/home')->with(['error'=>'Add Category Error']);				    		
    	}
    }

    public function delete($id){
        try {
            Category::destroy($id);   
            return redirect()->route('category/home')->with(['success'=>'Delete Category Success']); 
        } catch (Exception $e) {
            return redirect()->route('category/home')->with(['error'=>'Delete Category Error']);   
        }
    }

    public function getEdit($id){
        $cat = Category::find($id);
        return view('admin.category.update',compact('cat'));
    }

    public function postEdit(Request $rq,$id){
        try {
            $cat = Category::find($id);

            $cat->cat_name = $rq->txtCatName;
            $cat->cat_url = str_slug($rq->txtCatName);
            $cat->cat_des = $rq->txtCatDes;
            $cat->updated_at = Carbon::now()->toDateTimeString();
            $cat->save();
            return redirect()->route('category/home')->with(['success'=>'Edit Category Success']); 
        } catch (Exception $e) {
            return redirect()->route('category/home')->with(['error'=>'Edit Category Error']); 
        }
    }
}
