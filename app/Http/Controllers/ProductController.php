<?php

namespace App\Http\Controllers;
use File;
use Image;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $kategori = Category::orderBy('created_at', 'DESC')->get();
        $produk = Product::with('category')->orderBy('created_at', 'DESC')->paginate(10);

        return view('products.index', compact('kategori', 'produk'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        try {
            // default photo =  null
            $photo = null;
            if($request->hasFile('photo')){
                // maka menjalankan method saveFile()
                $photo = time().'.'.$request->photo->extension();  
   
                $request->photo->move(public_path('assets/product'), $photo);
            }

            // Simpan data ke dalam table product
            $product = Product::create([
              //  'code' => $request->code,
                'name' => $request->name,
                'description' => $request->description,
                'stock' => $request->stock,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'photo' => $photo
            ]);


            // jika berhasil 
            return redirect()->back()->with(['success' => $product->name . ' Ditambahkan']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' =>  $th->getMessage()]);
        }
    }

    public function saveFile($name, $photo)
    {
        // set nama file adalah gabungan antara nama produk dan time()
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        $path =  public_path('uploads/product');

        // cek jika upload/product bukan direktori / folder
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        Image::make($photo)->save($path . '/' . $images);
        return $images;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if(!empty($product->photo)){
            File::delete(public_path('assets/produk/' . $product->photo));
        }
        $product->delete();
        return redirect()->back()->with(['success' =>  $product->name . ' Telah Dihapus']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        try {
            $produk = Product::findOrFail($id);
            $photo = $produk->photo;
            if($request->hasfile('photo')){
                !empty($photo) ? File::delete(public_path('assets/product/' . $photo)):null;

                $photo = time().'.'.$request->photo->extension();  
   
                $request->photo->move(public_path('assets/product'), $photo);
            }

            $produk->update([
                'name' => $request->name,
                'description' => $request->description,
                'stock' => $request->stock,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'photo' => $photo

            ]);
            return redirect()->back()->with(['success' => $produk->name . ' Berhasil diubah']);

        } catch (\Throwable $th) {
             return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
}
