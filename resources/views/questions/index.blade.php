@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2> All questions</h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-primary">Ask Question</a>
                        </div><!-- /.ml-auto -->
                    </div>
                    <!-- /.d-flex align-items-center -->
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8 col-xl-9 py-50">
                @if (! $questions->count())
                    <div class="alert alert-danger">
                        <strong>No record found</strong>
                    </div>
                @else
                <div class="row gap-y">
                    <div class="col-md-12">
                        @foreach($questions as $question)
                            <div class="card card-hover-shadow">
                                <div class="card mb-30">
                                    <div class="row align-items-center h-full">
                                        <div class="col-12 col-md-3">
                                            <div class="d-flex flex-column counters">
                                                <div class="vote">
                                                    <strong> {{$question->votes_count}}  </strong>
                                                    {{str_plural('vote',$question->votes_count)}}
                                                </div>
                                                <!-- /.vote -->
                                                <div class="status {{$question->status}} ">
                                                    <strong> {{$question->answers_count}}  </strong>
                                                    {{str_plural('answer',$question->answers_count)}}
                                                </div>
                                                <!-- /.status -->
                                                <div class="view">
                                                    {{$question->views ." ". str_plural('view',$question->views)}}

                                                </div>
                                                <!-- /.view -->
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="card-block">
                                                <h4 class="card-title"><a href="{{$question->url}}"> {{$question->title}}</a></h4>
                                                <p class="card-text">
                                                    {{$question->excerpt}}
                                                </p>
                                                <p class="card-text">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['questions.destroy', $question->id, 'class' =>'form-delete']]) !!}
                                                    @csrf
                                                    @can('update',$question)
                                                        <a href="{{route('questions.edit', $question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                                    @endcan
                                                    @can('delete',$question)
                                                        <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </button>
                                                    @endif
                                                    {!! Form::close() !!}
                                                </p>
                                                <p class="card-text">
                                                    Asked by <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                                    <small class="text-muted">{{$question->created_date}}</small>
                                                </p>
                                                <a class="fw-600 fs-12" href="{{$question->url}}">Read more <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                        @endforeach

                    </div>


                </div>
                @endif
                {{ $questions->links()}}
            </div>



            <div class="col-md-4 col-xl-3 hidden-sm-down">
                <div class="sidebar">

                    @include('layouts.sidebar')

                </div>
            </div>

        </div>
    </div>
@endsection
