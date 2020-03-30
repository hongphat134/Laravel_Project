<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publisher;
use Carbon\Carbon;

class PublisherController extends Controller
{
    public function home(){
    	$data = Publisher::all();
    	return view('admin.publisher.home',compact('data'));
    }

    public function getAdd(){
    	return view('admin.publisher.insert');
    }

    public function postAdd(Request $rq){
    	try {
    		$pub = new Publisher;
	    	$pub->pub_name = $rq->txtPubName;
	    	$pub->pub_url = str_slug($rq->txtPubName);
	    	$pub->pub_des = $rq->txtPubDes;
	    	$pub->created_at = Carbon::now()->toDateTimeString();
	    	$pub->updated_at = Carbon::now()->toDateTimeString();
	    	$pub->save();

	    	return redirect()->route('publisher/home')->with(['success'=>'Add Publisher Success']);	
    	} catch (Exception $e) {
			echo "Message: ".$e->getMessage();
			return redirect()->route('publisher/home')->with(['error'=>'Add Publisher Error']);				    		
    	}
    }

    public function delete($id){
        try {
            Publisher::destroy($id);   
            return redirect()->route('publisher/home')->with(['success'=>'Delete Publisher Success']); 
        } catch (Exception $e) {
            return redirect()->route('publisher/home')->with(['error'=>'Delete Publisher Error']);   
        }
    }

    public function getEdit($id){
        $pub = Publisher::find($id);
        return view('admin.publisher.update',compact('pub'));
    }

    public function postEdit(Request $rq,$id){
        try {
            $pub = Publisher::find($id);

            $pub->pub_name = $rq->txtPubName;
            $pub->pub_url = str_slug($rq->txtPubName);
            $pub->pub_des = $rq->txtPubDes;
            $pub->updated_at = Carbon::now()->toDateTimeString();
            $pub->save();
            return redirect()->route('publisher/home')->with(['success'=>'Edit Publisher Success']); 
        } catch (Exception $e) {
            return redirect()->route('publisher/home')->with(['error'=>'Edit Publisher Error']); 
        }
    }
}
