<?php
use App\Services\Data\BookDAO;
use App\Http\Controllers\BookController;

$DAO = new BookDAO();

?>

@extends('layouts.appMaster')
@section('title', 'Login')
@section('content')
    <section style="height: 450px;">
        <div class="container justify-content-center">
            <div class="row">
                <div class="col-md-8" style="width: 50%;height: 400px;text-align: left;font-size: 56px;">
                    <div style="margin-top: 20%;">
                        <h1 style="font-size: 56px;text-align: left;font-weight: bold;">Books you are looking for</h1>
                    </div><a class="btn btn-primary ms-auto aButton" type="button" href="/bookListing" style="">FIND BOOKS</a>
                </div>
                <div class="col-md-4" style="width: 50%;height: 400px;"><img src="{{ asset('img/header.jpg') }}" style="height: 100%;"></div>
            </div>
        </div>
    </section>
    <div style="margin-left: 200px;">
        <h1 style="font-size: 36px;text-align: center;font-weight: bold;">Most Popular Books</h1>
        <div style="text-align: center;">
                <div class="row" style="height: 450px;">
                    <div class="col-md-4 text-start competencesboxes" style="background-color: #f2f5f8;margin: 40px;width: 448px;margin-right: 50px;margin-top: 10px;height: 400px;box-shadow: 20px 30px rgba(0, 0, 0, 0.1);border-radius: 12px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;padding-right: 0px;padding-left: 0px;">
                        <?php
                        $popular = $DAO->getBookByID(6);
                        ?>
                        <figure class="figure" style=" width: 448px; margin-top: 20px;">
                            <img  class="img-fluid figure-img" src="{{ asset('img')}}/{{ $popular->getIMG() }}"
                                  style="border-radius: 12px;margin: 30px; width: 40%; float:left;">
                             <h3 style="margin: 0px; text-transform: uppercase; text-align: center; color: #087f5b"class="competencestitles"><strong><?php echo $popular->getTitle();?></strong></h3>
                            <div style="margin-left: 20px;text-align: center;">
                                <p class="text-start competencesparagraph"><br><strong>DATE</strong><br><?php echo $popular->getDate();?><br><strong>AUTHOR</strong><br><?php echo $popular->getAuthor();?>
                                    <br><strong>GENRE</strong><br><?php echo $popular->getGenre();?><br><strong>PUBLISHER</strong><br><?php echo $popular->getPublisher();?></p>
                            </div><button class="btn btn-primary text-center" type="button" style="margin: 14px;background: #087f5b;color: #fff;width: 125px;border-radius: 100px;margin-bottom: 10px;height: 40px;padding: 0px;">Checkout</button></figure>
                    </div>
                    <div class="col-md-4 text-start competencesboxes" style="background-color: #f2f5f8;margin: 20px;width: 448px;margin-right: 50px;margin-top: 10px;height: 400px;box-shadow: 20px 30px rgba(0, 0, 0, 0.1);border-radius: 12px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;padding-right: 0px;padding-left: 0px;">
                        <?php
                        $popular = $DAO->getBookByID(5);
                        ?>
                        <figure class="figure" style=" width: 448px; margin-top: 20px;">
                            <img  class="img-fluid figure-img" src="{{ asset('img')}}/{{ $popular->getIMG() }}"
                                  style="border-radius: 12px;margin: 30px; width: 40%; float:left;">
                            <h3 style="margin: 0px; text-transform: uppercase; text-align: center; color: #087f5b"class="competencestitles"><strong><?php echo $popular->getTitle();?></strong></h3>
                            <div style="margin-left: 20px;text-align: center;">
                                <p class="text-start competencesparagraph"><br><strong>DATE</strong><br><?php echo $popular->getDate();?><br><strong>AUTHOR</strong><br><?php echo $popular->getAuthor();?>
                                    <br><strong>GENRE</strong><br><?php echo $popular->getGenre();?><br><strong>PUBLISHER</strong><br><?php echo $popular->getPublisher();?></p>
                            </div><button class="btn btn-primary text-center" type="button" style="margin: 14px;background: #087f5b;color: #fff;width: 125px;border-radius: 100px;margin-bottom: 10px;height: 40px;padding: 0px;">Checkout</button></figure>
                    </div>
                    <div class="col-md-4 text-start competencesboxes" style="background-color: #f2f5f8;margin: 20px;width: 448px;margin-right: 50px;margin-top: 10px;height: 400px;box-shadow: 20px 30px rgba(0, 0, 0, 0.1);border-radius: 12px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px;padding-right: 0px;padding-left: 0px;">
                        <?php
                        $popular = $DAO->getBookByID(3);
                        ?>
                        <figure class="figure" style=" width: 448px; margin-top: 20px;">
                            <img  class="img-fluid figure-img" src="{{ asset('img')}}/{{ $popular->getIMG() }}"
                                  style="border-radius: 12px;margin: 30px; width: 40%; float:left;">
                            <h3 style="margin: 0px; text-transform: uppercase; text-align: center; color: #087f5b"class="competencestitles"><strong><?php echo $popular->getTitle();?></strong></h3>
                            <div style="margin-left: 20px;text-align: center;">
                                <p class="text-start competencesparagraph"><br><strong>DATE</strong><br><?php echo $popular->getDate();?><br><strong>AUTHOR</strong><br><?php echo $popular->getAuthor();?>
                                    <br><strong>GENRE</strong><br><?php echo $popular->getGenre();?><br><strong>PUBLISHER</strong><br><?php echo $popular->getPublisher();?></p>
                            </div><button class="btn btn-primary text-center" type="button" style="margin: 14px;background: #087f5b;color: #fff;width: 125px;border-radius: 100px;margin-bottom: 10px;height: 40px;padding: 0px;">Checkout</button></figure>
                    </div>
            </div>
    </div>
@stop
