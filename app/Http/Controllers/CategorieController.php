<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories=Categorie::all();
            return response()->json($categories, 200);  #7aja chne5ouha m server donc response
        }catch(\Exception $e){
            return response()->json("impossible de recuperer ", 404);

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categories=new Categorie([
                "nomcategorie"=>$request->input("nomcategorie"),
                "imagecategorie"=>$request->input("imagecategorie")

            ]);
             $categories->save();
             return response()->json($categories,200);
            
        } catch (\Exception $e) {
            return response()->json("ajout impossible");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $categories=Categorie::findOrFail($id);
            $categories->update($request->all());
               
             return response()->json($categories,200);
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $categories=Categorie::findOrFail($id);
            $categories->delete();
               
             return response()->json("categorie supprimer avec succes",200);
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage(),$e->getCode());
        }
    }
}
