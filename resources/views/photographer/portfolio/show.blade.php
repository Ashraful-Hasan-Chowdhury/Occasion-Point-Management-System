@extends('photographer.layouts.app')
@section('portfolioactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background: #9400D3;">

        <h1 class="page-title" style="color:white;">Photogapher's Portfolio</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('photographer.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('photographer.portfolio') }}"
                    style="color:white;">Portfolio</a></li>
        </ol>
    </div>


    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">

                </div>
                <h3 class="panel-title">Portfolio List
                    <a href="{{ route('photographer.portfolio.add') }}"
                        class="btn btn-md-block btn-success offset-4 text-light" style="font-weight: bold;">+ Add
                        Portfolio</a>
                </h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($portfolios as $portfolio)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                {{$portfolio->title}}
                            </td>
                            <td>{{$portfolio->created_at->diffForHumans()}}</td>
                            <td>

                                <a href="{{ route('photographer.portfolio.edit', ['id'=>$portfolio->id]) }}"
                                    class="btn btn-md  btn-info"><i class="icon wb-pencil" aria-hidden="true"></i></a>

                                <a href="{{ route('photographer.portfolio.destroy', ['id'=>$portfolio->id]) }}"
                                    class="btn btn-md  btn-danger" id="delete"><i class="icon wb-trash"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection