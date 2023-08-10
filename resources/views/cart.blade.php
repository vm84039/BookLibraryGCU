@extends('layouts.appMaster')
@section('title', 'Cart')
@section('content')
    <div class="container">
      <div class="checkout-topbar">
        <div class="checkout-topbar-fill"></div>
      </div>
      <div class="cart_container">
        <div class="selected_checkout_books">
          <div class="checkout_cart">
            <p class="checkout_list">
              place holder for chosen books to be checked out
              <!-- Use this to update the books that the user wants to add to cart-->
              <?php

              ?>
            </p>
          </div>
          <div class="checkout_controls">
            <p class="number_of_books">
              Total Books: 1<?php  /*here it to echo total number of books  */
            ?>
            </p>

            <a class="btn btn--big" href="#">Checkout</a>
          </div>
        </div>
      </div>
@stop
