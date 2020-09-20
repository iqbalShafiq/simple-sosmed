@extends('layouts.app', ["title" => 'Your Timeline'])

@section('content')
<div class="p-4">
    <livewire:status.post />
    <livewire:status.index />
</div>
@endsection
