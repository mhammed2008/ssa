<?php

namespace App\Http\Controllers;

use App\Models\Grads;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradsController extends Controller
{
    public function index(User $id)
    {
        if (\auth()->id() !== $id->id && \auth()->user()->Admin !== 1 ){
            return redirect("/student/$id->id/login");
        }
        $categories = $id->grad()->get()->all();
        $category = [];
        $cont = 0;
        $cont2 = 0;
        foreach ($categories as $x){
            $cont2 = $cont2 + 1;
            // هنا استخدم cont لتحديد المعلومات من category
            if( ($cont === 0 && $cont2 === 1)|| $x['category'] !== $category[$cont] ){
                $category[] .= $x['category'];
                // هنا استخدم cont2 للتأكد من ان cont لن يتخطا 0 قبل ان يتم ملئ category
                $cont = $cont2 === 1 ? 0 : $cont + 1;
            }
        }

        return inertia('grad/index', [
            'categories' => $category ,
            'user_id' => $id->id
        ]);
    }
    public function show($category , $id)
    {
        if (\auth()->id() !== $id && \auth()->user()->Admin !== 1 ){
            return redirect("/student/$id/login");
        }
        return inertia('grad/show', [
            'grads' => Grads::query()->where('category' , $category)->where('user_id' , $id)->get()->all(),
            'user' => $id
        ]);
    }

    public function create(User $id)
    {
        return inertia('grad/create',[
            'user' => $id
        ]);
    }

    public function store(Request $request ,User $id)
    {
        $request->validate([
            'category' => ['required'],
            'material1' =>['required','string'],
            'grad1' =>['required','min:2'],

            'material2' =>['required','string'],
            'grad2' =>['required','min:2'],

            'material3' =>['required','string'],
            'grad3' =>['required','min:2'],

            'material4' =>['required','string'],
            'grad4' =>['required','min:2'],

        ]);
        $first = 0;
        while ($first <= 10){
                $first = $first + 1;

            if ($request["grad$first"] != null && $request["material$first"] != null ){
                $id->grad()->create([
                    'material' => request("material$first"),
                    'grad' => request("grad$first"),
                    'category' => \request("category"),
                ]);
            }
        }
        return back()->with(['success' => 'تمت اضافة الدرجات بنجاح']);
    }

    public function destroy($id,$category)
    {
        Grads::query()->where('user_id', $id)->where('category' , $category)->delete();
        return redirect('/grads/'.$id.'');
    }
}
