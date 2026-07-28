  <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-5">BOOK A TABLE</h2>
            <form action="book_table" method="POST">
                @csrf
            <div class="row mb-5">
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="tel" name="phone" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="PHONE NUMBER">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="number" name="n_guest" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="NUMBER OF GUESTS" max="20" min="0">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="time" id="booktable" name="time" class="form-control form-control-lg custom-form-control" placeholder="EMAIL">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="date" id="booktable" name="date" class="form-control form-control-lg custom-form-control" placeholder="12/12/12">
                </div>
            </div>
            <input type="submit" class="btn btn-lg btn-primary" id="rounded-btn" value="FIND TABLE" >
        </div>
    </form>
    </div>