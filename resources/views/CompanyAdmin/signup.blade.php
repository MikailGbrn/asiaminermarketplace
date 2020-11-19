
<!DOCTYPE html>
<html lang="en">
  @include('CompanyAdmin.fragment.style')
    
  <body class="bg-light">

    <div class="site-section">
      <div class="container">
        <div class="row mt-5">
          {{-- <div class="row">
            <div class="col-md-6">
              
            </div>
          </div --}}
          <div class="col-md-1"></div>
          <div class="col-md-10 mb-5">
            @if ($errors->any())
                    @foreach ($errors->all() as $error)
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{$error}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endforeach
            @endif
            

            <form action="" method="post" class="p-5 bg-white">
              @csrf
              <div class="mb-4">
                <a href="{{url('/company/login')}}"><span class="icon-arrow-left mr-3"></span>Go Back to login</a>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mt-4">
                  <h4 style="text-align: left;"><b>Company Credential</b> </h4>
                  <h6>This section will use for company account login</h6>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Name</label>
                  <input type="text" id="fname" name="name_user" value="{{ old('name_user') }}" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Email Address</label> 
                  <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Re-type Email Address</label> 
                  <input type="email" id="email" name="email_confirmation" value="{{ old('email_confirmation') }}" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Password</label> 
                  <input type="password" name="password" id="pass1" value="{{ old('password') }}" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Re-type Password</label> 
                  <input type="password" id="pass2" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" required="">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mt-4">
                  <h4 style="text-align: left;"><b>Company Detail</b> </h4>
                  <h6>This section will show in profile company</h6>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Company Name</label> 
                  <input type="text" id="companyname" name="name" value="{{ old('name') }}" class="form-control" required="">
                </div>   
              </div>
              
              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Email</label> 
                  <input type="email" id="companyname" name="company_email" value="{{ old('company_email') }}" class="form-control" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Website</label> 
                  <input type="text" id="pnumber" name="company_website" value="{{ old('company_website') }}" class="form-control" required="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Business Hour</label>
                  <div class="input-group">
                    
                    <input type="time" name="company_business_hour_start" value="{{ old('company_business_hour_start') }}" class="form-control">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">-</span>
                    </div>
                    <input type="time" name="company_business_hour_until" value="{{ old('company_business_hour_until') }}" class="form-control">
                  </div> 
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Company Phone Number</label> 
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <select name="company_phone_code" class="selectpicker form-control" data-live-search="true">
                        <option selected disabled value="">Country Code</option>
                        <option data-countryCode="DZ" data-subtext="" value="213">Algeria (+213)</option>
                        <option data-countryCode="AD" value="376">Andorra (+376)</option>
                        <option data-countryCode="AO" value="244">Angola (+244)</option>
                        <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                        <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                        <option data-countryCode="AR" value="54">Argentina (+54)</option>
                        <option data-countryCode="AM" value="374">Armenia (+374)</option>
                        <option data-countryCode="AW" value="297">Aruba (+297)</option>
                        <option data-countryCode="AU" value="61">Australia (+61)</option>
                        <option data-countryCode="AT" value="43">Austria (+43)</option>
                        <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                        <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                        <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                        <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                        <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                        <option data-countryCode="BY" value="375">Belarus (+375)</option>
                        <option data-countryCode="BE" value="32">Belgium (+32)</option>
                        <option data-countryCode="BZ" value="501">Belize (+501)</option>
                        <option data-countryCode="BJ" value="229">Benin (+229)</option>
                        <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                        <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                        <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                        <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                        <option data-countryCode="BW" value="267">Botswana (+267)</option>
                        <option data-countryCode="BR" value="55">Brazil (+55)</option>
                        <option data-countryCode="BN" value="673">Brunei (+673)</option>
                        <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                        <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                        <option data-countryCode="BI" value="257">Burundi (+257)</option>
                        <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                        <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                        <option data-countryCode="CA" value="1">Canada (+1)</option>
                        <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                        <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                        <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                        <option data-countryCode="CL" value="56">Chile (+56)</option>
                        <option data-countryCode="CN" value="86">China (+86)</option>
                        <option data-countryCode="CO" value="57">Colombia (+57)</option>
                        <option data-countryCode="KM" value="269">Comoros (+269)</option>
                        <option data-countryCode="CG" value="242">Congo (+242)</option>
                        <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                        <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                        <option data-countryCode="HR" value="385">Croatia (+385)</option>
                        <option data-countryCode="CU" value="53">Cuba (+53)</option>
                        <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                        <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                        <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                        <option data-countryCode="DK" value="45">Denmark (+45)</option>
                        <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                        <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                        <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                        <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                        <option data-countryCode="EG" value="20">Egypt (+20)</option>
                        <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                        <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                        <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                        <option data-countryCode="EE" value="372">Estonia (+372)</option>
                        <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                        <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                        <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                        <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                        <option data-countryCode="FI" value="358">Finland (+358)</option>
                        <option data-countryCode="FR" value="33">France (+33)</option>
                        <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                        <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                        <option data-countryCode="GA" value="241">Gabon (+241)</option>
                        <option data-countryCode="GM" value="220">Gambia (+220)</option>
                        <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                        <option data-countryCode="DE" value="49">Germany (+49)</option>
                        <option data-countryCode="GH" value="233">Ghana (+233)</option>
                        <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                        <option data-countryCode="GR" value="30">Greece (+30)</option>
                        <option data-countryCode="GL" value="299">Greenland (+299)</option>
                        <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                        <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                        <option data-countryCode="GU" value="671">Guam (+671)</option>
                        <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                        <option data-countryCode="GN" value="224">Guinea (+224)</option>
                        <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                        <option data-countryCode="GY" value="592">Guyana (+592)</option>
                        <option data-countryCode="HT" value="509">Haiti (+509)</option>
                        <option data-countryCode="HN" value="504">Honduras (+504)</option>
                        <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                        <option data-countryCode="HU" value="36">Hungary (+36)</option>
                        <option data-countryCode="IS" value="354">Iceland (+354)</option>
                        <option data-countryCode="IN" value="91">India (+91)</option>
                        <option data-countryCode="ID" value="62" selected>Indonesia (+62)</option>
                        <option data-countryCode="IR" value="98">Iran (+98)</option>
                        <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                        <option data-countryCode="IE" value="353">Ireland (+353)</option>
                        <option data-countryCode="IL" value="972">Israel (+972)</option>
                        <option data-countryCode="IT" value="39">Italy (+39)</option>
                        <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                        <option data-countryCode="JP" value="81">Japan (+81)</option>
                        <option data-countryCode="JO" value="962">Jordan (+962)</option>
                        <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                        <option data-countryCode="KE" value="254">Kenya (+254)</option>
                        <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                        <option data-countryCode="KP" value="850">Korea North (+850)</option>
                        <option data-countryCode="KR" value="82">Korea South (+82)</option>
                        <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                        <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                        <option data-countryCode="LA" value="856">Laos (+856)</option>
                        <option data-countryCode="LV" value="371">Latvia (+371)</option>
                        <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                        <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                        <option data-countryCode="LR" value="231">Liberia (+231)</option>
                        <option data-countryCode="LY" value="218">Libya (+218)</option>
                        <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                        <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                        <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                        <option data-countryCode="MO" value="853">Macao (+853)</option>
                        <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                        <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                        <option data-countryCode="MW" value="265">Malawi (+265)</option>
                        <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                        <option data-countryCode="MV" value="960">Maldives (+960)</option>
                        <option data-countryCode="ML" value="223">Mali (+223)</option>
                        <option data-countryCode="MT" value="356">Malta (+356)</option>
                        <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                        <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                        <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                        <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                        <option data-countryCode="MX" value="52">Mexico (+52)</option>
                        <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                        <option data-countryCode="MD" value="373">Moldova (+373)</option>
                        <option data-countryCode="MC" value="377">Monaco (+377)</option>
                        <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                        <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                        <option data-countryCode="MA" value="212">Morocco (+212)</option>
                        <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                        <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                        <option data-countryCode="NA" value="264">Namibia (+264)</option>
                        <option data-countryCode="NR" value="674">Nauru (+674)</option>
                        <option data-countryCode="NP" value="977">Nepal (+977)</option>
                        <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                        <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                        <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                        <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                        <option data-countryCode="NE" value="227">Niger (+227)</option>
                        <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                        <option data-countryCode="NU" value="683">Niue (+683)</option>
                        <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                        <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                        <option data-countryCode="NO" value="47">Norway (+47)</option>
                        <option data-countryCode="OM" value="968">Oman (+968)</option>
                        <option data-countryCode="PW" value="680">Palau (+680)</option>
                        <option data-countryCode="PA" value="507">Panama (+507)</option>
                        <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                        <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                        <option data-countryCode="PE" value="51">Peru (+51)</option>
                        <option data-countryCode="PH" value="63">Philippines (+63)</option>
                        <option data-countryCode="PL" value="48">Poland (+48)</option>
                        <option data-countryCode="PT" value="351">Portugal (+351)</option>
                        <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                        <option data-countryCode="QA" value="974">Qatar (+974)</option>
                        <option data-countryCode="RE" value="262">Reunion (+262)</option>
                        <option data-countryCode="RO" value="40">Romania (+40)</option>
                        <option data-countryCode="RU" value="7">Russia (+7)</option>
                        <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                        <option data-countryCode="SM" value="378">San Marino (+378)</option>
                        <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                        <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                        <option data-countryCode="SN" value="221">Senegal (+221)</option>
                        <option data-countryCode="CS" value="381">Serbia (+381)</option>
                        <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                        <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                        <option data-countryCode="SG" value="65">Singapore (+65)</option>
                        <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                        <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                        <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                        <option data-countryCode="SO" value="252">Somalia (+252)</option>
                        <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                        <option data-countryCode="ES" value="34">Spain (+34)</option>
                        <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                        <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                        <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                        <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                        <option data-countryCode="SD" value="249">Sudan (+249)</option>
                        <option data-countryCode="SR" value="597">Suriname (+597)</option>
                        <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                        <option data-countryCode="SE" value="46">Sweden (+46)</option>
                        <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                        <option data-countryCode="SI" value="963">Syria (+963)</option>
                        <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                        <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                        <option data-countryCode="TH" value="66">Thailand (+66)</option>
                        <option data-countryCode="TG" value="228">Togo (+228)</option>
                        <option data-countryCode="TO" value="676">Tonga (+676)</option>
                        <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                        <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                        <option data-countryCode="TR" value="90">Turkey (+90)</option>
                        <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                        <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                        <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                        <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                        <option data-countryCode="UG" value="256">Uganda (+256)</option>
                        <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                        <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                        <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                        <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                        <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                        <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                        <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                        <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                        <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                        <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                        <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                        <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                        <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                        <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                        <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                        <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                        <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                      </select>
                    </div>
                    <input type="tel" id="pnumber" class="form-control" value="{{ old('company_phone') }}" name="company_phone" required="">
                  </div>
                </div>
              </div>
              
  

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Region</label> 
                  <select class="selectpicker form-control" name="company_region" data-live-search="true" id="" required="">
                        <option value="">Select region</option>
                        <option value="">Asia</option>
                        <option value="">Asia/Pacific</option>
                        <option value="">Africa</option>
                        <option value="">Europe</option>
                        <option value="">Middle East</option>
                        <option value="">North America</option>
                        <option value="">South &amp; Central America</option>
                      </select>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Country</label>
                  <select name="company_country" class="selectpicker countries form-control" data-live-search="true" id="countryId"> 
                    <option value="">Select Country</option>
                  </select>
                </div>
                
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">State</label>
                  <select name="company_province" class="selectpicker states form-control" data-live-search="true" id="stateId"> 
                    <option value="">Select State</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">City</label>
                  <select name="company_city" class="selectpicker cities form-control" data-live-search="true" id="cityId"> 
                    <option value="">Select city</option>
                    @if(old('company_city')))
                    <option value="{{old('company_city')}}">{{old('company_city')}}</option>
                    @endif
                  </select>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="email">Address</label> 
                  <input type="text" id="adress" class="form-control" value="{{ old('company_address') }}" name="company_address" required="">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Zip / Postal Code</label> 
                  <input type="text" id="postcode" name="company_postal_code" value="{{ old('company_postal_code') }}" class="form-control" required="">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Description</label> 
                  <textarea class="form-control" required="" name="company_description">{{ old('company_description') }}</textarea>
                </div>
              </div>
              <input type="checkbox" required="" id="agree" name="agree" value="agree">
              <label for="agree">I Agree to The Terms and Condition</label>

              <div class="row form-group">
                <input type="submit" value="Register" class="btn btn-primary btn-md text-white mb-3 mt-2">
              </div>
              
  
            </form>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>

    @include('CompanyAdmin.fragment.js')
    <script>
      function ajaxCall() {
    this.send = function(data, url, method, success, type) {
        type = type||'json';
        var successRes = function(data) {
            success(data);
        }

        var errorRes = function(e) {
            console.log(e);
        }
        jQuery.ajax({
            url: url,
            type: method,
            data: data,
            success: successRes,
            error: errorRes,
            dataType: type,
            timeout: 60000
        });

    }

}

function locationInfo() {
    var rootUrl = "https://geodata.solutions/api/api.php";
    //now check for set values
    var addParams = '';
    if(jQuery("#gds_appid").length > 0) {
        addParams += '&appid=' + jQuery("#gds_appid").val();
    }
    if(jQuery("#gds_hash").length > 0) {
        addParams += '&hash=' + jQuery("#gds_hash").val();
    }

    var call = new ajaxCall();

    this.confCity = function(id) {
        var url = rootUrl+'?type=confCity&countryId='+ jQuery('#countryId option:selected').attr('countryid') +'&stateId=' + jQuery('#stateId option:selected').attr('stateid') + '&cityId=' + id;
        var method = "post";
        var data = {};
        call.send(data, url, method, function(data) {
        });
    };


    this.getCities = function(id) {
        jQuery(".cities option:gt(0)").remove();
        var stateClasses = jQuery('#cityId').attr('class');

        var cC = stateClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }
        var url = rootUrl+'?type=getCities&countryId='+ jQuery('#countryId option:selected').attr('countryid') +'&stateId=' + id + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.cities').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.cities').find("option:eq(0)").html("Select City");
            if(data.tp == 1){
                var listlen = Object.keys(data['result']).length;

                if(listlen > 0)
                {
                    jQuery.each(data['result'], function(key, val) {

                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        jQuery('.cities').append(option);
                    });
                    $('#cityId').selectpicker('refresh');
                }
                else
                {
                    var usestate = jQuery('#stateId option:selected').val();
                    var option = jQuery('<option />');
                    option.attr('value', usestate).text(usestate);
                    option.attr('selected', 'selected');
                    jQuery('.cities').append(option);
                }

                jQuery(".cities").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

    this.getStates = function(id) {
        jQuery(".states option:gt(0)").remove();
        jQuery(".cities option:gt(0)").remove();
        //get additional fields
        var stateClasses = jQuery('#stateId').attr('class');

        var cC = stateClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }
        var url = rootUrl+'?type=getStates&countryId=' + id + addParams  + addClasses;
        var method = "post";
        var data = {};
        jQuery('.states').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.states').find("option:eq(0)").html("Select State");
            if(data.tp == 1){
                jQuery.each(data['result'], function(key, val) {
                    var option = jQuery('<option />');
                    option.attr('value', val).text(val);
                    option.attr('stateid', key);
                    jQuery('.states').append(option);
                });
                $('#stateId').selectpicker('refresh');
                jQuery(".states").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

    this.getCountries = function() {
        //get additional fields
        var countryClasses = jQuery('#countryId').attr('class');

        var cC = countryClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if(cC.length > 0)
        {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }

        var presel = false;
        var iip = 'N';
        jQuery.each(cC, function( index, value ) {
            if (value.match("^presel-")) {
                presel = value.substring(7);

            }
            if(value.match("^presel-byi"))
            {
                var iip = 'Y';
            }
        });


        var url = rootUrl+'?type=getCountries' + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.countries').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.countries').find("option:eq(0)").html("Select Country");

            if(data.tp == 1){
                if(presel == 'byip')
                {
                    presel = data['presel'];
                    console.log('2 presel is set as ' + presel);
                }


                if(jQuery.inArray("group-continents",cC) > -1)
                {
                    var $select = jQuery('.countries');
                    console.log(data['result']);
                    jQuery.each(data['result'], function(i, optgroups) {
                        var $optgroup = jQuery("<optgroup>", {label: i});
                        if(optgroups.length > 0)
                        {
                            $optgroup.appendTo($select);
                        }

                        jQuery.each(optgroups, function(groupName, options) {
                            var coption = jQuery('<option />');
                            coption.attr('value', options.name).text(options.name);
                            coption.attr('countryid', options.id);
                            
                            if(presel) {
                                if (presel.toUpperCase() == options.id) {
                                    coption.attr('selected', 'selected');
                                }
                            }
                            coption.appendTo($optgroup);
                        });
                    });
                }
                else
                {
                    jQuery.each(data['result'], function(key, val) {
                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        option.attr('countryid', key);

                        if(option.attr('value') == '{{old('company_country')}}') {
    
                          option.attr('selected', 'selected');

                        }
                        jQuery('.countries').append(option);
                       
                    });
                    $('#countryId').selectpicker('refresh');
                }
                if(presel)
                {
                    jQuery('.countries').trigger('change');
                }
                jQuery(".countries").prop("disabled",false);
            }
            else{
                alert(data.msg);
            }
        });
    };

}

jQuery(function() {
    var loc = new locationInfo();
    loc.getCountries();
    jQuery(".countries").on("change", function(ev) {
        var countryId = jQuery("option:selected", this).attr('countryid');
        if(countryId != ''){
            loc.getStates(countryId);
        }
        else{
            jQuery(".states option:gt(0)").remove();
        }
    });
    jQuery(".states").on("change", function(ev) {
        var stateId = jQuery("option:selected", this).attr('stateid');
        if(stateId != ''){
            loc.getCities(stateId);
        }
        else{
            jQuery(".cities option:gt(0)").remove();
        }
    });

    jQuery(".cities").on("change", function(ev) {
        var cityId = jQuery("option:selected", this).val();
        if(cityId != ''){
            loc.confCity(cityId);
        }
    });
});
    </script>

  </body>
</html>