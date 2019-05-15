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
     * DistrictController constructor.
     * @param $model
     */
    public function __construct(District $model)
    {
        $this->model = $model;
    }

    public function list(Request $request)
    {
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');
        $allDistricts = $this->model->getAll($sort, $direction);
        return View::make("list")->with(array('districts' => $allDistricts, 'sort' => $sort, 'direction' => $direction));
    }

    public function edit($id)
    {
        $district = $this->model->where('id',$id)->get()->first();//@todo move to model
        return View::make('edit')
            ->with('district', $district);
    }

    public function update($id)
    {
        $rules = array(
            'name'       => 'required',
            'town_name'  => 'required',
            'population' => 'required|numeric',
            'surface'    => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('/')->with('msg', 'District Failed to update');
        }
        $this->model->where('id', $id)->get()->first()->fill(Input::all())->save();//@todo move to model
        return redirect('/')->with('msg', 'District updated');
    }

    public function create(Request $request)
    {

    }

    public function delete($id)
    {
        $this->model->remove($id);
        return redirect('/')->with('msg', 'District deleted');
    }
}
