@extends('includes.layout')

@section('content')
    @include('includes.hrmenu')

    <main class="putMtop">
        <div class="container">
            <section class="px-3">
                <h2 class="h1 fw-bold">Create Salary Grade</h2>
                <form method="POST" action="{{ route('salary-grades.new') }}">
                    @csrf
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="mb-3">
                            <label for="step_{{ $i }}" class="form-label">Step {{ $i }}</label>
                            <input type="number" step="0.01" class="form-control" id="step_{{ $i }}" name="step_{{ $i }}">
                        </div>
                    @endfor
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </section>
        </div>
    </main>
@stop
