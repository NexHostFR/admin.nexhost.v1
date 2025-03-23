<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorysPageController extends Controller
{
    public function viewCategoryListe() {
        $listeCategories = Categorie::all();
        return view('products.categorys.liste', [
            "listeCategories" => $listeCategories
        ]);
    }

    public function viewCategoryCreate() {
        $listeCategories = Categorie::all();
        return view('products.categorys.create', [
            "listeCategories" => $listeCategories
        ]);
    }

    public function postCategory(Request $request) {
        try {
            $categorie = new Categorie();
            $categorie->nom = $request->input('nom');
            $categorie->description = $request->input('description');
            $categorie->url = strtolower($request->input('url'));
            $categorie->image = $request->input('image');
            $categorie->status = "actif";
            $categorie->categorie_parent = $request->input('categorie_parent');
            $categorie->save();
            return redirect('/products/category')->with('success', 'La catégorie a été créée avec succès');
        } catch (\Exception $e) {
            return redirect('/products/category')->with('error', 'Une erreur est survenue lors de la création de la catégorie');
        }
    }

    public function viewCategory($id) {

    }

    public function updateCategory($id, Request $request) {

    }

    public function deleteCategory($id) {

    }
}
