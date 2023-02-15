<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BANNER;
use App\Models\Category;


class BannerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $list_Catagory = Category::all();
        $prods = BANNER::all();
        $array = [
            'prods' => $prods,
            'list_Catagory' => $list_Catagory,
        ];
        return view('admin.pages.banners.index')->with($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fillCatagoryAll = Category::where('status', 1)->get();
        $prods = BANNER::all();
        $array = [
            'fillCatagoryAll' => $fillCatagoryAll,
            'prods' => $prods,
        ];
        return view('admin.pages.banners.create')->with($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bans = $request->all();
        $request->validate(
            [
                'ban_title' => 'required|unique:BANNER,title',
                'ban_description' => 'required',
                'ban_image' => 'required|mimes:jpg,png,jpeg,gif',
                'ban_link' => 'required',
            ],
            [
                'ban_title.required' => 'Please input Title of Banner!',
                'ban_title.unique' => 'Banner dupplicate title!',
                'ban_description.required' => 'Please input Description of Banner!',
                'ban_link.required' => 'Please input Categories of Banner!',
                'ban_image.required'  => 'Please input Image of Banner!',
                'ban_image.mimes' => 'Accept image type: jpg, png, jpeg, gif!',
            ]
        );
        if ($request->hasFile('ban_image')) {
            $file = $request->file('ban_image');
            $image = $file->getClientOriginalName();
            $file->move("image/banner", $image);
        } else {
            $image = null;
        }
        $bans['ban_image'] = $image;

        $data = [
            'title' => $bans['ban_title'],
            'description' => $bans['ban_description'],
            'image' => $bans['ban_image'],
            'link' => $bans['ban_link'],
            'status' => intval($bans['ban_status']),
        ];
        // dd($data);
        BANNER::create($data);
        return redirect()->route('admin/banner')->with('Success', 'Create Banner success!');
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
    {
        $fillCatagoryAll = Category::where('status', 1)->get();
        $banner = BANNER::where('id', $id)->first();
        // dd($banner);
        $array = [
            'fillCatagoryAll' => $fillCatagoryAll,
            'banner' => $banner,
        ];
        return view('admin.pages.banners.update')->with($array);
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

        $bans = $request->all();
        $request->validate(
            [
                'ban_title' => 'required',
                'ban_description' => 'required',
                'ban_image' => 'mimes:jpg,png,jpeg,gif',
                'ban_link' => 'required',
            ],
            [
                'ban_title.required' => 'Please input Title of Banner!',
                'ban_description.required' => 'Please input Description of Banner!',
                'ban_link.required' => 'Please input Categories of Banner!',
                'ban_image.mimes' => 'Accept image type: jpg, png, jpeg, gif!',
            ]
        );

        $oldImage = BANNER::where('id', $id)->first();

        if ($image = $request->file('ban_image')) {

            $filename = $image->getClientOriginalName();
            $image->move('image/banner/', $filename);
            $bans['image'] = "$filename";
        } else {
            $bans['image'] = $oldImage->image;
        }

        $data = [
            'title' => $bans['ban_title'],
            'description' => $bans['ban_description'],
            'image' => $bans['image'],
            'link' => $bans['ban_link'],
            'status' => intval($bans['ban_status']),
        ];
        BANNER::where('id', $id)->update($data);

        return redirect()->route('admin/banner')->with('Success', 'Update Banner success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $banner = BANNER::find($id);
        // // xóa hình
        // //unlink('image/banner/' . $banner->image);
        // BANNER::destroy($id);
        // // $banner->delete();
        // return redirect()->route('admin/banner')->with('Success', 'Delete Banner success!');

        BANNER::where('id', $id)->update(['status' => 0]);
        return back()->with('Success', 'Banner has been disabled!');
    }
}
