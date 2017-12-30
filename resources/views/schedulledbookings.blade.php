@extends('layouts.master')
@section('title', 'Group Room Maffia')
@section('header')
@endsection
@section('content')
<div class="row mb-2 ">
    <div class="col-sm-4 mr-auto">
      <h1>Schedulled Bookings</h1>
    </div>
</div>
<div class="table">
<table class="table table-bordered table-striped table-hover table-fixed">
    <thead>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Room</th>
            <th>Booker</th>
            <th>Message</th>
            <th>Result</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
@if(empty($bookings))
             <tr><td>No schedulled bookings</td><td></td><td></td><td></td><td></td><td></td></tr>
@else
  @foreach ($bookings as $booking)
    <tr>
      <td>{{ $booking->date }}</td>
      <td>{{ $booking->time }}</td>
      <td>{{ $booking->room }}</td>
      <td>{{ $booking->booker }}</td>
      <td>{{ $booking->message }}</td>
      <td>{{ $booking->result }}</td>
      <td>
        <a href="{{ action('SchedulledBookingsController@delete', $booking->id) }}">
          <button type="button" class="btn btn-danger btn-sm" title="Delete">
            <span class="fa fa-trash" aria-hidden="true"/>
          </button>
        </a>
      </td>
    </tr>
  @endforeach
@endif
    </tbody>
</table>
</div>
@endsection
