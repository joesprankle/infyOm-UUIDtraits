@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Organization
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($organization, ['route' => ['organizations.update', $organization->id], 'method' => 'patch']) !!}

                   <div class="form-group col-sm-6">
                       {!! Form::label('name', 'Name:') !!}
                       {!! Form::text('name', null, ['class' => 'form-control']) !!}
                       {!! Form::label('orgType', 'Type:') !!}
                       {!! Form::select('orgType', array('school' => 'School', 'club' => 'Club'), $type->name, ['class' => 'form-control']) !!}
                       {!! Form::label('orgSubType', 'Sub Type:') !!}
                       {!! Form::select('orgSubType', array('Baseball' => 'Baseball', 'Football' => 'Football'), $subType->name, ['class' => 'form-control']) !!}
                       {!! Form::label('color1', 'Color 1:') !!}
                       {!! Form::select('color1', array('blue' => 'Blue', 'red' => 'Red', 'green' => 'Green'), $color1->name, ['class' => 'form-control']) !!}
                       {!! Form::label('color2', 'Color 2:') !!}
                       {!! Form::select('color2', array('blue' => 'Blue', 'red' => 'Red', 'green' => 'Green'), $color2->name, ['class' => 'form-control']) !!}
                       {!! Form::label('color3', 'Color 3:') !!}
                       {!! Form::select('color3', array('blue' => 'Blue', 'red' => 'Red', 'green' => 'Green'), $color3->name, ['class' => 'form-control']) !!}
                   </div>
                   <!-- Submit Field -->
                   <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('organizations.index') !!}" class="btn btn-default">Cancel</a>
                   </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection