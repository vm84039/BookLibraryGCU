<?php
use App\Services\Data\BookDAO;
use App\Http\Controllers\BookController;

$DAO = new BookDAO();
$books = $DAO->checkedOutBooks($userID);
$totalCheckedOut = $DAO->numCheckedOut($userID);

?>
<form action="/checkIn" method="POST">
    @csrf
    <input type="hidden" id="userID" name="userID" value="{{$userID}}">
<ol class="grid-item grid-item-3 .grid-dashboard">
    <li class="checkout-container container-item container-header">
        <div>Title</div>
        <div>Check Out Date</div>
        <div>Due Date</div>
    </li>
    <?php

    foreach($books as $book){
    ?>
    <li class="checkout-container container-item">
        <div><?php echo $book->TITLE;?></div>
        <div> <?php echo $book->CHECKOUT_DATE;?></div>
        <div><?php echo $book->DUE_DATE;?></div>
        <button name="bookID" class ="checkout-button" type="submit" value="<?php echo $book->ID;?>"class="navbar-brand">Check<br>In
        </button>


    </li> <?php } ?>
    <br>
    <div style="text-align: left; margin:0px"> <p><strong>Total Books Checked Out:  <?php echo $totalCheckedOut;?></strong></p></div>

</ol>
</form>
