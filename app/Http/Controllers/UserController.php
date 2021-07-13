<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Validator;





class UserController extends Controller
{
  


    public function showAlluser()
    {
            $showusers=User::all();

            return response()->json($showusers);
       
    }

    public function showOneuser($id)
    {
                $user=User::find($id);
            
                return response()->json($user);
    }

    public function create(Request $request)
    {
            $validator = Validator::make($request->all(),
                            [  'name' => 'required|string|max:255',
                            'phone_number' => 'required|max:10|min:10',
                            'email' => 'required|email|max:255',
                            'password' => 'required|string|min:6'
                            ]
                    );
                    $response['status'] = 1;
                if ($validator->fails()) {
                                        $response['status'] = 0;
                                        $response['errors'] = $validator->errors();
                                        return response()->json($response);
                             }
        
else{

        $User = User::create($request->all()); 
        $response['UserInsert'] = $User;
        $response['Success'] = 'User Added successfully!!!';
        return response()->json($response, 201);
}

    }

    public function update($id, Request $request)
    {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                        'phone_number' => 'required|max:10|min:10',
                        'email' => 'required|email|max:255',
                        'password' => 'required|string|min:6'
            ]);

            $User = User::findOrFail($id);
            $User->update($request->all());
            return response()->json($User, 200);
       
    }

    public function delete($id)
    {
            User::findOrFail($id)->delete();
            return response('Deleted Successfully', 200);
    }


    
}
