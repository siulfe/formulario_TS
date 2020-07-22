<?php

namespace App\Http\Controllers;

use App\Product;
use App\Accesory;
use App\Resource;
use App\User;
use App\Instalation;
use App\Mail\sendinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $resp = new Resource;

        try{
            $ladders = Product::where("type","=",1)->get();
            $optionals = Product::where("type","=",3)->get();
            $instalations = Instalation::all();
            $resp->ladders = $ladders;
            $resp->optionals = $optionals;
            $resp->instalations = $instalations;
        }catch(Exception $e){
            return response()->json(["error"=>"internal server error"]);
        }

        return response()->json($resp);      
        */
        return response()->json(["resp"=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*
        try {
            $product = new Product;
            
            $product->code = $request->code;
            $product->description = $request->description;
            $product->unit = $request->unit;
            $product->width = $request->width;
            $product->long = $request->long;
            $product->type = $request->type;
            $product->photo = $request->photo;
            $product->save();

            if(is_array($request->accesories)){
                $accesories = array();

                foreach($request->accesories as $v) {
                    $accesories[] = $v["id"];
                }
                $product->accesories()->sync($accesories);
            }
            
            $product->loadMissing('accesories');
        } catch (Exception $e) {
            return response()->json(["error"=>"internal server error"]);
        }
        return response()->json($product);
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resp = new Resource;
        $products = array();
        
        try {
            $ladder = Product::find($request->ladder);

            Resource::CalculateMts($ladder,$request->distance,$products);

            $ladder->loadMissing('accesories');

            Resource::CalculateAccesoriesForProduct($ladder, $products,$request->type_instalation);

            if($request->curves != null){
                $accesories = Accesory::where("type_relation", "=", 3)->get();
                $p = new Product;

                $p->count_total = $request->curves;

                Resource::CalculateAccesories($p,$accesories,$products,$request->type_instalation);
            }

            if($request->cascade != null){
                $p = Product::where("type","=",2)->get();

                Resource::CalculateCount($p,$request->cascade,$products);
            }

            if($request->optionals != null){
                foreach ($request->optionals as $v) {
                    $p = Product::find($v["id"]);

                    if($p != null && $p->type == 3){
                        $p->count_total = $v["count"];
                        
                        if(is_array($products)){
                            $products[] = json_decode(json_encode($p));
                        }
                    }
                }
            }

            $resp->count_total = 0;
            foreach ($products as $v) {
                $path = Resource::imgPath($v->photo);

                if (File::exists($path) ){
                    $v->photo = file_get_contents($path);
                    $type = pathinfo($path, PATHINFO_EXTENSION);

                    $v->photo  = 'data:image/' . $type . ';base64,' . base64_encode($v->photo);
                }

                $resp->count_total += $v->count_total;
            }

            $resp->instalation = Instalation::find($request->type_instalation);
            $resp->products = $products;

        } catch (Exception $e) {
            return response()->json(["error"=>"internal server error"]);
        }

        
       return response()->json($resp);
    }


    public function sendpdf(Request $request){
        try{
            $data = new Resource;

            $data->products = $request->products;
            $data->instalation = $request->instalation;
            $data->user = $request->user;
            $data->count_total = $request->count_total;


            $pdf= \PDF::loadView('PDF/EmailProducts',compact('data'))->output();
            file_put_contents(Resource::filesPath("products.pdf"), $pdf);
            Mail::to("example@gmail.com")->send(new sendinformation($data->user)); 

        }catch(Exception $e){ 
            return response()->json(["error"=>"internal server error"]);
        }


        return response()->json(["result"=>true]);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



   

}
