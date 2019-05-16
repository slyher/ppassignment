<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class DistrictController extends Controller
{
    private $model;
    /**
     * @var array
     */
    private $rules;

    /**
     * DistrictController constructor.
     * @param $model
     */
    public function __construct(District $model)
    {
        $this->model = $model;
        $this->rules = array(
            'name' => 'required',
            'town_name' => 'required',
            'population' => 'required|numeric',
            'surface' => 'required',
        );
    }

    public function list(Request $request)
    {
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');
        $search = $request->get('search');
        $allDistricts = $this->model->getAllFiltered($sort, $direction, $search);
        return View::make("district.list")->with(
            [
                'districts' => $allDistricts,
                'sort' => $sort,
                'direction' => $direction,
                'search' => $search,
            ]);
    }

    public function edit($id)
    {
        $district = $this->model->where('id', $id)->get()->first();//@todo move to model
        return View::make('district.edit')
            ->with('district', $district);
    }

    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/')->with('msg', 'District Failed to update');
        }
        $this->model->where('id', $id)->get()->first()->fill(Input::all())->save();//@todo move to model
        return redirect('/')->with('msg', 'District updated');
    }

    public function create()
    {
        return View::make('district.new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/')->with('msg', 'District Failed to update');
        }
        $this->model->fill(Input::all())->save();//@todo move to model
        return redirect('/')->with('msg', 'District Created');
    }

    public function delete($id)
    {
        $this->model->remove($id);
        return redirect('/')->with('msg', 'District deleted');
    }
}
