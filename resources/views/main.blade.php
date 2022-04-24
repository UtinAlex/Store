<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container panel panel-default ">
            <h2 class="panel-heading">Удалить формы</h2>
        <form method="POST" action="/del-form">
            @csrf
            @foreach ($fieldsForm as $fields)
            <div class="form-group">
                <span>{{ $fields['title'] }}</span>
                <input type="checkbox" name="{{ $fields['field_name'] }}" value="{{ $fields['id'] }}" class="form-control" 
                placeholder="{{ $fields['placeholder_form'] }}" id="{{ $fields['id'] }}">
            </div>
            @endforeach
            <div class="form-group">
                <button class="btn btn-success" id="submit">Удалить</button>
            </div>
        </form>
    </div>

    <div class="container panel panel-default ">
        <h2 class="panel-heading">Добавить поле в форму</h2>
    <form method="POST" action="/save-form">
        @csrf
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Обозначение поля" id="name">
        </div>
         <div class="form-group">
            <input type="text" name="field_name" class="form-control" placeholder="Атрибут name (заполняем символами a-z)" id="name">
        </div>
         <div class="form-group">
            <input type="text" name="placeholder_form" class="form-control" placeholder="Placeholder поля" id="name">
        </div>
        <div class="form-group">
            <button class="btn btn-success" id="submit">Добавить</button>
        </div>
    </form>
    </div>
    