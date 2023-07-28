@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account create') }}</div>
                    <form method="post">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name">
                        <br><br>
                        <label for="currency">Currency</label>
                        <select name="currency" id="currency">
                            <option value="UAH">UAH</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                        <br><br>
                        <label for="count">Count</label>
                        <input type="text" id="count" name="count" value="0">
                        <br><br>
                        <input type="submit">
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
