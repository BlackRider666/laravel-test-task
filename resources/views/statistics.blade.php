@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <form action="{{route('statistics')}}" method="GET">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="date">Date</span>
                                </div>
                                <input type="date" name="date" value="{{$date}}"  class="form-control" aria-label="Date" aria-describedby="date">
                            </div>
                            <input type="submit" value="Search" class="btn btn-success">
                        </form>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Amount of Purchases</th>
                                <th scope="col">Total views</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($statistics as $stat)
                                <tr>
                                    <th scope="row">{{$stat->id}}</th>
                                    <td>{{$stat->title}}</td>
                                    <td>{{$stat->amount_of_purchases}}</td>
                                    <td>{{$stat->total_views}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
