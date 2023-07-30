@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Accounts') }}
                </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <td>Account</td>
                                <th>Type</th>
                                <th>Currency</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->account}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->currency}}</td>
                                    <td>{{$item->count}}</td>
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
