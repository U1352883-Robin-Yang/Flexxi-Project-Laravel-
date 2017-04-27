<?php

namespace App\Http\Controllers;
use Auth;
use App\Diaries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DiaryController extends Controller
{
    public function updateDiary(Request $request, Diaries $diaries){

        $diaries->update($request->all());
        Session::flash('diarySuccess', 'A New Diary Entry Has Been Saved');
        return redirect('/home');
    }

    public function showDiary(){

        $user = Auth::user()->id;

        $diary = Diaries::where('user_id', '=', $user)->get();

        return view('page.dashboard', compact('diary', $diary));
    }
}
