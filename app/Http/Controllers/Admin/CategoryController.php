<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = Category::search()->paginate(10);
        return view('admin.pages.category.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { {
            //trả về view
            $prod = Category::where('id', $id)->first();
            $array = [
                'prod' => $prod,
                'message' => 'Bạn đã đăng nhập thành công',
            ];
            // dd($array);
            return view('admin.pages.category.edit')->with($array);
        }
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
        $prods = $request->all();
        // dd( $prods);
        $oldImage = Category::where('id', $id)->first();
        if ($file = $request->file('photo')) {
            $fileName = $file->getClientOriginalName();
            $file->move('image/icon/', $fileName);
            $prods['imageIcon'] = "$fileName";
        } else {

            $prods['imageIcon'] = $oldImage->image;
        }
        $data = [
            'name' => $prods['cate_name'],
            'slug' => $prods['cate_slug'],
            'imageIcon' => $prods['imageIcon'],
            'description' => $prods['cate_description'],
            'status' => intval($prods['loai_tk']),
        ];
        // dd($data);
        Category::where('id', intval($prods['cate_id']))->update($data);
        return redirect()->route('admin/category');
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
