@extends('master')
@section('title', 'View all tickets')
@section('content')

  <div class="container col-md-8 col-md-offset-2" >
    <div class="panel panel-default" >
      <div class="panel-heading" >
        <h2 > Tickets </h2 >
      </div >

      @if (session('status'))
        <div class="alert alert-success" >
          {{ session('status') }}
        </div >
      @endif

      @if ($tickets->isEmpty())
        <p > There is no ticket.</p >
      @else
        <table class="table" >
          <thead >
          <tr >
            <th >ID</th >
            <th >Title</th >
            <th >Status</th >
            <th >&nbsp;</th >
          </tr >
          </thead >
          <tbody >
          @foreach($tickets as $ticket)
            <tr >
              <td >{!! $ticket->id !!}</td >
              <td >
                <a href="{!! action('TicketsController@edit', $ticket->slug) !!}" >{!! $ticket->title !!} </a >
              </td >
              <td >{!! $ticket->status ? 'Pending' : 'Answered' !!}</td >
              <td >
                <a href="{!! action('TicketsController@edit', $ticket->slug) !!}"
                   class="btn btn-info pull-left" >Edit</a >

                <form method="post"
                      action="{!! action('TicketsController@destroy', $ticket->slug) !!}"
                      class="pull-left" >
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
                  <div >
                    <button type="submit" class="btn btn-warning" >Delete</button >
                  </div >
                </form >
              </td >
            </tr >
          @endforeach
          </tbody >
        </table >
      @endif
    </div >
  </div >

@endsection
