<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    const ALL_PRODUCTS = 0;
    const AVAILABLE_PRODUCTS = 1;
    const NOT_AVAILABLE_PRODUCTS = 2;
    const PRODUCTS_MORE_THAN_5 = 3;

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filtered(Request $request)
    {
        $filter = isset($request->filter) ? $request->filter : null;

        $query = Item::query();

        switch($filter) {
            case self::AVAILABLE_PRODUCTS:
                $query->where('amount', '>', 0);
                break;
            case self::NOT_AVAILABLE_PRODUCTS:
                $query->where('amount', '=', 0);
                break;
            case self::PRODUCTS_MORE_THAN_5:
                $query->where('amount', '>', 5);
                break;
        }
        $items = $query->get();

        return response()->json([
                'items' => $items,
                'filter' => $filter
            ]
        );
    }

    /**
     *
     */
    public function create()
    {
       //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|integer'
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->amount = $request->amount;
        $item->save();

        return response('Ok', 200);
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $item = Item::where('id', $id)
            ->first();

        return response()->json([
            'item' => $item
        ]);
    }

    /**
     * @param Request $request
     * @param Item $item
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|integer'
        ]);

        $item->name = $request->name;
        $item->amount = $request->amount;
        $item->save();

        return response('Ok', 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);

        return response('Ok', 200);
    }
}
