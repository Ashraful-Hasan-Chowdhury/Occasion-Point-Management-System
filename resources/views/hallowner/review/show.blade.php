@extends('hallowner.layouts.app')
@section('reviewactive','active')
@section('content')
<div class="page">
    <div class="page-header page-header-bordered" style="background: #007bff;">

        <h1 class="page-title" style="color:white;">Hall Reviews</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('hallowner.profile') }}" style="color:white;">Profile</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('hallowner.reviews') }}" style="color:white;">Review List
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
                            <th>Hall Name</th>
                            <th>Hall Address</th>
                            <th>Review</th>
                            <th>Review Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $i=0;
                        @endphp
                        @foreach ($halls as $hall)
                        @foreach ($hall->reviews as $review)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>
                                {{$review->users[0]->name}}
                            </td>
                            <td>
                                {{$hall->name}}
                            </td>
                            <td>
                                {!!htmlspecialchars_decode($hall->address)!!}
                            </td>
                            <td>
                                {{$review->body}}
                            </td>
                            <td>{{date('d-m-Y l h:m a', strtotime($review->created_at))}}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection