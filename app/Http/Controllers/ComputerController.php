<?php 
namespace App\Http\Controllers;  

use App\Models\Shelf;
use App\Models\Unity;
use App\Models\Computer;
use App\Models\Container;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreComputerRequest;
use App\Http\Requests\Admin\UpdateComputerRequest;

class ComputerController extends Controller
{ 
    function __construct()
    {
        $this->middleware('can:computer list', ['only' => ['index', 'show']]);
        $this->middleware('can:computer create', ['only' => ['create', 'store']]);
        $this->middleware('can:computer edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:computer delete', ['only' => ['destroy']]);
    }

    public function index(Manufacturer $manufacturers)
    {
        $computers = (new Computer)->newQuery();

        if (request()->has('search')) {
            $computers->where('model', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $computers->orderBy($attribute, $sort_order);
        } else {
            $computers->latest();
        }

        $computers = $computers->paginate(5);

        return view('items.computer.index', compact('computers', 'manufacturers'));
    }   
    
    public function create(Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        $position = ['Shelf', 'Container'];
        return view('items.computer.create', compact('position', 'manufacturers', 'containers', 'shelves'));
    }
   
    public function store(StoreComputerRequest $request)
    {
        $input = $request->all();

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        } 

        Computer::create($input);
    
        return redirect()->route('computer.index')
                        ->with('message', 'Computer created successfully.');
    }   

    public function show(Computer $computer, Shelf $shelf, Container $container, Unity $unities)
    {
        return view('items.computer.show',compact('computer', 'container', 'shelf', 'unities'));
    }

    public function edit(Computer $computer, Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        return view('items.computer.edit',compact('computer', 'manufacturers', 'containers', 'shelves'));
    }  

    public function update(Request $request, Computer $computer)
    {
        $request->validate([
            'bool_position'=> 'required',
            'position_id'=> 'required',
            'manufacturer_id'=> 'required',
            'inventory_number' => 'required',
            'serial_number'=> 'required',
            'model' => 'required',
            'submodel' => 'required',
            'processor' => 'required',
            'speed' => 'required',
            'year' => 'required',
            'bit' => 'required',
            'description' => 'nullable'
        ]);
        $input = $request->all();  

         if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        }else{
            unset($input['image']);
        } 

        $computer->update($input);

        return redirect()->route('computer.index')
                        ->with('message', 'Computer updated successfully.');
    }   

    public function destroy(Computer $computer)
    {
        $computer->delete();
        return redirect()->route('computer.index')
                        ->with('message', __('Computer deleted successfully'));
    }
}