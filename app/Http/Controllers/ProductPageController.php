<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produits;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function viewProductListe() {
        $listeProduits = Produits::all();
        return view('products.liste', [
            "listeProduits" => $listeProduits
        ]);
    }

    public function viewProductCreate() {
        $listeCategories = Categorie::all();
        return view('products.create', [
            "listeCategories" => $listeCategories
        ]);
    }

    public function postProduct(Request $request) {
        try {
            $produit = new Produits();
            $produit->nom = $request->input('nom');
            $produit->description = htmlspecialchars($request->input('description'));
            $produit->prix = $request->input('prix');
            $produit->status = $request->input('status');
            $produit->categorie_id = $request->input('categorie_id');
            $produit->mise_avant = filter_var($request->input('mise_avant'), FILTER_VALIDATE_BOOLEAN);
            $produit->data_produit = json_encode($request->input('data_produit'));
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $produit->image = $name;
            }
            $produit->save();
            return redirect('/products');
        } catch (\Exception $e) {
            return redirect('/products/create')->with('error', $e->getMessage());
        }
    }

    public function viewProduct($id) {

    }

    public function updateProduct($id, Request $request) {

    }

    public function deleteProduct($id) {

    }


}
