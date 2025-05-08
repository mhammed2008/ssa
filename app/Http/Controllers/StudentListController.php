<?php

namespace App\Http\Controllers;

use App\Models\StudentList;
use Illuminate\Http\Request;
use Illuminate\Support\Env;

class StudentListController extends Controller
{
    public function index()
    {
        return inertia('studentList/index');
    }

    public function show($grad)
    {
        $student = StudentList::where('grad', $grad)->first();
        return inertia('studentList/show', ['studentList' => $student , 'app_url' => Env::get('App_url') ]);
    }

    public function create()
    {
        return inertia('studentList/create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'list' => ['required','mimes:png,jpg,jpeg,svg,wehp,ico,apng,xbm,tif,jfif,gif'],
            'grad' => ['required', 'unique:App\Models\StudentList,grad']
        ]);
        $list_img = \request('list')  ? request('list')->store('images', 'public') : null;
        if ($list_img){
             StudentList::create([
                'img_url' => $list_img,
                 'grad' => $request['grad'],
            ]);
             return redirect("/studentList/{$request['grad']}");
        }
        return back();
    }

    public function edit(StudentList $id)
    {
        return inertia('studentList/edit' ,[
            'list' => $id
        ]);
    }
    public function update(Request $request , StudentList $id)
    {
        $request->validate([
            'list' => ['mimes:png,jpg,jpeg,svg,wehp,ico,apng,xbm,tif,jfif,gif']
        ]);
        $list_img = \request('list')  ? request('list')->store('images', 'public') : null;
        $id->update([
            'img_url' => $list_img
        ]);
        return redirect("studentList/$id->grad");
    }
}
