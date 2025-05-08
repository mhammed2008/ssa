<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return inertia('student/index',[
            'students' => User::query()
                ->when(\Illuminate\Support\Facades\Request::input('search'), function ($query, $search) {
                        $query->where('name', 'like', "%$search%");
                })->latest()
                ->paginate(10)
                ->appends($_GET)
                ->through(fn($user)=> [
                    'id'=> $user->id,
                    'name' => $user->name,
                ]),

            'filters' => \Illuminate\Support\Facades\Request::only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('student/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:App\Models\User,name'],
            'password' => ['required' , 'unique:App\Models\User,password'],
            'grad' => ['required'],
            'birth_date' =>['required'],
            'profile_img' => ['mimes:png,jpg,jpeg,svg,wehp,ico,apng,xbm,tif,jfif,gif'],
            'description' => ['nullable','max:1500']
        ]);


        $profile_img = \request('profile_img') ? request('profile_img')->store('images', 'public') : null;

        User::create([
            'name' => \request('name'),
            'password' => \request('password'),
            'grad' => \request('grad'),
            'birth_date' => \request('birth_date'),
            'profile_img' => $profile_img,
            'description' => $request->description
        ]);
        return redirect('/');
    }

    public function loginShow(User $id)
    {

        return inertia('student/login',['name' => $id->name]);

    }

    public function login(Request $request)
    {
        $attribute = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(User::where('name', $request->name)->first()){
            $user = User::where('name', $request->name)->first();
            if ($request->password == $user->password ){
                Auth::login($user, true);
                $auth = Auth::user()->id;
                return redirect("/student/".$auth."");
            }
        }

        return back()->withErrors(['password'=>'بيانات الدخول هذه غير متطابقة للبيانات المسجلة لدينا.'] );
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (\auth()->id() !== $user->id && \auth()->user()->Admin !== 1 ){
            return redirect("/student/$user->id/login");
        }
        return inertia('student/show',['user' => $user->only(['name','password','grad','profile_img','description','id'])]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        $password = $id->getAuthPassword();
        return inertia('student/edit' , ['user' => $id , 'password' => $password]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $id)
    {
        $attribute = $request->validate([
            'name' => ['unique:App\Models\User,name'],
            'password' => ['unique:App\Models\User,password'],
            'grad' => ['required'],
            'birth_date' =>['required'],
            'description' => ['max:1500']
        ]);
        $profile_img = \request('profile_img')  ? request('profile_img')->store('images', 'public') : null;


        if ($id->update([
            'name' => $request->name ?$request->name: $id->name ,
            'password' => $request->password ?$request->password: $id->password ,
            'grad' => $request->grad,
            'birth_date' => $request->birth_date,
            'description' => $request->description,
            'profile_img' => $profile_img ?  $profile_img : $id->profile_img
        ])) {
            return redirect('/');
        }

        return back()->withErrors([
            'password' => 'الاسم او رقم الطالب مستخدم من قبل ',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        $id->delete();
        return redirect('/');
    }
}
