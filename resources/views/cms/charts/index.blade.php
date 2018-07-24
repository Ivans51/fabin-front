@extends('layouts.app')

@section('content')
    <div id="page-wrapper">
        <div id="page-inner">
            <h1>Gráficos</h1>
            <div class="row">
                <div>{!! $chart->container() !!}</div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Chart.min.js') }}" charset="utf-8"></script>
     {!! $chart->script() !!}
@endsection