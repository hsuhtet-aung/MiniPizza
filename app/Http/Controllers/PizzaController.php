<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    function index(){
        return view('index');
    }
    function pizzas(){
        // send data to blade file
        // fake data(data from database)[array format]
    // $pizzas=[
    //     ["id"=>1,"username"=>"Hsu","pizza_name"=>"spicy","topping"=>"chilli","sauce"=>"tomato","price"=>555.9],
    //     ["id"=>2,"username"=>"Htet","pizza_name"=>"spicy","topping"=>"chilli","sauce"=>"tomato","price"=>555.9],
    //     ["id"=>3,"username"=>"Aung","pizza_name"=>"spicy","topping"=>"chilli","sauce"=>"tomato","price"=>555.9],
    //     ["id"=>4,"username"=>"Kaung","pizza_name"=>"spicy","topping"=>"chilli","sauce"=>"tomato","price"=>555.9]
    // ];
    // object format
        $pizzas=Pizza::all();
        // dd($pizzas);
    // send data to blade file
       return view('pizzas',['pizzas'=>$pizzas]);
    }
    function insert(Request $req){
        // return $req->toArray();
        //validation
        $validation=$req->validate([
            'username'=>'required',
            'pizza_name'=>'required',
            'topping'=>'required',
            'sauce'=>'required',
            'price'=>'required'

        ]);
        if($validation){
            // insert data ro database
            $pizza=new Pizza();
            $pizza->username=$req->username;
            $pizza->pizza_name=$req->pizza_name;
            $pizza->topping=$req->topping;
            $pizza->sauce=$req->sauce;
            $pizza->price=$req->price;
            $pizza->save();
            // return $pizza;
            return back()->with("success","Thank You For Your Order");
        }
        else{
            return back()->withErrors($validation);
        }
    }

    // delete data
    function delete($id){
        // return $id;
        //find data by id
        $delete_pizza_data=Pizza::find($id);
        // return $delete_pizza_data;
        //delete that data
        $delete_pizza_data->delete();
        return back()->with("delete","$delete_pizza_data->username Order is completed");
    }

    //edit form blade method
    function edit($id){
        $pizza=Pizza::find($id);
        return view('edit',['pizza'=>$pizza]);
    }
    function update($id,Request $req){
        $pizza=Pizza::find($id);
        $pizza->username=$req->username;
        $pizza->pizza_name=$req->pizza_name;
        $pizza->topping=$req->topping;
        $pizza->sauce=$req->sauce;
        $pizza->price=$req->price;

        $pizza->update();
        
        return redirect()->route("pizzas");

    }
}
