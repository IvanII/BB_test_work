@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if ( $errors->count() > 0 )
                    @foreach( $errors->all() as $message )
                        <div>{{ $message }}</div>
                    @endforeach
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <form method="post" action="{{route('coupons.obtain')}}">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="PUT">
                                            <input name="user_id" type="hidden" value="{{ $user->id }}">
                                            <button class="btn btn-success" type="submit">obtain coupon</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Free coupons pool</div>

                    <div class="panel-body">
                        <ul>
                            @foreach($coupons as $coupon)
                                <li>Coupon: {{ $coupon->id }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form method="post" action="{{route('coupons.release')}}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <button class="btn btn-primary" type="submit">Release all coupons</button>
            </form>
        </div>
    </div>
@endsection