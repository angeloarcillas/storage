<?php
# Laravel

file.blade.php - .blade -> laravel rendering/template engine


@extends - same as class extends
@section('variable') ... @endsection - create <section>
    -@section('variable','value')  -> single line section
@foreach ( $key as $value) -- {{ $value }} -- @endforeach
    -{{ $var }} == <?= $var ?> |
    -{!! $var !!} -> no string escape


{{ $var }} - Echo content
{{{ $var }}} - Echo escaped content
{{-- Blade Comment --}}
{{{ $name or 'Default' }}} - Echoing Data After Checking For Existence
@{{ This will not be processed by Blade }} - Displaying Raw Text With Curly Braces


=====PHP ARTISAN=====
php artisan help (command) - show command usage


[ Migrate ] - version control for database
php artisan migrate - migrate
php artisan migrate:rollback - rollback
php artisan migrate:fresh - drop all table then migrate

[ Tinker ]
$object = new App\model_name; - create object/new data
$object->col_name = 'value'; - assign value
$object-> | App\model_name:: - methods
    -save() -> save data
    -all() -> view all data | all()[0] - fetch array index
    -latest() -> sort from latest
    -first() -> fetch 1st data
    -all()->last() -> fetch last data -> validate
    -orderBy('key', 'order(desc)')

csrf_field() - cross-site request forgery
    - hidden input+unique token
    -@csrf -> shortcut on blade

{{ method_field('PATCH')}} - set form method
    -sneak method becase browser cant read PATCH/DELETE
    -@method('PATCH') - shortcute on blade

request() - form request data

[ Routing ] -https://laravel.com/docs/5.8/routing
[ Validation ] -https://laravel.com/docs/5.8/validation
[ Schema ] -https://laravel.com/docs/4.2/schema
[ Relationship ] -https://laravel.com/docs/5.8/eloquent-relationships#one-to-many



[ Commands ]
php artisan make:model Task -m -f
    -> -m - migration
    -> -f - factory

use Filesystem - use filesystem class

fun (Filesystem $file)
