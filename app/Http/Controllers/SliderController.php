<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $All = Slider::orderBy('rank')->get();
        return view('backend.slider.index', compact('All'));
    }

    public function create()
    {
        return view('backend.slider.create');
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'title:tr' => 'required',
        ]);

        $New = Slider::create($request->except('image'));

        if($request->hasFile('image')){
            $New->addMedia($request->image)->toMediaCollection('page');
        }

        toast(SWEETALERT_MESSAGE_CREATE,'success');
        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $Edit = Slider::find($id);
        return view('backend.slider.edit', compact('Edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title:tr' => 'required',
        ]);

        $Update = Slider::find($id);
        $Update->update($request->except('image'));

        if($request->removeImage == "1"){
            $Update->clearMediaCollection('web');
        }

        if($request->hasFile('image')){
            $Update->clearMediaCollection('web');
            $Update->addMedia($request->image)->toMediaCollection('web');
        }

        if($request->removeMobilImage == "1"){
            $Update->clearMediaCollection('mobil');
        }

        if($request->hasFile('imagemobil')){
            $Update->clearMediaCollection('mobil');
            $Update->addMedia($request->imagemobil)->toMediaCollection('mobil');
        }


        toast(SWEETALERT_MESSAGE_UPDATE,'success');
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        $Delete = Slider::find($id);
        $Delete->delete();

        toast(SWEETALERT_MESSAGE_DELETE,'success');
        return redirect()->route('slider.index');
    }

    public function getSwitch(Request $request){
        $update=Slider::findOrFail($request->id);
        $update->status = $request->status == "true" ? 1 : 0 ;
        $update->save();
    }

    public function getOrder(Request $request){
        foreach($request->get('slider') as  $key => $rank ){
            Slider::where('id',$rank)->update(['rank'=>$key]);
        }
    }
}
