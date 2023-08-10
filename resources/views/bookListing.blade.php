@extends('layouts.appMaster')
@section('title', 'Dashboard')
@section('content')

    <div class = "table-dashboard">
        <section class="container" data-bs-toggle="collapse">
            <div class="text">
                <h1 style="color: #087f5b; text-align: center">Book Listings</h1>
                <p></p>
            </div>
            <div class="table-responsive" style="padding: 5px;margin: 0px;">
                <h3>
                    <input type="search" placeholder="Search..." class="form-control search-input" data-table="book-list"/>
                </h3></div>
        </section>
        @include("partials.homepageBookTable")
    </div>
    <script>
        (function(document) {
            'use strict';

            var TableFilter = (function(myArray) {
                var search_input;

                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('search-input');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });

        })(document);
    </script>
@stop

