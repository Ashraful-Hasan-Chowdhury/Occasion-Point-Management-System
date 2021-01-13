@extends('photographer.layouts.app')
@section('reviewactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background: #9400D3;">

        <h1 class="page-title" style="color:white;">Photographer Reviews</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('photographer.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('photographer.reviews') }}" style="color:white;">Review List
                </a>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="panel">
            <header class="panel-heading">

                <div class="panel-actions">

                </div>
                <h3 class="panel-title">User Reviews</h3>
            </header>
            <div class="panel-body">
                <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable"
                    style="font-weight: 500;">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Review</th>
                            <th>Review Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reviews as $review)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                {{$review->users[0]->name}}
                            </td>
                            <td>
                                {{$review->body}}
                            </td>
                            <td>{{date('d-m-Y l h:m a', strtotime($review->created_at))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection