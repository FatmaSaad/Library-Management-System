<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Models\Permission;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PermissionsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {

        $requests = $request->except('image');
        if ($request->hasFile('image')) {
            $requests['image'] = saveImage($request->image, 'admin');
        }
        Admin::create($requests);

        toast('تم الاضافه بنجاح', 'success', 'top-right');
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    // public function permissions($id)
    // {      
    //    $admin = Admin::findOrFail($id);
    //     return view('admin.admins.permissions', compact('admin'));

    // }
    // // public function storepermissions (PermissionsRequest $request)
    // // {
    // //     if ($request->has('permissions')) {

    // //     $permissions = $request->input('permissions');
    // //     // dd($permissions);

    // //         foreach($permissions as $key => $dep_permission){

    // //             foreach($dep_permission as $key => $permission){

    // //                 dd($key ,$permission);
    // //                 Permission::create(["name"=>"$key""name"=>"$key""name"=>"$key",$permission]);
    // //             }
    // //         }
    // //     }
    //    $admin = Admin::findOrFail($id)->fill($requests)->save();
    //     toast('تم الحفظ بنجاح', 'success', 'top-right');
    //     return redirect()->route('admins.index');
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }
    public function show($id)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {

        $requests = $request->except('image');
        if ($request->hasFile('image')) {
            $requests['image'] = saveImage($request->image, 'admin');
        }
        $admin = Admin::findOrFail($id)->fill($requests)->save();
        toast('تم التعديل بنجاح', 'success', 'top-right');
        return redirect()->route('admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        toast('تم الحذف', 'success', 'top-right');
        return back();
    }
}
