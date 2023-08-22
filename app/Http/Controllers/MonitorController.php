<?php 
namespace App\Http\Controllers;  

use App\Models\Shelf;
use App\Models\Monitor;
use App\Models\Container;
use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMonitorRequest;
use App\Http\Requests\Admin\UpdateMonitorRequest;

class MonitorController extends Controller
{ 
    function __construct()
    {
        $this->middleware('can:monitor list', ['only' => ['index', 'show']]);
        $this->middleware('can:monitor create', ['only' => ['create', 'store']]);
        $this->middleware('can:monitor edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:monitor delete', ['only' => ['destroy']]);
    }

    public function index(Manufacturer $manufacturers)
    {
        $monitors = (new Monitor)->newQuery();

        if (request()->has('search')) {
            $monitors->where('model', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $monitors->orderBy($attribute, $sort_order);
        } else {
            $monitors->latest();
        }

        $monitors = $monitors->paginate(5);

        return view('items.monitor.index', compact('monitors', 'manufacturers'));
    }   
    
    public function create(Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        $position = ['Shelf', 'Container'];
        return view('items.monitor.create', compact('position', 'manufacturers', 'containers', 'shelves'));
    }
   
    public function store(StoreMonitorRequest $request)
    {

        $input = $request->all();

        if ($icon = $request->file('icon')) {
            $destinationPath = 'photo/';
            $productImage = date('YmdHis') . "." . $icon->getClientOriginalExtension();
            $icon->move($destinationPath, $productImage);
            $input['icon'] = "photo/$productImage";
        } 

        Monitor::create($input);
    
        return redirect()->route('monitor.index')
                        ->with('message', 'Monitor created successfully.');
    }   

    public function show(Monitor $monitor)
    {
        return view('items.monitor.show',compact('monitor'));
    }

    public function edit(Monitor $monitor, Manufacturer $manufacturers, Container $containers, Shelf $shelves)
    {
        return view('items.monitor.edit',compact('monitor', 'manufacturers', 'containers', 'shelves'));
    }  

    public function update(UpdateMonitorRequest $request, Monitor $monitor)
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

        $monitor->update($input);

        return redirect()->route('monitor.index')
                        ->with('message', 'Monitor updated successfully.');
    }   

    public function destroy(Monitor $monitor)
    {
        $monitor->delete();
        return redirect()->route('monitor.index')
                        ->with('message', __('Monitor deleted successfully'));
    }
}