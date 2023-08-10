<?php
use App\Services\Data\BookDAO;
use App\Http\Controllers\BookController;
use \App\Services\Data\CartDAO;use Carbon\Carbon;

$cartDAO = new CartDAO();
$bookDAO = new BookDAO();
$carts = $cartDAO->getCart($userID);
?>
<form action="/deleteCart" method="POST">
    @csrf
    <input type="hidden" id="userID" name="userID" value="{{$userID}}">
    <ol class="grid-item grid-item-3 .grid-dashboard">
        <li class="cart-container container-item container-header" style="font-weight: bold">
            <div>Title</div>
            <div>Year</div>
            <div></div>
        </li>
        <?php

        foreach($carts as $cart){ ?>
            <li class="cart-container container-item">
                <?php $bookYear=Carbon::createFromFormat('Y-m-d', $cart->DATE)->format('Y')?>
        <div><?php echo $cart->TITLE;?></div>
        <div><?php echo $bookYear;?></div>
        <div>
            <button name="cartID" type="submit" value="<?php echo $cart->CARTID;?>"class="navbar-brand">
                <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
            </button>
        </div>
        </li> <?php } ?>
    </ol>
</form>
