@csrf
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose category']) !!}

    @if($errors->has('category_id'))
        <span class="help-block">{{ $errors->first('category_id') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('title','Qestion Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control','id' => 'question-title',]) !!}

    @if($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>
<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    {!! Form::label('body','Explain your Question') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control','rows' => 5, 'cols' =>5]) !!}
    @if($errors->has('body'))
        <span class="help-block">{{ $errors->first('body') }}</span>
    @endif
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-outline-primary">{{ $question->exists ? 'Update' : 'Ask Question' }}</button>
    <a href="{{ route('questions.index') }}" class="btn btn-outline-danger">Cancel</a>
</div>