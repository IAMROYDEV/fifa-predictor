@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Select Players</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Countries</label>
                <select name="country" id="select-countries" class="form-control custom-select selectized" tabindex="-1" style="display: none;">
                    <option value="pl" selected="selected">Poland</option>
                </select>
                <div class="selectize-control form-control custom-select single">
                    <div class="selectize-input items has-options not-full"><input type="text" autocomplete="off" tabindex="" id="select-countries-selectized" style="width: 4px; opacity: 1; position: relative; left: 0px;"></div>
                    <div class="selectize-dropdown single form-control custom-select" style="display: none; visibility: visible; width: 359.328px; top: 38px; left: 0px;">
                        <div class="selectize-dropdown-content">
                            <div data-selectable="" data-value="br" class=""><span class="image"><img src="./assets/images/flags/br.svg" alt=""></span><span class="title">Brazil</span></div>
                            <div data-selectable="" data-value="cz" class=""><span class="image"><img src="./assets/images/flags/cz.svg" alt=""></span><span class="title">Czech Republic</span></div>
                            <div data-selectable="" data-value="de" class=""><span class="image"><img src="./assets/images/flags/de.svg" alt=""></span><span class="title">Germany</span></div>
                            <div data-selectable="" data-value="pl" class="selected"><span class="image"><img src="./assets/images/flags/pl.svg" alt=""></span><span class="title">Poland</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
