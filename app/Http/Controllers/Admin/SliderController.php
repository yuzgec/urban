<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('rank')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tr.title' => 'required',
            'en.title' => 'required',
        ]);

        $slider = Slider::create([
            'status' => $request->status ? 1 : 0,
            'rank' => $request->rank
        ]);

        foreach (['tr', 'en'] as $locale) {
            $slider->translateOrNew($locale)->title = $request->$locale['title'];
            $slider->translateOrNew($locale)->text1 = $request->$locale['text1'];
            $slider->translateOrNew($locale)->text2 = $request->$locale['text2'];
            $slider->translateOrNew($locale)->text3 = $request->$locale['text3'];
            $slider->translateOrNew($locale)->link = $request->$locale['link'];
            $slider->translateOrNew($locale)->link_text = $request->$locale['link_text'];
        }

        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider başarıyla oluşturuldu.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'tr.title' => 'required',
            'en.title' => 'required',
        ]);

        $slider->update([
            'status' => $request->status ? 1 : 0,
            'rank' => $request->rank
        ]);

        foreach (['tr', 'en'] as $locale) {
            $slider->translateOrNew($locale)->title = $request->$locale['title'];
            $slider->translateOrNew($locale)->text1 = $request->$locale['text1'];
            $slider->translateOrNew($locale)->text2 = $request->$locale['text2'];
            $slider->translateOrNew($locale)->text3 = $request->$locale['text3'];
            $slider->translateOrNew($locale)->link = $request->$locale['link'];
            $slider->translateOrNew($locale)->link_text = $request->$locale['link_text'];
        }

        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider başarıyla güncellendi.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider başarıyla silindi.');
    }
} 