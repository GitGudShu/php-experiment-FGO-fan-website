<?php
require 'header.php';
?>

<div class="bg-dark container px-5 mt-5 py-3" style="--bs-bg-opacity: .8">
        <section id="content">
            <div class="mb-3 text-center text-white" style="max-width: 300px;">
                <h2>Advanced search</h2>
            </div>

            <div id="advanced-search">

                <form action="quick-advanced-search.php" method="get">
                    <div>
                        <div class="form-outline mb-4">
                            <label class="col-form-label text-white" for="search-name">Name: </label>
                            <input type="text" name="search-name" id="search-name"><br>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="col-form-label text-white" for="search-aka">AKA: </label>
                            <input type="text" name="search-aka" id="search-aka"><br>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="col-form-label text-white" for="search-class">Class: </label>
                            <input type="text" name="search-class" id="search-class"><br>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="col-form-label text-white" for="search-illustrator">Illustrator: </label>
                            <input type="text" name="search-illustrator" id="search-illustrator"><br>
                        </div>

                        <input class="card mb-3 text-center p-2" type="submit" value="Search"><br>
                    </div>
                </form>

            </div>
        </section>
</div>
<?php
require 'footer.php';
?>
