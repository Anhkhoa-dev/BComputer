<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VOUCHER;
use Validator;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = VOUCHER::all();
        $array = [
            'voucher' => $voucher,
        ];
        return view('admin.pages.voucher')->with($array);
    }

    /**
     * Show the form for creating a new resoure.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.voucher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$vous = $request->all();
        //$request->validate(
            $validator = Validator::make($request->all(),
            [       'vou_code' => 'required',
                    'vou_content' => 'required',
                    'vou_discount' => 'required',
                    'vou_condition' => 'required',
                    'vou_dateStart' => 'after_or_equal:today',
                    'vou_endStart' => 'after_or_equal:vou_dateStart',

            // [
            //     'vou_code' => 'required|unique:VOUCHER,code',
            //     'vou_content' => 'required',
            //     'vou_discount' => 'required|numeric|min:0|max:100',
            //     'vou_condition' => 'required|numeric|min:1',
            //     'vou_dateStart' => 'after_or_equal:today',
            //     'vou_endStart' => 'after_or_equal:vou_dateStart',
            // ],
            // [
            //     'vou_code.required' => 'Please input Code of Voucher!',
            //     'vou_code.unique' => 'Voucher dupplicate Code!',
            //     'vou_content.required' => 'Please input Content of Voucher!',
            //     'vou_discount.required' => 'Please input Discount of Voucher!',
            //     'vou_discount.digits' => 'Please input Discount with 0->100 %!',
            //     'vou_condition.required' => 'Please input Condition of Voucher!',
            //     'vou_condition.min' => 'Please input Condition more than 0!',
            //     'vou_dateStart.after_or_equal' => 'Please input Date Start after or equal Today!',
            //     'vou_endStart.after_or_equal' => 'Please input End Start after or equal Date Start!',
            ]
        );
        if ($validator->passes()) {
            return response()->json(['success'=>'Added new records.']);
        }
    	return response()->json(['error'=>$validator->errors()->all()]);



    // $data = [
    //     'code' => $vous['vou_code'],
    //     'content' => $vous['vou_content'],
    //     'discount' => doubleval($vous['vou_discount']/100.00),
    //     'condition' => intval($vous['vou_condition']),
    //     'dateStart' => $vous['vou_dateStart'],
    //     'endStart' => $vous['vou_endStart'],
    // ];
    // VOUCHER::create($data);
    // return redirect()->route('admin/voucher')->with('Success', 'Create Voucher success!');


        // if($request->ajax()){
        //     $data = [
        //         'code' => $request->code,
        //         'content' => $request->noidung,
        //         'discount' => doubleval($request->discount),
        //         'condition' => $request->condition,
        //         'dateStart' => date('d/m/Y', strtotime($request->dateStart)),
        //         'endStart' => date('d/m/Y', strtotime($request->endStart)),

        //     ];

        //     // if(VOUCHER::where('code', $data['code'])->first()){
        //     //     return 'exists';
        //     // }

        //     VOUCHER::create($data);
        //     dd($data);

        //     return redirect()->route('admin/voucher')->with('Success', 'Create Voucher success!');
        //}
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
        $vous = $request->all();
        $request->validate(
            [
                //'vou_code' => 'required|unique:VOUCHER,code',
                'vou_content' => 'required',
                'vou_discount' => 'required|numeric|min:0|max:100',
                'vou_condition' => 'required|numeric|min:1',
                'vou_dateStart' => 'after_or_equal:today',
                'vou_endStart' => 'after_or_equal:vou_dateStart',
            ],
            [
                'vou_content.required' => 'Please input Content of Voucher!',
                'vou_discount.required' => 'Please input Discount of Voucher!',
                'vou_discount.digits' => 'Please input Discount with 0->100 %!',
                'vou_condition.required' => 'Please input Condition of Voucher!',
                'vou_condition.min' => 'Please input Condition more than 0!',
                'vou_dateStart.after_or_equal' => 'Please input Date Start after or equal Today!',
                'vou_endStart.after_or_equal' => 'Please input End Start after or equal Date Start!',
            ]
        );

        $data = [
            //'code' => $vous['vou_code'],
            'content' => $vous['vou_content'],
            'discount' => doubleval(($vous['vou_discount'])/100.00),
            'condition' => intval($vous['vou_condition']),
            'dateStart' => $vous['vou_dateStart'],
            'endStart' => $vous['vou_endStart'],
        ];
        VOUCHER::where('id', $id)->update($data);
        return redirect()->route('admin/voucher')->with('Success', 'Update Voucher success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vous = VOUCHER::where('id',$id)->first();
        VOUCHER::destroy($id);
        return redirect()->route('admin/voucher')->with('Success', 'Delete Voucher success!');
    }


    public function AjaxGetVoucher(Request $request)
    {
        if($request->ajax()){
            $voucher = VOUCHER::find($request->id);
            $voucher->ngaybatdau = date('Y-m-d', strtotime(str_replace('/', '-', $voucher->ngaybatdau)));
            $voucher->ngayketthuc = date('Y-m-d', strtotime(str_replace('/', '-', $voucher->ngayketthuc)));
            return $voucher;
        }
    }

}
