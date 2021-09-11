<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;


class BlogController extends Controller
{
    public function blogInsert(Request $a)
    {

        $data = new Blog;

        $data->tittle = $a->tittle;
        $data->author_name = $a->author_name;
        $data->short_discription = $a->short_discription;
    	$image = $a->file('image');
    	$filename = 'image'.time().'.'.$a->image->extension();
    	$image->move('upload/',$filename);
    	$data->image = $filename;
    	$data->save();

        if ($data != Null)
        {
            return response()->json($data = [
                'status'=> 200,
                'msg'=>'Success',
                'api'=> $data
            ]);

        }
        else {

            return response()->json($data = [
                'status'=> 400,
                'msg'=>'Data Not Found'
            ]);

        }



    }

    public function blogList()
    {
        $data = Blog::all();
        if ($data != Null)
        {
            return response()->json($data = [
                'status'=> 200,
                'msg'=>'Success',
                'api'=> $data
            ]);

        }
        else {

            return response()->json($data = [
                'status'=> 400,
                'msg'=>'Data Not Found'
            ]);

        }
    }

    public function blogDetail($id)
    {
        $data = Blog::find($id);

        if ($data != Null)
        {
            return response()->json($data = [
                'status'=> 200,
                'msg'=>'Success',
                'api'=> $data
            ]);

        }
        else {

            return response()->json($data = [
                'status'=> 400,
                'msg'=>'Data Not Found'
            ]);

        }

    }

    public function delete($id)
    {
        $data = Blog::find($id);
        $delete = $data->delete();
        if ($delete != Null)
        {
            return response()->json($data = [
                'status'=> 200,
                'msg'=>'Success',
                'api'=> $delete
            ]);

        }
        else {

            return response()->json($data = [
                'status'=> 400,
                'msg'=>'Data Not Found'
            ]);

        }
    }

    public function categoryInsert(Request $a)
    {

        $data = new Category();

        $data->category_name = $a->category_name;
    	$image = $a->file('image');
    	$filename = 'image'.time().'.'.$a->image->extension();
    	$image->move('upload/',$filename);
    	$data->image = $filename;
    	$data->save();

        if ($data != Null)
        {
            return response()->json($data = [
                'status'=> 200,
                'msg'=>'Success',
                'api'=> $data
            ]);

        }
        else {

            return response()->json($data = [
                'status'=> 400,
                'msg'=>'Data Not Found'
            ]);

        }



    }

    public function categoryList()
    {
        $data = Category::all();
        if ($data != Null)
        {
            return response()->json($data = [
                'status'=> 200,
                'msg'=>'Success',
                'api'=> $data
            ]);

        }
        else {

            return response()->json($data = [
                'status'=> 400,
                'msg'=>'Data Not Found'
            ]);

        }
    }
}
