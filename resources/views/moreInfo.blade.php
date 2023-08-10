<?php
use App\Services\Data\BookDAO;
use App\Http\Controllers\BookController;
use Illuminate\Support\Collection;
use App\Models\BookModel;

$DAO = new BookDAO();
$book = $DAO->getBookByID($bookID);

?>

@extends('layouts.appMaster')
@section('title', 'MoreInfo')
@section('content')
    <div class=" grid-container-moreInfo ">
            <div class="grid-item-moreInfo moreInfo-item grid-item-1-moreInfo"><img  alt="pic" class="moreInfoImg" src="{{ asset('img')}}/{{ $book->getIMG() }}"></div>
            <div class="grid-item-moreInfo grid-item-2-moreInfo moreInfo-header" style="font-size: xx-large">{{$book->getTitle()}}</div>
            <div class="grid-item-moreInfo moreInfo-item moreInfo-header">Author</div>
            <div class="grid-item-moreInfo moreInfo-header moreInfo-item">Year</div>
            <div class="grid-item-moreInfo moreInfo-item">{{$book->getAuthor()}}</div>
            <div class="grid-item-moreInfo moreInfo-item">{{$book->getYear()}}</div>
            <div class="grid-item-moreInfo  moreInfo-item moreInfo-header">Publisher</div>
            <div class="grid-item-moreInfo moreInfo-header moreInfo-item">Genre</div>
            <div class="grid-item-moreInfo moreInfo-item">{{$book->getPublisher()}}</div>
            <div class="grid-item-moreInfo moreInfo-item">{{$book->getGenre()}}</div>
            <div class="grid-item-moreInfo moreInfo-item moreInfo-header">BookID</div>
            <div class="grid-item-moreInfo moreInfo-item  moreInfo-header">CheckoutDate</div>
            <div class="grid-item-moreInfo moreInfo-item">{{$bookID}}</div>
            <div class="grid-item-moreInfo moreInfo-item">
                <?php if($book->getChecked_out() == 0) {?>
                <td>Available</td> <?php }
                else {?>
                <td><?php echo $book->formatDate($book->getCheckout_date());?></td>  <?php } ?></tr>
            </div>
            <div class="grid-item-moreInfo moreInfo-header moreInfo-item grid-item-3-moreInfo"></div>
            <div class="grid-item-moreInfo moreInfo-header moreInfo-item">ISBN</div>
            <div class="grid-item-moreInfo moreInfo-header moreInfo-item">Due Date</div>
            <div class="grid-item-moreInfo moreInfo-item">{{$book->getIsbn()}}</div>
            <div class="grid-item-moreInfo moreInfo-item">{{$book->getDue_date()}}</div>
    </div>

@stop
