<?php

namespace App\Http\Controllers;

use App\Product;
use App\Accesory;
use App\Calculation;
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
        }catch(\Exception $e){
            return response()->json(["error"=>$e->getMessage()]);
        }

        return response()->json($resp);      
        */

        /*
        $path = Resource::imgPath("W-011.jpg");
        return response()->json([
            "path" => $path,
            "resp"=>\Storage::disk('public')->url($path),
            "exists" => \Storage::disk('public')->exists($path)
        ]);*/

        $resp = Accesory::find(1);

        $resp->loadMissing('calculations');

        return response()->json($resp);
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
        } catch (\Exception $e) {
            return response()->json(["error"=>$e->getMessage()]);
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
                $accesories = Accesory::where("type", "=", 2)->get();
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

                if (\Storage::disk('public')->exists($path) ){
                    $v->photo = \Storage::disk('public')->get($path);
                    $type = pathinfo($path, PATHINFO_EXTENSION);

                    $v->photo  = 'data:image/' . $type . ';base64,' . base64_encode($v->photo);
                }

                $resp->count_total += $v->count_total;
                Resource::FormatNumber($v, "count_total");

                if(property_exists($v,"long_total"))
                    Resource::FormatNumber($v, "long_total");
                    
            }


            $resp->instalation = Instalation::find($request->type_instalation);
            $resp->products = $products;

        } catch (\Exception $e) {
            return response()->json(["error"=>$e->getMessage()]);
        }

       return response()->json($resp);
    }


    public function sendpdf(Request $request){
        try{

            $user = new User();           
            $data = new Resource;

            $data->products = $request->products;
            $data->instalation = $request->instalation;
            $data->user = $request->user;
            $data->count_total = $request->count_total;

            $user->name = $request->user["name"];
            $user->email = $request->user["email"];
            $user->phone = $request->user["phone"];
         
            $data->headerIMG = \Storage::disk('public')->get(Resource::imgPath('headerPDF.jpg'));

            $type = pathinfo(Resource::imgPath('headerPDF.jpg'), PATHINFO_EXTENSION);

            $data->headerIMG = 'data:image/' . $type . ';base64,' . base64_encode($data->headerIMG);

            $pdf= \PDF::loadView('PDF/emailProducts',compact('data'))->output();

            \Storage::disk('public')->put(Resource::filesPath("products.pdf"),  $pdf);

            Mail::to('dougdan85@gmail.com')->send(new sendinformation($data->user)); 

            Mail::to($user->email)->send(new sendinformation($data->user));
        
            $this->validate($request, [
                'user.email' => 'required|unique:users,email|max:255',
            ]);

            $user->save();

        }catch(\Exception $e){
            if($e->getCode() != 0 && $e->getCode() != 23505)
                return response()->json(["error"=>$e->getMessage()]);
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
