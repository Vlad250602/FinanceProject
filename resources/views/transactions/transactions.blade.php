@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Transactions') }}
                </div>
                <div class="card-body">
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
                                <tr style="background-color: @if($item->type == 'income') #e7ffde @else #ffdede @endif">
                                    <td style="background: 0">{{$item->id}}</td>
                                    <td style="background: 0">{{$item->account}}</td>
                                    <td style="background: 0">{{$item->type}}</td>
                                    <td style="background: 0">{{$item->currency}}</td>
                                    <td style="background: 0">{{$item->count}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-inline-block">
                        <a href="{{route('transaction-create-income')}}">
                            <button type="button" class="btn btn-primary">
                                Deposit
                            </button>
                        </a>
                    </div>
                    <div class="d-inline-block" style="margin-left: 5px">
                        <div>
                        <a href="{{route('transaction-create-expense')}}">
                            <button type="button" class="btn btn-primary">
                                Windraw
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
