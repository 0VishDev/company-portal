@include('vendor-dash.left-panel')


    <div class="container ven-dash">
        <div class="bg-white shadow pt-4 pl-2 pr-2">
            <div class="row">
                <div class="col-sm-8 mb-3">
                    <h5 class="pb-2">Create Catalog URL</h5>
                    <p>Venice Red catalog helps you create an online presence for your business to reach out to more buyers across the world</p>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="user-area dropdown float-right mt-3">
                        <a href="javascript:void();" class="dropdown-toggle shadow p-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More Options <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        <div class="user-menu1 dropdown-menu">
                            <a class="nav-link" href="contactprofile.php">Company Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4 bg-white shadow pt-3 pr-3 pl-3">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <div class="">
                        <p>Your current catalog URL is : <a href="#">https://www.venicered.com/company/86185690/</a></p>
                        <p><b>Personalize your URL for better promotion</b></p>
                    </div>
                </div>
                <div class="col-sm-7 mb-3">
                    <h5>Enter a new URL for your catalog</h5>
                    <small>Note: You will not be able to change this URL once you set it.</small>
                    <form>
                        <div class="cate-link">
                            <span>https://www.venicered.com/</span> <input type="text" class="form-control" placeholder="Enter your personalized URL"> <a href="#">Check availability</a>
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-sm btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->

@include('vendor-dash.bottom-links')