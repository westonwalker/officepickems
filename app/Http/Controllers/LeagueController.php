<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
use App\Models\LeagueType;
use Illuminate\Support\Facades\Auth;

class LeagueController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leagueTypes = LeagueType::all();
        return view('leagues.create', ['leagueTypes' => $leagueTypes]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'league_types' => 'required|not_in:0',
         ]);

         $league = new League(request(['name']));
         $league->company_id = Auth::user()->company_id;
         $league->league_type_id = request('league_types');
         $league->start_date = date('Y-m-d', strtotime('6/15/2021'));
         $league->end_date = date('Y-m-d', strtotime('10/15/2021'));
         $league->number_of_weeks = 16;
         $league->current_week = 1;
         $league->year = 2021;
         $league->save();
        
         // create pivot table record
         $league->users()->attach(Auth::user()->id);

         Auth::user()->last_league_id = $league->id;
         Auth::user()->save();

        return redirect('dashboard')->with('success', 'League Created!');
    }
}