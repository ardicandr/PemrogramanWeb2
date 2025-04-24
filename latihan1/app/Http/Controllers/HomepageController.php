<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomepageController extends Controller 
{ 
<<<<<<< HEAD
    // Fungsi untuk menampilkan halaman homepage 
    public function index()
    {
        $categories = Categories::all();

        return view('web.homepage', [
            'categories' => $categories,
        ]);
    }

    public function products() 
    { 
        return view('web.products'); 
    }

    public function producT($slug)
    { 
=======
    //fungsi untuk menampilkan halaman homepage 
    public function index()
        {
            $categories = Categories::all();

            return view('web.homepage',[
                'categories' => $categories,
            ]);
        }

     public function products() 
     { 
        return view('web.products'); 
     }

     public function producT($slug){ 
>>>>>>> b381945a0a43808f183fee8f9459713e675018b5
        return view('web.product', ['slug' => $slug]); 
    }

    public function categories() 
<<<<<<< HEAD
    { 
        return view('web.categories'); 
    } 

    public function category($slug) 
    { 
        // Ganti find($slug) dengan where('slug', $slug)->first()
        $category = Categories::where('slug', $slug)->first(); 

        // Jika kategori tidak ditemukan, kirim null
        if (!$category) {
            return view('web.category_by_slug', ['slug' => $slug, 'category' => null]);
        }

        return view('web.category_by_slug', ['slug' => $slug, 'category' => $category]); 
    } 

    public function cart() 
    { 
        return view('web.cart'); 
    } 
    
    public function checkout() 
    { 
        return view('web.checkout'); 
    } 
=======
   { 
       return view('web.categories'); 
   } 
 
   public function category($slug) 
   { 
       $category = Categories::find($slug); 
 
       return view('web.category_by_slug', ['slug' => $slug, 'category' => 
    $category]); 
   } 
 
   public function cart() 
   { 
       return view('web.cart'); 
   } 
   
   public function checkout() 
   { 
       return view('web.checkout'); 
   } 
    
>>>>>>> b381945a0a43808f183fee8f9459713e675018b5
}
