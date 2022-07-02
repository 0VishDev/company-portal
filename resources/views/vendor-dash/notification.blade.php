@include('vendor-dash.left-panel')

  <div class="container ven-dash">
    <div class="bg-white pt-4 pl-2 pr-2 text-center">
      <div class="row">
        <div class="col-sm-12 mb-3">
          <h3 class="pb-2">Notification Setting</h3>
        </div>
      </div>
    </div>
    <form class="bg-white p-3 mt-4 noti" action="{{ url('/vendor/notification/update') }}" method="POST">
      @csrf
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mb-4">
            <h5>Business Enquiries</h5>
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>1. Send By Inquiries</h6>
            </div>
            <input type="radio" name="send_inquiry" value="Call" {{ ($user->send_inquiry == 'Call' ? 'checked' : '') }}> Call<br>
            <input type="radio" name="send_inquiry" value="Email" {{ ($user->send_inquiry == 'Email' ? 'checked' : '') }}> Email<br>
            <input type="radio" name="send_inquiry" value="SMS" {{ ($user->send_inquiry == 'SMS' ? 'checked' : '') }}> SMS<br>
            <input type="radio" name="send_inquiry" value="SMS" {{ ($user->send_inquiry == 'SMS' ? 'checked' : '') }}> App
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>2. Follow Up Remainders</h6>
            </div>
            <input type="radio" name="follow_up_remainder" value="Call" {{ ($user->follow_up_remainder == 'Call' ? 'checked' : '') }}> Call<br>
            <input type="radio" name="follow_up_remainder" value="Email" {{ ($user->follow_up_remainder == 'Email' ? 'checked' : '') }}> Email<br>
            <input type="radio" name="follow_up_remainder" value="SMS" {{ ($user->follow_up_remainder == 'SMS' ? 'checked' : '') }}> SMS<br>
            <input type="radio" name="follow_up_remainder" value="APP" {{ ($user->follow_up_remainder == 'APP' ? 'checked' : '') }}> App
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>3. Buy Leads</h6>
            </div>
            <p>I Want Buyers From</p>
            <input type="radio" name="buyer_from" value="Only International" {{ ($user->buyer_from == 'Only International' ? 'checked' : '') }}> Only International<br>
            <input type="radio" name="buyer_from" value="Only India" {{ ($user->buyer_from == 'Only India' ? 'checked' : '') }}> Only India<br>
            <input type="radio" name="buyer_from" value="All (International + Domestic)" {{ ($user->buyer_from == 'All (International + Domestic)' ? 'checked' : '') }}> All (International + Domestic)
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>4. Letest Buy Leads</h6>
            </div>
            <p>Get Notified on Latest Buy Leads</p>
            <input type="radio" name="latest_buyer_from" value="Call" {{ ($user->latest_buyer_from == 'Call' ? 'checked' : '') }}> Call<br>
            <input type="radio" name="latest_buyer_from" value="Email" {{ ($user->latest_buyer_from == 'Email' ? 'checked' : '') }}> Email<br>
            <input type="radio" name="latest_buyer_from" value="SMS" {{ ($user->latest_buyer_from == 'SMS' ? 'checked' : '') }}> SMS<br>
            <input type="radio" name="latest_buyer_from " value="APP" {{ ($user->latest_buyer_from == 'APP' ? 'checked' : '') }}> APP
          </div>
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>5. Consumed Buy Leads Detail</h6>
            </div>
            <p>Get Detail of Buy Leads you have consumed</p>
            <input type="radio" name="consumed_buyer_from" value="Call" {{ ($user->consumed_buyer_from == 'Call' ? 'checked' : '') }}> Call<br>
            <input type="radio" name="consumed_buyer_from" value="Email" {{ ($user->consumed_buyer_from == 'Email' ? 'checked' : '') }}> Email<br>
            <input type="radio" name="consumed_buyer_from" value="SMS" {{ ($user->consumed_buyer_from == 'SMS' ? 'checked' : '') }}> SMS<br>
            <input type="radio" name="consumed_buyer_from" value="APP" {{ ($user->consumed_buyer_from == 'APP' ? 'checked' : '') }}> APP
          </div>
          {{--<div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>6. Deactivate Account</h6>
            </div>
            <select class="form-control" id="deactivate_account" name="deactivate_account">
              <option value="BUSINESS SHUTDOWN" {{ ($user->deactivate_account == 'BUSINESS SHUTDOWN' ? 'selected' : '') }}>BUSINESS SHUTDOWN </option>
              <option value="SERVICE IS NOT SATISFECTORY" {{ ($user->deactivate_account == 'SERVICE IS NOT SATISFECTORY' ? 'selected' : '') }}>SERVICE IS NOT SATISFECTORY</option>
              <option value="I DO NOT WANT TO CONTINUE WITH Business World Trade" {{ ($user->deactivate_account == 'I DO NOT WANT TO CONTINUE WITH Business World Trade' ? 'selected' : '') }}>I DO NOT WANT TO CONTINUE WITH Business World Trade</option>
              <option value="DOCUMENT ISSUE" {{ ($user->deactivate_account == 'DOCUMENT ISSUE' ? 'selected' : '') }}>DOCUMENT ISSUE </option>
              <option value="OTHERS" {{ ($user->deactivate_account == 'OTHERS' ? 'selected' : '') }}>OTHERS </option>
            </select>
          </div>--}}
          <div class="col-sm-6 mb-4">
            <div class="heading">
              <h6>7. Business World Trade New Offers</h6>
            </div>
            <p>To help you grow your business with newly launched products and services</p>
            <input type="radio" name="new_offer" value="Call" {{ ($user->new_offer == 'Call' ? 'checked' : '') }}> Call<br>
            <input type="radio" name="new_offer" value="Email" {{ ($user->new_offer == 'Email' ? 'checked' : '') }}> Email<br>
            <input type="radio" name="new_offer" value="SMS" {{ ($user->new_offer == 'SMS' ? 'checked' : '') }}> SMS<br>
            <input type="radio" name="new_offer"value="APP" {{ ($user->new_offer == 'APP' ? 'checked' : '') }}> APP
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
@include('vendor-dash.bottom-links')