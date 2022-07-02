<?php echo $__env->make('vendor-dash.left-panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="container ven-dash">
    <div class="bg-white pt-4 pl-2 pr-2 text-center">
      <div class="row">
        <div class="col-sm-12 mb-3">
          <h3 class="pb-2">Notification Setting</h3>
        </div>
      </div>
    </div>
    <form class="bg-white p-3 mt-4 noti" action="<?php echo e(url('/vendor/notification/update')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mb-4">
            <h5>Business Enquiries</h5>
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>1. Send By Inquiries</h6>
            </div>
            <input type="radio" name="send_inquiry" value="Call" <?php echo e(($user->send_inquiry == 'Call' ? 'checked' : '')); ?>> Call<br>
            <input type="radio" name="send_inquiry" value="Email" <?php echo e(($user->send_inquiry == 'Email' ? 'checked' : '')); ?>> Email<br>
            <input type="radio" name="send_inquiry" value="SMS" <?php echo e(($user->send_inquiry == 'SMS' ? 'checked' : '')); ?>> SMS<br>
            <input type="radio" name="send_inquiry" value="SMS" <?php echo e(($user->send_inquiry == 'SMS' ? 'checked' : '')); ?>> App
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>2. Follow Up Remainders</h6>
            </div>
            <input type="radio" name="follow_up_remainder" value="Call" <?php echo e(($user->follow_up_remainder == 'Call' ? 'checked' : '')); ?>> Call<br>
            <input type="radio" name="follow_up_remainder" value="Email" <?php echo e(($user->follow_up_remainder == 'Email' ? 'checked' : '')); ?>> Email<br>
            <input type="radio" name="follow_up_remainder" value="SMS" <?php echo e(($user->follow_up_remainder == 'SMS' ? 'checked' : '')); ?>> SMS<br>
            <input type="radio" name="follow_up_remainder" value="APP" <?php echo e(($user->follow_up_remainder == 'APP' ? 'checked' : '')); ?>> App
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>3. Buy Leads</h6>
            </div>
            <p>I Want Buyers From</p>
            <input type="radio" name="buyer_from" value="Only International" <?php echo e(($user->buyer_from == 'Only International' ? 'checked' : '')); ?>> Only International<br>
            <input type="radio" name="buyer_from" value="Only India" <?php echo e(($user->buyer_from == 'Only India' ? 'checked' : '')); ?>> Only India<br>
            <input type="radio" name="buyer_from" value="All (International + Domestic)" <?php echo e(($user->buyer_from == 'All (International + Domestic)' ? 'checked' : '')); ?>> All (International + Domestic)
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>4. Letest Buy Leads</h6>
            </div>
            <p>Get Notified on Latest Buy Leads</p>
            <input type="radio" name="latest_buyer_from" value="Call" <?php echo e(($user->latest_buyer_from == 'Call' ? 'checked' : '')); ?>> Call<br>
            <input type="radio" name="latest_buyer_from" value="Email" <?php echo e(($user->latest_buyer_from == 'Email' ? 'checked' : '')); ?>> Email<br>
            <input type="radio" name="latest_buyer_from" value="SMS" <?php echo e(($user->latest_buyer_from == 'SMS' ? 'checked' : '')); ?>> SMS<br>
            <input type="radio" name="latest_buyer_from " value="APP" <?php echo e(($user->latest_buyer_from == 'APP' ? 'checked' : '')); ?>> APP
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>5. Consumed Buy Leads Detail</h6>
            </div>
            <p>Get Detail of Buy Leads you have consumed</p>
            <input type="radio" name="consumed_buyer_from" value="Call" <?php echo e(($user->consumed_buyer_from == 'Call' ? 'checked' : '')); ?>> Call<br>
            <input type="radio" name="consumed_buyer_from" value="Email" <?php echo e(($user->consumed_buyer_from == 'Email' ? 'checked' : '')); ?>> Email<br>
            <input type="radio" name="consumed_buyer_from" value="SMS" <?php echo e(($user->consumed_buyer_from == 'SMS' ? 'checked' : '')); ?>> SMS<br>
            <input type="radio" name="consumed_buyer_from" value="APP" <?php echo e(($user->consumed_buyer_from == 'APP' ? 'checked' : '')); ?>> APP
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>6. Deactivate Account</h6>
            </div>
            <select class="form-control" id="deactivate_account" name="deactivate_account">
              <option value="BUSINESS SHUTDOWN" <?php echo e(($user->deactivate_account == 'BUSINESS SHUTDOWN' ? 'selected' : '')); ?>>BUSINESS SHUTDOWN </option>
              <option value="SERVICE IS NOT SATISFECTORY" <?php echo e(($user->deactivate_account == 'SERVICE IS NOT SATISFECTORY' ? 'selected' : '')); ?>>SERVICE IS NOT SATISFECTORY</option>
              <option value="I DO NOT WANT TO CONTINUE WITH VENICE RED" <?php echo e(($user->deactivate_account == 'I DO NOT WANT TO CONTINUE WITH VENICE RED' ? 'selected' : '')); ?>>I DO NOT WANT TO CONTINUE WITH VENICE RED</option>
              <option value="DOCUMENT ISSUE" <?php echo e(($user->deactivate_account == 'DOCUMENT ISSUE' ? 'selected' : '')); ?>>DOCUMENT ISSUE </option>
              <option value="OTHERS" <?php echo e(($user->deactivate_account == 'OTHERS' ? 'selected' : '')); ?>>OTHERS </option>
            </select>
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>7. Venice Red New Offers</h6>
            </div>
            <p>To help you grow your business with newly launched products and services</p>
            <input type="radio" name="new_offer" value="Call" <?php echo e(($user->new_offer == 'Call' ? 'checked' : '')); ?>> Call<br>
            <input type="radio" name="new_offer" value="Email" <?php echo e(($user->new_offer == 'Email' ? 'checked' : '')); ?>> Email<br>
            <input type="radio" name="new_offer" value="SMS" <?php echo e(($user->new_offer == 'SMS' ? 'checked' : '')); ?>> SMS<br>
            <input type="radio" name="new_offer"value="APP" <?php echo e(($user->new_offer == 'APP' ? 'checked' : '')); ?>> APP
          </div>
          <div class="col-sm-12 text-center mb-4">
            <button class="btn btn-success" type="submit">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php echo $__env->make('vendor-dash.bottom-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ltqh13w2vszk/public_html/text/resources/views/vendor-dash/notification.blade.php ENDPATH**/ ?>