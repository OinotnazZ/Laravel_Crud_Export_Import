<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Sérgio Solution
     * public function index(Request $request)
    {
        $players = ($request->search) ?
            Player::where('name', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(10); :
            Player::orderBy('id', 'desc')->paginate(10);

            return view('pages.players.index', ['players' => $players]);
    }
    */

    public function index(Request $request)
    {
        if($request->search) {
            $players = Player::where('name', 'LIKE', '%' . $request->search . '%')->orderBy('id', 'desc')->paginate(10);
        }else{
            $players = Player::orderBy('id', 'desc')->paginate(10);
        }
        return view('pages.players.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'address'     => 'required',
            'description' => 'required',
            'retired'     => 'required|boolean'
        ]);

        /*Player::create($request->all());*/

        /* Example 2
        $input = $request->all();
        Player::create($input);
        */

        /* Example 3 */
        Player::create([
        'name'         => $request->name,
        'address'      => $request->address,
        'description'  => $request->description,
        'retired'      => $request->retired
        ]);


        /* Example 4
         $player               = new Player();
         $player->name         = $request->name;
         $player->address      = $request->address;
         $player->description  = $request->description;
         $player->retired      = $request->retired;
         $player->save();
         */

        return redirect('players')->with('status','Player created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('pages.players.show', ['player' => $player]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('pages.players.edit', ['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->update($request->all());
        return redirect('players')->with('status','Player edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect('players')->with('status','Player deleted successfully!');
    }

    public function truncate()
    {
        Player::truncate();

        return redirect('players')->with('status','Kabommm successfully!');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'players.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, request()->file('file'));

        return redirect('/players')->with('success', 'All good!');
    }
}
