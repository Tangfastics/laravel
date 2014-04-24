<div class="form-group<?php if($errors->has('title')): ?> has-error has-feedback<?php endif; ?>">
    {{Form::label('title', 'Title', ['class' => 'col-sm-2 control-label'])}}
    <div class="col-sm-10">
        {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Article Title'])}}
        <?php if($errors->has('title')): ?>
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            <span class="help-block">{{$errors->first('title')}}</span>
        <?php endif; ?>
    </div>
</div>

<div class="form-group">
    {{Form::label('tags[]', 'Tags', ['class' => 'col-sm-2 control-label'])}}
    <div class="col-sm-10">
        @if(isset($selectedTags))
        {{Form::select('tags[]', $tags, $selectedTags, ['multiple', 'id' => 'tags', 'placeholder' => Lang::get('articles.placeholder_tags'), 'class' => 'form-control'])}}
        @else
        {{Form::select('tags[]', $tags, null, ['multiple', 'id' => 'tags', 'placeholder' => Lang::get('articles.placeholder_tags'), 'class' => 'form-control'])}}
        @endif
    </div>
</div>

<div class="form-group">
    {{Form::label('categories[]', 'Categories', ['class' => 'col-sm-2 control-label'])}}
    <div class="col-sm-10">
        @if(isset($selectedCategories))
        {{Form::select('categories[]', $categories, $selectedCategories, ['multiple', 'id' => 'categories', 'placeholder' => Lang::get('articles.placeholder_categories'), 'class' => 'form-control'])}}
        @else
        {{Form::select('categories[]', $categories, null, ['multiple', 'id' => 'categories', 'placeholder' => Lang::get('articles.placeholder_categories'), 'class' => 'form-control'])}}
        @endif
    </div>
</div>

<div class="form-group<?php if($errors->has('snippet')): ?> has-error has-feedback<?php endif; ?>">
    {{Form::label('snippet', 'Snippet', ['class' => 'col-sm-2 control-label'])}}
    <div class="col-sm-10">
        {{Form::textarea('snippet', null, ['class' => 'form-control', 'id' => 'editor_snippet'])}}
        <?php if($errors->has('snippet')): ?>
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            <span class="help-block">{{$errors->first('snippet')}}</span>
        <?php endif; ?>
    </div>
</div>

<div class="form-group<?php if($errors->has('post')): ?> has-error has-feedback<?php endif; ?>">
    {{Form::label('post', 'Post', ['class' => 'col-sm-2 control-label'])}}
    <div class="col-sm-10">
        {{Form::textarea('post', null, ['class' => 'form-control', 'id' => 'editor_post'])}}
        <?php if($errors->has('post')): ?>
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            <span class="help-block">{{$errors->first('post')}}</span>
        <?php endif; ?>
    </div>
</div>