@extends('layouts.app')

@section('content')

     <loading v-if="$root.loading"></loading>
     <router-view></router-view>

@endsection
@section('script')
    @if (Auth::check())
        <script>
            window.Authentication = {!!json_encode([
                'isLoggedin' => true,
                'user'       => Auth::user(),
                'admin'      => Auth::user()->isAdmin(),
            ])!!}
        </script>
    @else
        <script>
            window.Authentication = {!!json_encode([
                'isLoggedin' => false,
            ])!!}
        </script>
    @endif
@endsection
