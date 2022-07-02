<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo e(url('/')); ?>/public/storage/users/1561460997.jpg" class="user-avatar rounded-circle" alt="admin" /> </a>
                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="<?php echo e(url('/')); ?>/admin/edit-profile"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="<?php echo e(url('/')); ?>/admin/general-settings"><i class="fa fa-cog"></i> Settings</a>
                        <a class="nav-link" href="<?php echo e(url('/')); ?>/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container ven-dash">
      <div class="bg-white shadow pt-4 pr-3 pl-3 mb-2">
        <div class="row">
          <div class="col-sm-6">
            <h3>Photos & Docs</h3>
            <p>All your photos and documents at one place!</p>
          </div>
          <div class="col-sm-6">
            <!--<div class="float-right">-->
            <!--  <input type="file" id="file" />-->
            <!--  <label for="file" class="btn-2">File upload</label>-->
            <!--  <br><small>or Drag & Drop files to upload</small>-->
            <!--</div>-->
          </div>
        </div>
      </div>
      <div class="bg-white shadow pt-4 pr-3 pl-3 mb-2">
        <div class="row">
          <div class="col-sm-12 mb-2">
            <h5>Quick Filters</h5>
          </div>
          <div class="col-md-12 col-sm-12">
            <?php if(session('success')): ?>
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <ul id="tabsJustified" class="nav nav-tabs nav-justified">
              <!--<li class="nav-item"><a href="" data-target="#photo" data-toggle="tab" class="nav-link small text-uppercase "><i class="fa fa-file-image-o" aria-hidden="true"></i> Photos</a></li>-->
              <li class="nav-item"><a href="" data-target="#pdf" data-toggle="tab" class="nav-link small text-uppercase active"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF Files</a></li>
              <li class="nav-item"><a href="" data-target="#excel" data-toggle="tab" class="nav-link small text-uppercase"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel Files</a></li>
              <li class="nav-item"><a href="" data-target="#word" data-toggle="tab" class="nav-link small text-uppercase"><i class="fa fa-file-word-o" aria-hidden="true"></i> Word Docs</a></li>
              <li class="nav-item"><a href="" data-target="#zip" data-toggle="tab" class="nav-link small text-uppercase"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Zip Files</a></li>
            </ul>
          </div>
          <div class="col-md-12">
            <div id="tabsJustifiedContent" class="tab-content pro">
              <div id="pdf" class="tab-pane fade active show">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                    <h5><a href="#">All files (<?php echo e((isset($productDocs['PDF']) ? count($productDocs['PDF']) : '0')); ?>)</a> &gt; Pdf Files</h5>
                  </div>
                  <?php if(isset($productDocs['PDF'])): ?>
                    <?php $__currentLoopData = $productDocs['PDF']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productDoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                            <div class="card shadow">
                              <div class="card-img">
                                <img class="card-img-top" src="/public/img/pdf.png">
                              </div>
                              <div class="card-block">
                                <h4 class="card-title"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php echo e($productDoc->file_name); ?></h4>
                              </div>
                              <div class="card-footer">
                                <span class="">Uploaded: <?php echo e(\Carbon\Carbon::parse($productDoc->created_at)->format('d M, Y')); ?></span>
                                <!--<span><a href="#" class="save-pro">Save as Product</a></span>-->
                                <span>
                                  <div class="user-area dropdown float-right">
                                    <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <svg onclick="openprdactionMyDrive(100012481)" class="icon dropbtn" enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                      </svg>
                                    </a>
                                    <div class="user-menu dropdown-menu">
                                      <a class="nav-link" href="<?php echo e(url('vendor/product-docs/update')); ?>" data-product-docs-edit-btn docs-id="<?php echo e($productDoc->id); ?>" file-name="<?php echo e($productDoc->file_name); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Rename</a>                            
                                      <a class="nav-link" href="<?php echo e(asset('public/storage/product-docs/'. $productDoc->upload_file_name)); ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                      <a class="nav-link" href="<?php echo e(url('vendor/product-docs/'.$productDoc->id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this file?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                    </div>
                                  </div>
                                </span>
                              </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>      
                  <div class="col-sm-12 col-md-12 text-center">
                    <form action="<?php echo e(url('vendor/product-docs/add')); ?>" enctype="multipart/form-data" id="pdfForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" id="pdf_type" value="pdf">
                        <div class="">
                          <input type="file" name="file" id="pdf_file" accept=".pdf" file-type="pdf" data-file-upload/>
                          <label for="pdf_file" class="btn-2">File upload</label>
                          <!--<br><small>or Drag & Drop files to upload</small>-->
                        </div>
                    </form>
                  </div>
                </div>
              </div>
              <div id="excel" class="tab-pane fade">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                    <h5><a href="#">All files (<?php echo e((isset($productDocs['EXCEL']) ? count($productDocs['EXCEL']) : '0')); ?>)</a> &gt; Excel Files</h5>
                  </div>
                  <div class="col-sm-12 col-md-12">
                    <?php if(isset($productDocs['EXCEL'])): ?>
                        <?php $__currentLoopData = $productDocs['EXCEL']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productDoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                                <div class="card shadow">
                                  <div class="card-img">
                                    <img class="card-img-top" src="/public/img/excel.png">
                                  </div>
                                  <div class="card-block">
                                    <h4 class="card-title"><i class="fa fa-file-excel-o" aria-hidden="true"></i> <?php echo e($productDoc->file_name); ?></h4>
                                  </div>
                                  <div class="card-footer">
                                    <span class="">Uploaded: <?php echo e(\Carbon\Carbon::parse($productDoc->created_at)->format('d M, Y')); ?></span>
                                    <!--<span><a href="#" class="save-pro">Save as Product</a></span>-->
                                    <span>
                                      <div class="user-area dropdown float-right">
                                        <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <svg onclick="openprdactionMyDrive(100012481)" class="icon dropbtn" enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <circle cx="12" cy="12" r="2"></circle>
                                            <circle cx="12" cy="5" r="2"></circle>
                                            <circle cx="12" cy="19" r="2"></circle>
                                          </svg>
                                        </a>
                                        <div class="user-menu dropdown-menu">
                                          <a class="nav-link" href="<?php echo e(url('vendor/product-docs/update')); ?>" data-product-docs-edit-btn docs-id="<?php echo e($productDoc->id); ?>" file-name="<?php echo e($productDoc->file_name); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Rename</a>                            
                                          <a class="nav-link" href="<?php echo e(asset('public/storage/product-docs/'. $productDoc->upload_file_name)); ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                          <a class="nav-link" href="<?php echo e(url('vendor/product-docs/'.$productDoc->id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this file?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                        </div>
                                      </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  <div class="col-sm-12 col-md-12 text-center">
                    <form action="<?php echo e(url('vendor/product-docs/add')); ?>" enctype="multipart/form-data" id="excelForm" method="POST">  
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" id="excel_type" value="excel">
                        <div class="">
                          <input type="file" name="file" id="excel_file" accept=".xlsx, .xls" data-file-upload file-type="excel"/>
                          <label for="excel_file" class="btn-2">File upload</label>
                          <!--<br><small>or Drag & Drop files to upload</small>-->
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <div id="word" class="tab-pane fade">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                    <h5><a href="#">All files (<?php echo e((isset($productDocs['WORD']) ? count($productDocs['WORD']) : '0')); ?>)</a> &gt; Word Docs</h5>
                  </div>
                  <div class="col-sm-12 col-md-12">
                    <?php if(isset($productDocs['WORD'])): ?>
                        <?php $__currentLoopData = $productDocs['WORD']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productDoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                                <div class="card shadow">
                                  <div class="card-img">
                                    <img class="card-img-top" src="/public/img/word.png">
                                  </div>
                                  <div class="card-block">
                                    <h4 class="card-title"><i class="fa fa-file-word-o" aria-hidden="true"></i> <?php echo e($productDoc->file_name); ?></h4>
                                  </div>
                                  <div class="card-footer">
                                    <span class="">Uploaded: <?php echo e(\Carbon\Carbon::parse($productDoc->created_at)->format('d M, Y')); ?></span>
                                    <!--<span><a href="#" class="save-pro">Save as Product</a></span>-->
                                    <span>
                                      <div class="user-area dropdown float-right">
                                        <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <svg onclick="openprdactionMyDrive(100012481)" class="icon dropbtn" enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <circle cx="12" cy="12" r="2"></circle>
                                            <circle cx="12" cy="5" r="2"></circle>
                                            <circle cx="12" cy="19" r="2"></circle>
                                          </svg>
                                        </a>
                                        <div class="user-menu dropdown-menu">
                                          <a class="nav-link" href="<?php echo e(url('vendor/product-docs/update')); ?>" data-product-docs-edit-btn docs-id="<?php echo e($productDoc->id); ?>" file-name="<?php echo e($productDoc->file_name); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Rename</a>                            
                                          <a class="nav-link" href="<?php echo e(asset('public/storage/product-docs/'. $productDoc->upload_file_name)); ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                          <a class="nav-link" href="<?php echo e(url('vendor/product-docs/'.$productDoc->id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this file?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                        </div>
                                      </div>
                                    </span>
                                  </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                      <div class="col-sm-12 col-md-12 text-center">
                      <form action="<?php echo e(url('vendor/product-docs/add')); ?>" enctype="multipart/form-data" id="wordForm" method="POST">
                         <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" id="word_type" value="word">  
                        <div class="">
                          <input type="file" name="file" id="word_file" accept=".doc, .docx" data-file-upload file-type="word"/>
                          <label for="word_file" class="btn-2">File upload</label>
                          <!--<br><small>or Drag & Drop files to upload</small>-->
                        </div>
                      </form>
                      </div>
                  </div>
                </div>
              </div>
              <div id="zip" class="tab-pane fade">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                    <h5><a href="#">All files (<?php echo e((isset($productDocs['ZIP']) ? count($productDocs['ZIP']) : '0')); ?>)</a> &gt; Zip Files</h5>
                  </div>
                  <div class="col-sm-12 col-md-12">
                    <?php if(isset($productDocs['ZIP'])): ?>
                        <?php $__currentLoopData = $productDocs['ZIP']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productDoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                                <div class="card shadow">
                                  <div class="card-img">
                                    <img class="card-img-top" src="/public/img/zip.png">
                                  </div>
                                  <div class="card-block">
                                    <h4 class="card-title"><i class="fa fa-file-archive-o" aria-hidden="true"></i> <?php echo e($productDoc->file_name); ?></h4>
                                  </div>
                                  <div class="card-footer">
                                    <span class="">Uploaded: <?php echo e(\Carbon\Carbon::parse($productDoc->created_at)->format('d M, Y')); ?></span>
                                    <!--<span><a href="#" class="save-pro">Save as Product</a></span>-->
                                    <span>
                                      <div class="user-area dropdown float-right">
                                        <a href="javascript:void();" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <svg onclick="openprdactionMyDrive(100012481)" class="icon dropbtn" enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <circle cx="12" cy="12" r="2"></circle>
                                            <circle cx="12" cy="5" r="2"></circle>
                                            <circle cx="12" cy="19" r="2"></circle>
                                          </svg>
                                        </a>
                                        <div class="user-menu dropdown-menu">
                                          <a class="nav-link" href="<?php echo e(url('vendor/product-docs/update')); ?>" data-product-docs-edit-btn docs-id="<?php echo e($productDoc->id); ?>" file-name="<?php echo e($productDoc->file_name); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Rename</a>                            
                                          <a class="nav-link" href="<?php echo e(asset('public/storage/product-docs/'. $productDoc->upload_file_name)); ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                          <a class="nav-link" href="<?php echo e(url('vendor/product-docs/'.$productDoc->id.'/delete')); ?>" onclick="return confirm('Are you sure you want to delete this file?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                        </div>
                                      </div>
                                    </span>
                                  </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="col-sm-12 col-md-12 text-center">
                    <form action="<?php echo e(url('vendor/product-docs/add')); ?>" enctype="multipart/form-data" id="zipForm" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" id="zip_type" value="zip">  
                        <div class="">
                          <input type="file" name="file" id="zip_file" accept=".zip" data-file-upload file-type="zip"/>
                          <label for="zip_file" class="btn-2">File upload</label>
                          <!--<br><small>or Drag & Drop files to upload</small>-->
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="editFileNameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit File Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="<?php echo e(url('vendor/product-docs/update')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      
                      <input type="hidden" class="form-control" id="edit_docs_id" name="docs_id">
                      <div class="modal-body">
                          <div class="form-group">
                            <label for="edit_file_name" class="col-form-label">File Name:</label>
                            <input type="text" class="form-control" id="edit_file_name" name="file_name" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inforrmz/venicered.com/resources/views/vendor-dash/my-drive.blade.php ENDPATH**/ ?>