        <br>
        <div class="LoggedinContainer">
            <div class="inner_LoggedinContainer container">
                <p>English<span> Test and results</span></p>
                <div class="row" style="width: 100%;">
                    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0">
                    </div>
                    <div class="testExample col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="testExample_main">
                            <div class="testExample_picture">
                                <img src="../spons.png">
                            </div>
                            <div class="testExample_text">
                                <?php
                                    echo "<a type=\"button\" href=\"test/passthru.php?id=$user->id\">Start Test</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="testExample col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="testExample_main">
                            <div class="testExample_picture">
                                <img src="../spons.png">
                            </div>
                            <div class="testExample_text">
                                <?php
                                    echo "<a type=\"button\" href=\"test-results/passthru.php?id=$user->id\">Results</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0">
                    </div>
                </div>
            </div>
        </div>