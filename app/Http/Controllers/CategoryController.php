<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('created_at', 'DESC')->paginate(10);
        return view('categories.index', compact('category'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);
        try {
            $category = Category::firstOrCreate(['name' => $request->name
        ], [
            'description' => $request->description
        ]);
            return redirect()->back()->with(['success'=> 'kategori:' . $category->name . ' berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $category =  Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with(['success'=> 'kategori:' . $category->name . ' berhasil dihapus' ]);
    }

    public function show()
    {

    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
            return redirect()->back()->with(['success' => 'kategori : ' . $category->name . ' Berhasil diubah']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }
}
