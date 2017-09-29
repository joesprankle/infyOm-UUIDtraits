<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::label('orgType', 'Type:') !!}
    {!! Form::select('orgType', array('school' => 'School', 'club' => 'Club'), ['class' => 'form-control']) !!}
    {!! Form::label('orgSubType', 'Type:') !!}
    {!! Form::select('orgSubType', array('school' => 'School', 'club' => 'Club'), ['class' => 'form-control']) !!}
    {!! Form::label('color1', 'Color 1:') !!}
    {!! Form::select('color1', array('blue' => 'Blue', 'red' => 'Red', 'green' => 'Green'), ['class' => 'form-control']) !!}
    {!! Form::label('color2', 'Color 2:') !!}
    {!! Form::select('color2', array('blue' => 'Blue', 'red' => 'Red', 'green' => 'Green'), ['class' => 'form-control']) !!}
    {!! Form::label('color3', 'Color 3:') !!}
    {!! Form::select('color3', array('blue' => 'Blue', 'red' => 'Red', 'green' => 'Green'), ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('organizations.index') !!}" class="btn btn-default">Cancel</a>
</div>
