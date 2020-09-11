<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Config;
use App\Menu;
use Session;
use Storage;

class MenuController extends Controller
{
    
    
    public function __construct() {
       $this->middleware('auth');
       
    }

    public function blank(Request $request){
        return view('blank');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255|unique:menu',
        ]);
    }



    public function getSubMenu(Request $request,$id){
        $id = $id;
        $menuList = Menu::with('children')->where('parent_id','=',$id)->get();
        //dd( $menuList);
        $str = "<select name='menu_id' class='form-control'>";
            $str.="<option value='0'>Choose Sub Menu</option>";
            foreach($menuList as $item){
                $str.="<option value='".$item['id']."'>".$item['title']."</option>";
            }
        
         $str.= "</select>";
        //return array('status'=>'success')
        echo $str;die;
    }



       public function getSubMenuEdit(Request $request,$id,$selected){
        $id = $id;
        $menuList = Menu::with('children')->where('parent_id','=',$id)->get();
        $str = "<select name='menu_id' class='form-control'>";
        foreach($menuList as $parentItem){
            $str.="<optgroup label=".$parentItem['title'].">";
            foreach($parentItem['children'] as $item){
                if($item['id']==$selected){
                    $sel ="selected='selected'";
                }else{
                    $sel ="";
                }
                $str.="<option value='".$item['id']."' ".$sel.">".$item['title']."</option>";
            }
        }
         $str.= "</select>";
        //return array('status'=>'success')
        echo $str;die;
    }



    public function allMenuList(Request $request){
        $menuList = Menu::with('children')->Paginate(15);

        $categories = Menu::where('parent_id', '=', 0)->get();
        $allCategories = Menu::pluck('title','id')->all();
        //return view('categoryTreeview',compact('categories','allCategories'));
        return view('admin.Menu.menuList',compact('categories','allCategories','menuList'));

    }



    public function allMenuListManage(Request $request){
        $menuList = Menu::with('childMenu')->Paginate(15);
        
        return view('admin.Menu.MenuListManage',compact('menuList'));
    }


     public function allMenuTypeListManage(Request $request,$id){
        $parentMenu = Menu::find($id);
        $menuList = Menu::with('childMenu','Parent')->where('parent_id','=',$id)->Paginate(15);
        return view('admin.Menu.MenuTypeListManage',compact('menuList','parentMenu'));
    }

    



    public function addMenu(Request $request,$id=null){
        $menu = Menu::all();
        if($request->isMethod('post')) {
        $validator = $this->validator($request->all());
        if($validator->fails()) {
                $error=$validator->errors()->all();
                Session::flash('error', $error);
                foreach($request->all() as $k=>$value){
                    Session::flash($k, $request->get($k));
                }
                return redirect('/addmenu')
                 ->withErrors($validator)
                 ->withInput();
        }else{
                $menu = new Menu();
                $menu['title'] = $request->get('title');
                if($request->get('parent_id')==''){
                    $menu['parent_id'] = 0;
                }else{
                    $menu['parent_id'] = $request->get('parent_id');
                }
                
                if($menu->save()){
                    Session::flash('message', 'Menu added successfully!');
                   // return Redirect::back()->with('msg', 'Menu added successfully!');
                    return redirect()->route('allmenumanage');
                }
            }
        }
        return view('admin.Menu.addmenu',array('menu'=>$menu,'id'=>$id));
    }



     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('title','id')->all();
        return view('categoryTreeview',compact('categories','allCategories'));
    }




     public function editMenu(Request $request,$id){
        $menuList = Menu::all();
        $menu = Menu::find($id);
        //dd($menu);
        if($request->isMethod('post')) {
            $hiddenId =  $request->get('id');
            $menu = Menu::find($hiddenId);
            $menu['title']      = $request->get('title');
            $menu['parent_id']  = $request->get('menu');
            $menu['status']     = $request->get('status');
            $menu['order_no']   = $request->get('order_no');
            //dd($menu);
            if($menu->save()){
                Session::flash('message', 'Menu updated successfully!');
                if($id){
            
                    return redirect()->route('allmenumanage');    
                }
               // return Redirect::back()->with('msg', 'Menu added successfully!');
                
            }
        }
        return view('admin.Menu.editmenu',array('menu'=>$menu,'menuList'=>$menuList));
    }

    
    public function deleteMenu(Request $request,$id){
        $menu = Menu::find($id);
        if($menu->delete()){
            Session::flash('message', 'Menu deleted successfully!');
            return redirect()->route('allmenumanage');
        }else{
        Session::flash('message', 'Menu not updated !');
            return redirect()->route('allmenumanage');
        }

    }



}
