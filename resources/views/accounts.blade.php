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
                                <th>Name</th>
                                <th>Currency</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{$account->name}}</td>
                                    <td>{{$account->currency}}</td>
                                    <td>{{$account->count}}</td>
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
