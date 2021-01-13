{{-- $project can be access bcus of public $project; --}}
@component('mail::message')
# Project: {{ $project->title }}
{{ $project->description }}

    {{-- set button path --}}
@component('mail::button', ['url' => url('/project/'.$project->id)])
View Project
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
