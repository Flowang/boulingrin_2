<div class="form-group{{ $errors->has('nom') ? ' has-error' : ''}}">
    {!! Form::label('nom', 'Nom: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nom', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('prix_unite') ? ' has-error' : ''}}">
    {!! Form::label('prix_unite', 'Prix à l\'unité: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('prix_unite','null', ['class' => 'form-control']) !!}
        {!! $errors->first('prix_unite', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
        <h5> {{ Form::label('featured_image', 'Choisir une image pour le produit' )}}
              {{ Form::file('featured_image') }}
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('description','', ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group{{ $errors->has('categories') ? ' has-error' : ''}}">
    {!! Form::label('categorie', 'Catégorie: ', ['class' => 'col-md-4 control-label']) !!}
<div class="form-group">
    <div class="col-md-6">
            <select class="form-control" name="categories_id">
                @foreach($categories as $categorie)
                <option value="{{$categorie->id_cat}}">{{$categorie->libelle}}</option>
                @endforeach
            </select>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Crée', ['class' => 'btn btn-primary']) !!}
    </div>
</div>