@extends('layouts.dashboard')

@section('content')

    <section class="flexbox-container">

        <div class="col-12 d-flex align-items-center justify-content-center">

            <div class="col-md-8 col-10 p-0">

                <div class="card-header">

                    <img src="https://img.freepik.com/free-vector/error-404-concept-illustration_114360-1811.jpg?size=626&ext=jpg" width="100%">

                    <h3 class="text-uppercase text-center">@lang($exception->getMessage())</h3>

                </div>
            </div>

        </div>

    </section>

@endsection
