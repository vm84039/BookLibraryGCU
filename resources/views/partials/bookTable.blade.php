<?php
use App\Services\Data\BookDAO;
use App\Http\Controllers\BookController;

$DAO = new BookDAO();
$books = $DAO->getAllBooks();
?>


    <input type="hidden" id="userID" name="userID" value="{{$userID}}">
    <table class="table table-hover table-bordered mt32 book-list" style="z-index: -100">
        <thead class="text-uppercase thead-dashboard" >
        <tr >
            <th colspan="6" style="font-size: x-large"><strong>Book Listings</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($books as $book){
        ?>
        <tr class="bookRow" style="z-index: -100">
            <td class="rowImg" rowspan="4"><img  alt="pic" class="tableImg" src="{{ asset('img')}}/{{ $book->getIMG() }}"></td>
            <td class="table-title" colspan="4"><?php echo $book->getTitle();?></td>
            <td rowspan="2" style="z-index: -100">
                <?php if($book->getChecked_out() == 0) {?>
                    <form action="/addCart" method="POST" style="z-index: -100">
                        @csrf
                        <input type="hidden" id="userID" name="userID" value="{{$userID}}">

                <label>
                    <input name="bookID"  style="z-index: 100; visibility: hidden" class = "bookTable-button navbar-brand;" type="submit" value="<?php echo $book->getId();?>">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="nav--icon"
                             fill="blue"
                             viewBox="0 0 24 24"
                             stroke="#087f5b"
                             color="blue"
                             stroke-width=".5"
                             >
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13
                            12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2
                            2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1
                            0 2 1 1 0 0 1 0-2z"/> </svg>
                </label> </form>
                <?php  } ?>
            </td></tr>

        <tr id="table-heading">
            <th class="table-heading">Author</th>
            <td ><?php echo $book->getAuthor();?></td>
            <th class="table-heading">Due Date</th>
            <?php if($book->getChecked_out() == 0) {?>
            <td>Available</td> <?php }
            else {?>
            <td><?php echo $book->formatDate($book->getDue_date());?></td>  <?php } ?></tr>

            <th class="table-heading">Publisher</th>
            <td><?php echo $book->getPublisher();?></td>
            <th class="table-heading">Genre</th>
            <td style="width: 3%;"><?php echo $book->getGenre();?></td>
            <td rowspan="2">
            <form action="/customerDetail" method="POST" style="z-index: -100">
                @csrf
                <label>
                    <input name="bookID"  style="z-index: 100; visibility: hidden" class = "bookTable-button navbar-brand;" type="submit" value="<?php echo $book->getId();?>">
                    <input type="hidden" id="userID" name="userID" value="{{$userID}}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="nav--icon"
                             fill="black"
                             viewBox="0 0 24 24"
                             stroke="#087f5b"
                             color="black"
                             width="10px"
                             stroke-width=".5">
                            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067
                            1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32
                            1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                        </svg>
                 </label> </form>

                </td>
        </tr>
        <tr>
            <th class="table-heading">Year</th>
            <td><?php echo $book->getYear();?></td>
            <th class="table-heading">ISBN</th>
            <td><?php echo $book->getIsbn();?></td>

        </tr>
        </tbody>
        <?php } ?>
    </table>

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
