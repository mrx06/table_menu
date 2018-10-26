<?php

namespace App\Http\Controllers;

use App\Model\User as Model;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limitOptions = [10, 30, 50];
        $orderByOPtions = ['name', 'email'];
        $sortOrderOPtions = ['asc', 'dsc'];
        $limit = 10;
        $orderBy = 'name';
        $sortOrder = 'asc';
        $search = null;
        $models = Model::query();
        if ($request->has('limit')) {
            $limit = $request->input('limit');
        }
        if ($request->has('search')) {
            $search = $request->input('search');
            $models = $models->where('name', 'like', '%'.$search.'%');
        }
        if ($request->has('orderBy')) {
            if ($orderBy != $request->get('orderBy')) {
                $orderBy = $request->get('orderBy');
            }
        }
        if ($request->has('sortOrder')) {
            if ($sortOrder != $request->get('sortOrder')) {
                $sortOrder = $request->get('sortOrder');
            }
        }
        $models = $models->orderBy($orderBy, $sortOrder)->paginate($limit);
        return view('home', compact('models', 'limitOptions', 'limit', 'search', 'orderByOPtions', 'sortOrderOPtions', 'orderBy', 'sortOrder'));
    }
}
