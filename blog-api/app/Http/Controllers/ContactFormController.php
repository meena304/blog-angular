<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use phpDocumentor\Reflection\Types\Null_;

class ContactFormController extends Controller
{
    public function contactinsert(Request $a) {

        $data = new ContactForm;

        $data->name = $a->name;
        $data->email = $a->email;
        $data->phone_num = $a->phone_num;
        $data->msg = $a->msg;
        $data->save();

        if($data!=Null)
        {
            return response()->json($data= [
                'status'=>200,
                'msg'=>'succes',
                'api'=> $data
            ]);
        }
        else{
            return response()->json($data= [
                'status'=>400,
                'msg'=>'Data Not Found'
            ]);
        }


    }

    public function display() {

        $data = ContactForm::all();


        if($data!=Null)
        {
            return response()->json($data= [
                'status'=>200,
                'msg'=>'succes',
                'api'=> $data
            ]);
        }
        else{
            return response()->json($data= [
                'status'=>400,
                'msg'=>'Data Not Found'
            ]);
        }


    }

    public function view($id) {

        $data = ContactForm::find($id);


        if($data!=Null)
        {
            return response()->json($data= [
                'status'=>200,
                'msg'=>'succes',
                'api'=> $data
            ]);
        }
        else{
            return response()->json($data= [
                'status'=>400,
                'msg'=>'Data Not Found'
            ]);
        }


    }
}
