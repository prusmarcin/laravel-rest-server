<?php
namespace Restserver\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Restserver\Models\Item;
use Validator;

class ItemsController extends Controller
{
	
	public function available()
    {
        $response = Item::where('amount', '>', 0)->orderBy('id', 'desc')->get();
        return response()->json($response);
    }

    public function availableCondition($amount)
    {
        if (isset($amount)) {
            $response = Item::where('amount', '>', $amount)->orderBy('id', 'desc')->get();
            return response()->json($response);
        }
    }

    public function unavailable()
    {
        $response = Item::where('amount', '=', 0)->orderBy('id', 'desc')->get();
        return response()->json($response);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [
            'error' => true,
            'message' => 'you need to authorization'
        ];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'amount' => 'required|integer'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = '';
            foreach ($errors->all() as $message) {
                $errorMessage .= $message . ' ';
            }

            $response = [
                'error' => true,
                'message' => $errorMessage
            ];

            return response()->json($response, 400);
        } else {
            $item = Item::create([
                    'name' => $request->name,
                    'amount' => $request->amount
            ]);

            return response()->json($item);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        if (isset($item->id)) {
            return response()->json($item);
        } else {
            $response = [
                'error' => true,
                'message' => 'there is no such items to be show'
            ];
            return response()->json($response, 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        if (isset($item->id)) {
            return response()->json($item);
        } else {
            $response = [
                'error' => true,
                'message' => 'there is no such items to be edit'
            ];
            return response()->json($response, 400);
        }
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
        $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'amount' => 'required|integer'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = '';
            foreach ($errors->all() as $message) {
                $errorMessage .= $message . ' ';
            }

            $response = [
                'error' => true,
                'message' => $errorMessage
            ];

            return response()->json($response, 400);
        } else {

            $item = Item::where('id', '=', $id)->get();

            if ($item->isEmpty()) {
                $response = [
                    'error' => true,
                    'message' => 'Record not found'
                ];
                return response($response, 400);
            } else {
                $item = Item::find($id)->update([
                    'name' => $request->name,
                    'amount' => $request->amount
                ]);

                $response = [
                    'message' => 'Items updated.',
                    'updated' => $item
                ];
                return response()->json($response);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Item::destroy($id);
        if ($deleted == 0) {
            $response = [
                'error' => true,
                'message' => 'there is no such items to be removed'
            ];
            return response()
                    ->json($response, 400);
        } else {
            $response = [
                'message' => 'Items deleted.',
                'deleted' => $deleted
            ];
            return response()->json($response);
        }
    }

    
}
