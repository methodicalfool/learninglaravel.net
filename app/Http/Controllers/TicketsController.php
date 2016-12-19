<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $tickets = Ticket::all();

    return view('tickets.index')->with('tickets', $tickets);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    return view( 'tickets.create' );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function store( TicketFormRequest $request )
  {
    //
    $slug   = uniqid();
    $ticket = new Ticket( [
                            'title'   => $request->get( 'title' ),
                            'content' => $request->get( 'content' ),
                            'slug'    => $slug,
                          ] );

    $ticket->save();

    return redirect( '/contact' )->with( 'status', 'Your ticket has been created! Its unique id is: ' . $slug );
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function show( $id )
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit( $id )
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int                      $id
   *
   * @return \Illuminate\Http\Response
   */
  public function update( Request $request, $id )
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy( $id )
  {
    //
  }
}
