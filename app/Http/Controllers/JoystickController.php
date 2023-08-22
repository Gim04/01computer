<?php 
namespace App\Http\Controllers;  

use App\Models\Shelf;
use App\Models\Joystick;
use App\Models\Container;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJoystickRequest;
use App\Http\Requests\Admin\UpdateJoystickRequest;

class JoystickController extends Controller
{ 
    function __construct()
    {
        $this->middleware('can:joystick list', ['only' => ['index', 'show']]);
        $this->middleware('can:joystick create', ['only' => ['create', 'store']]);
        $this->middleware('can:joystick edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:joystick delete', ['only' => ['destroy']]);
    }

    public function index(Manufacturer $manufacturers)
    {
        $joysticks = (new Joystick)->newQuery();

        if (request()->has('search')) {
            $joysticks->where('model', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $joysticks->orderBy($attribute, $sort_order);
        } else {
            $joysticks->latest();
        }

        $joysticks = $joysticks->paginate(5);

        return view('items.joystick.index', compact('joysticks', 'manufacturers'));
    }   
    
    public function create(Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        $position = ['Shelf', 'Container'];
        return view('items.joystick.create', compact('position', 'manufacturers', 'containers', 'shelves'));
    }
   
    public function store(StoreJoystickRequest $request)
    {
        $input = $request->all();

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        } 

        Joystick::create($input);
    
        return redirect()->route('joystick.index')
                        ->with('message', 'Joystick created successfully.');
    }   

    public function show(Joystick $joystick)
    {
        return view('items.joystick.show',compact('joystick'));
    }

    public function edit(Joystick $joystick, Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        return view('items.joystick.edit',compact('joystick', 'manufacturers', 'containers', 'shelves'));
    }  

    public function update(UpdateJoystickRequest $request, Joystick $joystick)
    {

        $input = $request->all();  

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        }else{
            unset($input['image']);
        } 

        $joystick->update($input);

        return redirect()->route('joystick.index')
                        ->with('message', 'Joystick updated successfully.');
    }   

    public function destroy(Joystick $joystick)
    {
        $joystick->delete();
        return redirect()->route('joystick.index')
                        ->with('message', __('Joystick deleted successfully'));
    }
}