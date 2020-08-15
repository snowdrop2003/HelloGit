<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{

//     public function index(Request $request, Response $response){
//         return view('hello.index') ;
//     }




    //for DB
    public function index(Request $request)
    {
        if (isset($request->id)) {
            $param = [ 'id' => $request->id ];
            $items = DB::select('select * from people where id = :id', $param);
        }else{
            $items = DB::select('select * from people');
        }

        return view('hello.index', ['items'=>$items]) ;
    }




    //for middleware
    public function index4middleware(Request $request){
        return view('hello.index', ['data'=>$request->data]) ;
    }

//     public function index() {
//         $data = [
//                 ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
//                 ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
//                 ['name'=>'鈴木さちこ', 'mail'=>'sachiko@happy'],
//         ];
//         return view('hello.index', ['data'=>$data]);
//     }

    public function post(Request $request) {
        $msg = $request->msg;
        $data = [
                'msg'=>'こんにちは。'.$msg.'さん！'
        ];
        return view('hello.index', $data);
    }


    public function add(Request $request) {
        return view('hello.add');
    }

    /**
     * 【DB INSERT】INSERT文利用ver
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request) {
        $param = [
                'name' => $request->name,
                'mail' => $request->mail,
                'age'  => $request->age,
        ];
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    /**
     * 【DB INSERT】INSERT文利用ver
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create_ver_useSql(Request $request) {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age'  => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/hello');
    }

    /**
     * 更新画面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request){
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    /**
     * 更新実行
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request){
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age'  => $request->age,
        ];
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/hello');
    }

    /**
     * 削除画面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function del(Request $request){
        $param = ['id' => $request->id];
        $item = DB::table('people')->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }

    /**
     * 削除実行
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function remove(Request $request){
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/hello');
    }

}
