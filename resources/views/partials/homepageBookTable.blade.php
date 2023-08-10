<?php
use App\Services\Data\BookDAO;
use App\Http\Controllers\BookController;

$DAO = new BookDAO();
$books = $DAO->getAllBooks();
?>

<form action="/moreInfo" method="POST">
    @csrf
    <table class="table table-hover table-bordered mt32 book-list ">
        <thead class="text-uppercase bill-header cs " style="background: #087f5b; color:white">
        <tr>
            <th id="trs-hd-1" class="col-lg-1" style="width: 1%;">Book ID</th>
            <th id="trs-hd-2" class="col-lg-2" style="width: 8%;">Title</th>
            <th id="trs-hd-7" class="col-lg-2" style="width: 5%;">Author</th>
            <th id="trs-hd-5" class="col-lg-2" style="width: 8%;">Publisher</th>
            <th id="trs-hd-3" class="col-lg-3" style="width: 2%;">Year</th>
            <th id="trs-hd-8" class="col-lg-2" style="width: 4%;">ISBN #</th>
            <th id="trs-hd-6" class="col-lg-2" colspan="1" style="width: 2%;">GeNRe</th>
            <th id="trs-hd-6" class="col-lg-2" colspan="1" style="width: 2%;"><strong>DATE</strong><br><strong>AVAILABLE</strong></th>
            <th id="trs-hd-4" class="col-lg-2" colspan="1" style="width: 3%;"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($books as $book){
        ?>
        <tr>
            <td><?php echo $book->getID();?></td>
            <td><?php echo $book->getTitle();?></td>
            <td><?php echo $book->getAuthor();?></td>
            <td><?php echo $book->getPublisher();?></td>
            <td><?php echo $book->getYear();?></td>
            <td><?php echo $book->getIsbn();?></td>
            <td><?php echo $book->getGenre();?></td>
            <?php if($book->getChecked_out() == 0) {?>
            <td>Available</td> <?php }
            else {?>
            <td><?php echo $book->formatDate($book->getDue_date());?></td>  <?php } ?>
            <td >
                <button name="bookID" type="submit" value="<?php echo $book->getId();?>"class="">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="nav--icon"
                         fill="black"
                         viewBox="0 0 24 24"
                         stroke="#087f5b"
                         color="black"
                         stroke-width=".5">

                        <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/></svg>
                </button>
            </td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
</form>
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
