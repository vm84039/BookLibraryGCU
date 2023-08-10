<?php
use App\Services\Data\BookDAO;
use App\Http\Controllers\BookController;

$DAO = new BookDAO();
$books = $DAO->getAllBooks();
?>

@extends('layouts.appCustomer')
@section('title', 'Landing Page')
@section('content')

    <div class=" grid-container-landingPage">
        <div class="grid-item grid-item-1 welcome">Welcome {{$firstName}} {{$lastName}}</div>
        <div class="grid-item grid-header "></div>
        <div class="grid-item grid-header ">Books In Cart</div>
        <div class="grid-item grid-header ">Checked Out Books</div>
        <div class="grid-item grid-item-2 grid-dashboard">
            @include("partials.bookTable")
        </div>
        <div>
            @include("partials.addToCart")
        </div>
        <div>
            @include("partials.checkedOut")
        </div>
        <form action="/checkout" method="POST">
            @csrf
            <div class="grid-item add_to_cart_controls">
                <button class=" btn--big cbutton "  name="userID" type="submit" value="<?php echo $userID;?>"?>CHECKOUT</button>
            </div>
        </form>
        <div class=class="grid-item"></div>
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
