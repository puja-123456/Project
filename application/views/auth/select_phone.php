
<select class="country" id="country" name="country" required>
  <!-- Countries often selected by users can be moved to the top of the list. -->
  <!-- Countries known to be subject to general US embargo are commented out by default. -->
  <!-- The data-countryCode attribute is populated with ISO country code, and value is int'l calling code. -->


  <option value="" selected>Select Country</option>
  <option value="India" <?php if($this->input->post('country')=="India"){ echo "selected"; }?> data-value="+91">India (+91)</option>
  <option value="Algeria" <?php if($this->input->post('country')=="Algeria"){ echo "selected"; }?> data-value="+213">Algeria (+213)</option>
  <option value="Andorra" <?php if($this->input->post('country')=="Andorra"){ echo "selected"; }?> data-value="+376">Andorra (+376)</option>
  <option value="Angola" <?php if($this->input->post('country')=="Angola"){ echo "selected"; }?> data-value="+244">Angola (+244)</option>
  <option value="Anguilla" <?php if($this->input->post('country')=="Anguilla"){ echo "selected"; }?> data-value="+1264">Anguilla (+1264)</option>
  <option value="Antigua &amp; Barbuda" <?php if($this->input->post('country')=="Antigua & Barbuda"){ echo "selected"; }?> data-value="+1268">Antigua &amp; Barbuda (+1268)</option>
  <option value="Argentina" <?php if($this->input->post('country')=="Argentina"){ echo "selected"; }?> data-value="+54">Argentina (+54)</option>
  <option value="Armenia" <?php if($this->input->post('country')=="Armenia"){ echo "selected"; }?> data-value="+374">Armenia (+374)</option>
  <option value="Aruba" <?php if($this->input->post('country')=="Aruba"){ echo "selected"; }?> data-value="+297">Aruba (+297)</option>
  <option value="Australia" <?php if($this->input->post('country')=="Australia"){ echo "selected"; }?> data-value="+61">Australia (+61)</option>
  <option value="Austria" <?php if($this->input->post('country')=="Austria"){ echo "selected"; }?> data-value="+43">Austria (+43)</option>
  <option value="Azerbaijan" <?php if($this->input->post('country')=="Azerbaijan"){ echo "selected"; }?> data-value="+994">Azerbaijan (+994)</option>
  <option value="Bahamas" <?php if($this->input->post('country')=="Bahamas"){ echo "selected"; }?> data-value="+1242">Bahamas (+1242)</option>
  <option value="Bahrain" <?php if($this->input->post('country')=="Bahrain"){ echo "selected"; }?> data-value="+973">Bahrain (+973)</option>
  <option value="Bangladesh" <?php if($this->input->post('country')=="Bangladesh"){ echo "selected"; }?> data-value="+880">Bangladesh (+880)</option>
  <option value="Barbados" <?php if($this->input->post('country')=="Barbados"){ echo "selected"; }?> data-value="+1246">Barbados (+1246)</option>
  <option value="Belarus" <?php if($this->input->post('country')=="Belarus"){ echo "selected"; }?> data-value="+375">Belarus (+375)</option>
  <option value="Belgium" <?php if($this->input->post('country')=="Belgium"){ echo "selected"; }?> data-value="+32">Belgium (+32)</option>
  <option value="Belize" <?php if($this->input->post('country')=="Belize"){ echo "selected"; }?> data-value="+501">Belize (+501)</option>
  <option value="Benin" <?php if($this->input->post('country')=="Benin"){ echo "selected"; }?> data-value="+229">Benin (+229)</option>
  <option value="Bermuda" <?php if($this->input->post('country')=="Bermuda"){ echo "selected"; }?> data-value="+1441">Bermuda (+1441)</option>
  <option value="Bhutan" <?php if($this->input->post('country')=="Bhutan"){ echo "selected"; }?> data-value="+975">Bhutan (+975)</option>
  <option value="Bolivia" <?php if($this->input->post('country')=="Bolivia"){ echo "selected"; }?> data-value="+591">Bolivia (+591)</option>
  <option value="Bosnia Herzegovina" <?php if($this->input->post('country')=="Bosnia Herzegovina"){ echo "selected"; }?> data-value="+387">Bosnia Herzegovina (+387)</option>
  <option value="Botswana" <?php if($this->input->post('country')=="Botswana"){ echo "selected"; }?> data-value="+267">Botswana (+267)</option>
  <option value="Brazil" <?php if($this->input->post('country')=="Brazil"){ echo "selected"; }?> data-value="+55">Brazil (+55)</option>
  <option value="Brunei" <?php if($this->input->post('country')=="Brunei"){ echo "selected"; }?> data-value="+673">Brunei (+673)</option>
  <option value="Bulgaria" <?php if($this->input->post('country')=="Bulgaria"){ echo "selected"; }?> data-value="+359">Bulgaria (+359)</option>
  <option value="Burkina Faso" <?php if($this->input->post('country')=="Burkina Faso"){ echo "selected"; }?> data-value="+226">Burkina Faso (+226)</option>
  <option value="Burundi" <?php if($this->input->post('country')=="Burundi"){ echo "selected"; }?> data-value="+257">Burundi (+257)</option>
  <option value="Cambodia" <?php if($this->input->post('country')=="Cambodia"){ echo "selected"; }?> data-value="+855">Cambodia (+855)</option>
  <option value="Cameroon" <?php if($this->input->post('country')=="Cameroon"){ echo "selected"; }?> data-value="+237">Cameroon (+237)</option>
  <option value="Canada" <?php if($this->input->post('country')=="Canada"){ echo "selected"; }?> data-value="+1">Canada (+1)</option>
  <option value="Cape Verde Islands" <?php if($this->input->post('country')=="Cape Verde Islands"){ echo "selected"; }?> data-value="+238">Cape Verde Islands (+238)</option>
  <option value="Cayman Islands" <?php if($this->input->post('country')=="Cayman Islands"){ echo "selected"; }?> data-value="+1345">Cayman Islands (+1345)</option>
  <option value="Central African Republic" <?php if($this->input->post('country')=="Central African Republic"){ echo "selected"; }?> data-value="+236">Central African Republic (+236)</option>
  <option value="Chile" <?php if($this->input->post('country')=="Chile"){ echo "selected"; }?> data-value="+56">Chile (+56)</option>
  <option value="China" <?php if($this->input->post('country')=="China"){ echo "selected"; }?> data-value="+86">China (+86)</option>
  <option value="Colombia" <?php if($this->input->post('country')=="Colombia"){ echo "selected"; }?> data-value="+57">Colombia (+57)</option>
  <option value="Comoros" <?php if($this->input->post('country')=="Comoros"){ echo "selected"; }?> data-value="+269">Comoros (+269)</option>
  <option value="Congo" <?php if($this->input->post('country')=="Congo"){ echo "selected"; }?> data-value="+242">Congo (+242)</option>
  <option value="Cook Islands" <?php if($this->input->post('country')=="Cook Islands"){ echo "selected"; }?> data-value="+682">Cook Islands (+682)</option>
  <option value="Costa Rica" <?php if($this->input->post('country')=="Costa Rica"){ echo "selected"; }?> data-value="+506">Costa Rica (+506)</option>
  <option value="Croatia" <?php if($this->input->post('country')=="Croatia"){ echo "selected"; }?> data-value="+385">Croatia (+385)</option>
  <option value="Cuba" <?php if($this->input->post('country')=="Cuba"){ echo "selected"; }?> data-value="+53">Cuba (+53)</option>
  <option value="Cyprus - North" <?php if($this->input->post('country')=="Cyprus - North"){ echo "selected"; }?> data-value="+90">Cyprus - North (+90)</option>
  <option value="Cyprus - South" <?php if($this->input->post('country')=="Cyprus - South"){ echo "selected"; }?> data-value="+357">Cyprus - South (+357)</option>
  <option value="Czech Republic" <?php if($this->input->post('country')=="Czech Republic"){ echo "selected"; }?> data-value="+420">Czech Republic (+420)</option>
  <option value="Denmark" <?php if($this->input->post('country')=="Denmark"){ echo "selected"; }?> data-value="+45">Denmark (+45)</option>
  <option value="Djibouti" <?php if($this->input->post('country')=="+Djibouti"){ echo "selected"; }?> data-value="+253">Djibouti (+253)</option>
  <option value="Dominica" <?php if($this->input->post('country')=="Dominica"){ echo "selected"; }?> data-value="+1809">Dominica (+1809)</option>
  <option value="Dominican Republic" <?php if($this->input->post('country')=="Dominican Republic"){ echo "selected"; }?> data-value="+1809">Dominican Republic (+1809)</option>
  <option value="Ecuador" <?php if($this->input->post('country')=="Ecuador"){ echo "selected"; }?> data-value="+593">Ecuador (+593)</option>
  <option value="Egypt" <?php if($this->input->post('country')=="Egypt"){ echo "selected"; }?> data-value="+20">Egypt (+20)</option>
  <option value="El Salvador" <?php if($this->input->post('country')=="El Salvador"){ echo "selected"; }?> data-value="+503">El Salvador (+503)</option>
  <option value="Equatorial Guinea" <?php if($this->input->post('country')=="Equatorial Guinea"){ echo "selected"; }?> data-value="+240">Equatorial Guinea (+240)</option>
  <option value="Eritrea" <?php if($this->input->post('country')=="Eritrea"){ echo "selected"; }?> data-value="+291">Eritrea (+291)</option>
  <option value="Estonia" <?php if($this->input->post('country')=="Estonia"){ echo "selected"; }?> data-value="+372">Estonia (+372)</option>
  <option value="Ethiopia" <?php if($this->input->post('country')=="Ethiopia"){ echo "selected"; }?> data-value="+251">Ethiopia (+251)</option>
  <option value="Falkland Islands" <?php if($this->input->post('country')=="Falkland Islands"){ echo "selected"; }?> data-value="+500">Falkland Islands (+500)</option>
  <option value="Faroe Islands" <?php if($this->input->post('country')=="Faroe Islands"){ echo "selected"; }?> data-value="+298">Faroe Islands (+298)</option>
  <option value="Fiji" <?php if($this->input->post('country')=="Fiji"){ echo "selected"; }?> data-value="+679">Fiji (+679)</option>
  <option value="Finland" <?php if($this->input->post('country')=="Finland"){ echo "selected"; }?> data-value="+358">Finland (+358)</option>
  <option value="France" <?php if($this->input->post('country')=="France"){ echo "selected"; }?> data-value="+33">France (+33)</option>
  <option value="French Guiana" <?php if($this->input->post('country')=="French Guiana"){ echo "selected"; }?> data-value="+594">French Guiana (+594)</option>
  <option value="French Polynesia" <?php if($this->input->post('country')=="French Polynesia"){ echo "selected"; }?> data-value="+689">French Polynesia (+689)</option>
  <option value="Gabon" <?php if($this->input->post('country')=="Gabon"){ echo "selected"; }?> data-value="+241">Gabon (+241)</option>
  <option value="Gambia" <?php if($this->input->post('country')=="Gambia"){ echo "selected"; }?> data-value="+220">Gambia (+220)</option>
  <option value="Georgia" <?php if($this->input->post('country')=="Georgia"){ echo "selected"; }?> data-value="+7880">Georgia (+7880)</option>
  <option value="Germany" <?php if($this->input->post('country')=="Germany"){ echo "selected"; }?> data-value="+49">Germany (+49)</option>
  <option value="Ghana" <?php if($this->input->post('country')=="Ghana"){ echo "selected"; }?> data-value="+233">Ghana (+233)</option>
  <option value="Gibraltar" <?php if($this->input->post('country')=="Gibraltar"){ echo "selected"; }?> data-value="+350">Gibraltar (+350)</option>
  <option value="Greece" <?php if($this->input->post('country')=="Greece"){ echo "selected"; }?> data-value="+30">Greece (+30)</option>
  <option value="Greenland" <?php if($this->input->post('country')=="Greenland"){ echo "selected"; }?> data-value="+299">Greenland (+299)</option>
  <option value="Grenada" <?php if($this->input->post('country')=="Grenada"){ echo "selected"; }?> data-value="+1473">Grenada (+1473)</option>
  <option value="Guadeloupe" <?php if($this->input->post('country')=="Guadeloupe"){ echo "selected"; }?> data-value="+590">Guadeloupe (+590)</option>
  <option value="Guam" <?php if($this->input->post('country')=="Guam"){ echo "selected"; }?> data-value="+671">Guam (+671)</option>
  <option value="Guatemala" <?php if($this->input->post('country')=="Guatemala"){ echo "selected"; }?> data-value="+502">Guatemala (+502)</option>
  <option value="Guinea" <?php if($this->input->post('country')=="Guinea"){ echo "selected"; }?> data-value="+224">Guinea (+224)</option>
  <option value="Guinea - Bissau" <?php if($this->input->post('country')=="Guinea - Bissau"){ echo "selected"; }?> data-value="+245">Guinea - Bissau (+245)</option>
  <option value="Guyana" <?php if($this->input->post('country')=="+592"){ echo "selected"; }?> data-value="+592">Guyana (+592)</option>
  <option value="Haiti" <?php if($this->input->post('country')=="Guyana"){ echo "selected"; }?> data-value="+509">Haiti (+509)</option>
  <option value="Honduras" <?php if($this->input->post('country')=="Honduras"){ echo "selected"; }?> data-value="+504">Honduras (+504)</option>
  <option value="Hong Kong" <?php if($this->input->post('country')=="Hong Kong"){ echo "selected"; }?> data-value="+852">Hong Kong (+852)</option>
  <option value="Hungary" <?php if($this->input->post('country')=="Hungary"){ echo "selected"; }?> data-value="+36">Hungary (+36)</option>
  <option value="Iceland" <?php if($this->input->post('country')=="Iceland"){ echo "selected"; }?> data-value="+354">Iceland (+354)</option>
  <option value="Indonesia" <?php if($this->input->post('country')=="Indonesia"){ echo "selected"; }?> data-value="+62">Indonesia (+62)</option>
  <option value="Iraq" <?php if($this->input->post('country')=="Iraq"){ echo "selected"; }?> data-value="+964">Iraq (+964)</option>
  <option value="Iran" <?php if($this->input->post('country')=="Iran"){ echo "selected"; }?> data-value="+98">Iran (+98)</option>
  <option value="Ireland" <?php if($this->input->post('country')=="Ireland"){ echo "selected"; }?> data-value="+353">Ireland (+353)</option>
  <option value="Israel" <?php if($this->input->post('country')=="Israel"){ echo "selected"; }?> data-value="+972">Israel (+972)</option>
  <option value="Italy" <?php if($this->input->post('country')=="Italy"){ echo "selected"; }?> data-value="+39">Italy (+39)</option>
  <option value="Jamaica" <?php if($this->input->post('country')=="Jamaica"){ echo "selected"; }?> data-value="+1876">Jamaica (+1876)</option>
  <option value="Japan" <?php if($this->input->post('country')=="Japan"){ echo "selected"; }?> data-value="+81">Japan (+81)</option>
  <option value="Jordan" <?php if($this->input->post('country')=="Jordan"){ echo "selected"; }?> data-value="+962">Jordan (+962)</option>
  <option value="Kazakhstan" <?php if($this->input->post('country')=="Kazakhstan"){ echo "selected"; }?> data-value="+7">Kazakhstan (+7)</option>
  <option value="Kenya" <?php if($this->input->post('country')=="Kenya"){ echo "selected"; }?> data-value="+254">Kenya (+254)</option>
  <option value="Kiribati" <?php if($this->input->post('country')=="Kiribati"){ echo "selected"; }?> data-value="+686">Kiribati (+686)</option>
  <option value="Korea - North" <?php if($this->input->post('country')=="Korea - North"){ echo "selected"; }?> data-value="+850">Korea - North (+850)</option>
  <option value="Korea - South" <?php if($this->input->post('country')=="Korea - South"){ echo "selected"; }?> data-value="+82">Korea - South (+82)</option>
  <option value="Kuwait" <?php if($this->input->post('country')=="Kuwait"){ echo "selected"; }?> data-value="+965">Kuwait (+965)</option>
  <option value="Kyrgyzstan" <?php if($this->input->post('country')=="Kyrgyzstan"){ echo "selected"; }?> data-value="+996">Kyrgyzstan (+996)</option>
  <option value="Laos" <?php if($this->input->post('country')=="Laos"){ echo "selected"; }?> data-value="+856">Laos (+856)</option>
  <option value="Latvia" <?php if($this->input->post('country')=="Latvia"){ echo "selected"; }?> data-value="+371">Latvia (+371)</option>
  <option value="Lebanon" <?php if($this->input->post('country')=="Lebanon"){ echo "selected"; }?> data-value="+961">Lebanon (+961)</option>
  <option value="Lesotho" <?php if($this->input->post('country')=="Lesotho"){ echo "selected"; }?> data-value="+266">Lesotho (+266)</option>
  <option value="Liberia" <?php if($this->input->post('country')=="Liberia"){ echo "selected"; }?> data-value="+231">Liberia (+231)</option>
  <option value="Libya" <?php if($this->input->post('country')=="Libya"){ echo "selected"; }?> data-value="+218">Libya (+218)</option>
  <option value="Liechtenstein" <?php if($this->input->post('country')=="Liechtenstein"){ echo "selected"; }?> data-value="+417">Liechtenstein (+417)</option>
  <option value="Lithuania" <?php if($this->input->post('country')=="Lithuania"){ echo "selected"; }?> data-value="+370">Lithuania (+370)</option>
  <option value="Luxembourg" <?php if($this->input->post('country')=="Luxembourg"){ echo "selected"; }?> data-value="+352">Luxembourg (+352)</option>
  <option value="Macao" <?php if($this->input->post('country')=="Macao"){ echo "selected"; }?> data-value="+853">Macao (+853)</option>
  <option value="Macedonia" <?php if($this->input->post('country')=="Macedonia"){ echo "selected"; }?> data-value="+389">Macedonia (+389)</option>
  <option value="Madagascar" <?php if($this->input->post('country')=="Madagascar"){ echo "selected"; }?> data-value="+261">Madagascar (+261)</option>
  <option value="Malawi" <?php if($this->input->post('country')=="Malawi"){ echo "selected"; }?> data-value="+265">Malawi (+265)</option>
  <option value="Malaysia" <?php if($this->input->post('country')=="Malaysia"){ echo "selected"; }?> data-value="+60">Malaysia (+60)</option>
  <option value="Maldives" <?php if($this->input->post('country')=="Maldives"){ echo "selected"; }?> data-value="+960">Maldives (+960)</option>
  <option value="Mali" <?php if($this->input->post('country')=="Mali"){ echo "selected"; }?> data-value="+223">Mali (+223)</option>
  <option value="Malta" <?php if($this->input->post('country')=="Malta"){ echo "selected"; }?> data-value="+356">Malta (+356)</option>
  <option value="Marshall Islands" <?php if($this->input->post('country')=="Marshall Islands"){ echo "selected"; }?> data-value="+692">Marshall Islands (+692)</option>
  <option value="Martinique" <?php if($this->input->post('country')=="Martinique"){ echo "selected"; }?> data-value="+596">Martinique (+596)</option>
  <option value="Mauritania" <?php if($this->input->post('country')=="Mauritania"){ echo "selected"; }?> data-value="+222">Mauritania (+222)</option>
  <option value="Mauritius" <?php if($this->input->post('country')=="Mauritius"){ echo "selected"; }?> data-value="+230">Mauritius (+230)</option>
  <option value="Mayotte" <?php if($this->input->post('country')=="Mayotte"){ echo "selected"; }?> data-value="+269">Mayotte (+269)</option>
  <option value="Mexico" <?php if($this->input->post('country')=="Mexico"){ echo "selected"; }?> data-value="+52">Mexico (+52)</option>
  <option value="Micronesia" <?php if($this->input->post('country')=="Micronesia"){ echo "selected"; }?> data-value="+691">Micronesia (+691)</option>
  <option value="Moldova" <?php if($this->input->post('country')=="Moldova"){ echo "selected"; }?> data-value="+373">Moldova (+373)</option>
  <option value="Monaco" <?php if($this->input->post('country')=="Monaco"){ echo "selected"; }?> data-value="+377">Monaco (+377)</option>
  <option value="Mongolia" <?php if($this->input->post('country')=="Mongolia"){ echo "selected"; }?> data-value="+976">Mongolia (+976)</option>
  <option value="Montserrat" <?php if($this->input->post('country')=="Montserrat"){ echo "selected"; }?> data-value="+1664">Montserrat (+1664)</option>
  <option value="Morocco" <?php if($this->input->post('country')=="Morocco"){ echo "selected"; }?> data-value="+212">Morocco (+212)</option>
  <option value="Mozambique" <?php if($this->input->post('country')=="Mozambique"){ echo "selected"; }?> data-value="+258">Mozambique (+258)</option>
  <option value="Myanmar" <?php if($this->input->post('country')=="Myanmar"){ echo "selected"; }?> data-value="+95">Myanmar (+95)</option>
  <option value="Namibia" <?php if($this->input->post('country')=="Namibia"){ echo "selected"; }?> data-value="+264">Namibia (+264)</option>
  <option value="Nauru" <?php if($this->input->post('country')=="Nauru"){ echo "selected"; }?> data-value="+674">Nauru (+674)</option>
  <option value="Nepal" <?php if($this->input->post('country')=="Nepal"){ echo "selected"; }?> data-value="+977">Nepal (+977)</option>
  <option value="Netherlands" <?php if($this->input->post('country')=="Netherlands"){ echo "selected"; }?> data-value="+31">Netherlands (+31)</option>
  <option value="New Caledonia" <?php if($this->input->post('country')=="New Caledonia"){ echo "selected"; }?> data-value="+687">New Caledonia (+687)</option>
  <option value="New Zealand" <?php if($this->input->post('country')=="New Zealand"){ echo "selected"; }?> data-value="+64">New Zealand (+64)</option>
  <option value="Nicaragua" <?php if($this->input->post('country')=="Nicaragua"){ echo "selected"; }?> data-value="+505">Nicaragua (+505)</option>
  <option value="Niger" <?php if($this->input->post('country')=="Niger"){ echo "selected"; }?> data-value="+227">Niger (+227)</option>
  <option value="Nigeria" <?php if($this->input->post('country')=="Nigeria"){ echo "selected"; }?> data-value="+234">Nigeria (+234)</option>
  <option value="Niue" <?php if($this->input->post('country')=="Niue"){ echo "selected"; }?> data-value="+683">Niue (+683)</option>
  <option value="Norfolk Islands" <?php if($this->input->post('country')=="Norfolk Islands"){ echo "selected"; }?> data-value="+672">Norfolk Islands (+672)</option>
  <option value="Northern Marianas" <?php if($this->input->post('country')=="Northern Marianas"){ echo "selected"; }?> data-value="+670">Northern Marianas (+670)</option>
  <option value="Norway" <?php if($this->input->post('country')=="Norway"){ echo "selected"; }?> data-value="+47">Norway (+47)</option>
  <option value="Oman" <?php if($this->input->post('country')=="Oman"){ echo "selected"; }?> data-value="+968">Oman (+968)</option>
  <option value="Pakistan" <?php if($this->input->post('country')=="Pakistan"){ echo "selected"; }?> data-value="+92">Pakistan (+92)</option>
  <option value="Palau" <?php if($this->input->post('country')=="Palau"){ echo "selected"; }?> data-value="+680">Palau (+680)</option>
  <option value="Panama" <?php if($this->input->post('country')=="Panama"){ echo "selected"; }?> data-value="+507">Panama (+507)</option>
  <option value="Papua New Guinea" <?php if($this->input->post('country')=="Papua New Guinea"){ echo "selected"; }?> data-value="+675">Papua New Guinea (+675)</option>
  <option value="Paraguay" <?php if($this->input->post('country')=="Paraguay"){ echo "selected"; }?> data-value="+595">Paraguay (+595)</option>
  <option value="Peru" <?php if($this->input->post('country')=="Peru"){ echo "selected"; }?> data-value="+51">Peru (+51)</option>
  <option value="Philippines" <?php if($this->input->post('country')=="Philippines"){ echo "selected"; }?> data-value="+63">Philippines (+63)</option>
  <option value="Poland" <?php if($this->input->post('country')=="Poland"){ echo "selected"; }?> data-value="+48">Poland (+48)</option>
  <option value="Portugal" <?php if($this->input->post('country')=="Portugal"){ echo "selected"; }?> data-value="+351">Portugal (+351)</option>
  <option value="Puerto Rico" <?php if($this->input->post('country')=="Puerto Rico"){ echo "selected"; }?> data-value="+1787">Puerto Rico (+1787)</option>
  <option value="Qatar" <?php if($this->input->post('country')=="Qatar"){ echo "selected"; }?> data-value="+974">Qatar (+974)</option>
  <option value="Reunion" <?php if($this->input->post('country')=="Reunion"){ echo "selected"; }?> data-value="+262">Reunion (+262)</option>
  <option value="Romania" <?php if($this->input->post('country')=="Romania"){ echo "selected"; }?> data-value="+40">Romania (+40)</option>
  <option value="Russia" <?php if($this->input->post('country')=="Russia"){ echo "selected"; }?> data-value="+7">Russia (+7)</option>
  <option value="Rwanda" <?php if($this->input->post('country')=="Rwanda"){ echo "selected"; }?> data-value="+250">Rwanda (+250)</option>
  <option value="San Marino" <?php if($this->input->post('country')=="San Marino"){ echo "selected"; }?> data-value="+378">San Marino (+378)</option>
  <option value="Sao Tome &amp; Principe" <?php if($this->input->post('country')=="Sao Tome & Principe"){ echo "selected"; }?> data-value="+239">Sao Tome &amp; Principe (+239)</option>
  <option value="Saudi Arabia" <?php if($this->input->post('country')=="Saudi Arabia"){ echo "selected"; }?> data-value="+966">Saudi Arabia (+966)</option>
  <option value="Senegal" <?php if($this->input->post('country')=="Senegal"){ echo "selected"; }?> data-value="+221">Senegal (+221)</option>
  <option value="Serbia" <?php if($this->input->post('country')=="Serbia"){ echo "selected"; }?> data-value="+381">Serbia (+381)</option>
  <option value="Seychelles" <?php if($this->input->post('country')=="Seychelles"){ echo "selected"; }?> data-value="+248">Seychelles (+248)</option>
  <option value="Sierra Leone" <?php if($this->input->post('country')=="Sierra Leone"){ echo "selected"; }?> data-value="+232">Sierra Leone (+232)</option>
  <option value="Singapore" <?php if($this->input->post('country')=="Singapore"){ echo "selected"; }?> data-value="+65">Singapore (+65)</option>
  <option value="Slovak Republic" <?php if($this->input->post('country')=="Slovak Republic"){ echo "selected"; }?> data-value="+421">Slovak Republic (+421)</option>
  <option value="Slovenia" <?php if($this->input->post('country')=="Slovenia"){ echo "selected"; }?> data-value="+386">Slovenia (+386)</option>
  <option value="Solomon Islands" <?php if($this->input->post('country')=="Solomon Islands"){ echo "selected"; }?> data-value="+677">Solomon Islands (+677)</option>
  <option value="Somalia" <?php if($this->input->post('country')=="Somalia"){ echo "selected"; }?> data-value="+252">Somalia (+252)</option>
  <option value="South Africa" <?php if($this->input->post('country')=="South Africa"){ echo "selected"; }?> data-value="+27">South Africa (+27)</option>
  <option value="Spain" <?php if($this->input->post('country')=="Spain"){ echo "selected"; }?> data-value="+34">Spain (+34)</option>
  <option value="Sri Lanka" <?php if($this->input->post('country')=="Sri Lanka"){ echo "selected"; }?> data-value="+94">Sri Lanka (+94)</option>
  <option value="St. Helena" <?php if($this->input->post('country')=="St. Helena"){ echo "selected"; }?> data-value="+290">St. Helena (+290)</option>
  <option value="St. Kitts" <?php if($this->input->post('country')=="St. Kitts"){ echo "selected"; }?> data-value="+1869">St. Kitts (+1869)</option>
  <option value="St. Lucia" <?php if($this->input->post('country')=="St. Lucia"){ echo "selected"; }?> data-value="+1758">St. Lucia (+1758)</option>
  <option value="Suriname" <?php if($this->input->post('country')=="Suriname"){ echo "selected"; }?> data-value="+597">Suriname (+597)</option>
  <option value="Sudan" <?php if($this->input->post('country')=="Sudan"){ echo "selected"; }?> data-value="+249">Sudan (+249)</option>
  <option value="Swaziland" <?php if($this->input->post('country')=="Swaziland"){ echo "selected"; }?> data-value="+268">Swaziland (+268)</option>
  <option value="Sweden" <?php if($this->input->post('country')=="Sweden"){ echo "selected"; }?> data-value="+46">Sweden (+46)</option>
  <option value="Switzerland" <?php if($this->input->post('country')=="Switzerland"){ echo "selected"; }?> data-value="+41">Switzerland (+41)</option>
  <option value="Syria" <?php if($this->input->post('country')=="Syria"){ echo "selected"; }?> data-value="+963">Syria (+963)</option>
  <option value="Taiwan" <?php if($this->input->post('country')=="Taiwan"){ echo "selected"; }?> data-value="+886">Taiwan (+886)</option>
  <option value="Tajikistan" <?php if($this->input->post('country')=="Tajikistan"){ echo "selected"; }?> data-value="+992">Tajikistan (+992)</option>
  <option value="Thailand" <?php if($this->input->post('country')=="Thailand"){ echo "selected"; }?> data-value="+66">Thailand (+66)</option>
  <option value="Togo" <?php if($this->input->post('country')=="Togo"){ echo "selected"; }?> data-value="+228">Togo (+228)</option>
  <option value="Tonga" <?php if($this->input->post('country')=="Tonga"){ echo "selected"; }?> data-value="+676">Tonga (+676)</option>
  <option value="Trinidad &amp; Tobago" <?php if($this->input->post('country')=="Trinidad & Tobago"){ echo "selected"; }?> data-value="+1868">Trinidad &amp; Tobago (+1868)</option>
  <option value="Tunisia" <?php if($this->input->post('country')=="Tunisia"){ echo "selected"; }?> data-value="+216">Tunisia (+216)</option>
  <option value="Turkey" <?php if($this->input->post('country')=="Turkey"){ echo "selected"; }?> data-value="+90">Turkey (+90)</option>
  <option value="Turkmenistan" <?php if($this->input->post('country')=="Turkmenistan"){ echo "selected"; }?> data-value="+993">Turkmenistan (+993)</option>
  <option value="Turks &amp; Caicos Islands" <?php if($this->input->post('country')=="Turks & Caicos Islands"){ echo "selected"; }?> data-value="+1649">Turks &amp; Caicos Islands (+1649)</option>
  <option value="Tuvalu" <?php if($this->input->post('country')=="Tuvalu"){ echo "selected"; }?> data-value="+688">Tuvalu (+688)</option>
  <option value="Uganda" <?php if($this->input->post('country')=="Uganda"){ echo "selected"; }?> data-value="+256">Uganda (+256)</option>
  <option value="United Kingdom" <?php if($this->input->post('country')=="United Kingdom"){ echo "selected"; }?> data-value="+44">United Kingdom (+44)</option>
  <option value="Ukraine" <?php if($this->input->post('country')=="Ukraine"){ echo "selected"; }?> data-value="+380">Ukraine (+380)</option>
  <option value="United Arab Emirates" <?php if($this->input->post('country')=="United Arab Emirates"){ echo "selected"; }?> data-value="+971">United Arab Emirates (+971)</option>
  <option value="United States of America" <?php if($this->input->post('country')=="United States of America"){ echo "selected"; }?> data-value="+1">United States of America (+1)</option>
  <option value="Uruguay" <?php if($this->input->post('country')=="Uruguay"){ echo "selected"; }?> data-value="+598">Uruguay (+598)</option>
  <option value="Uzbekistan" <?php if($this->input->post('country')=="Uzbekistan"){ echo "selected"; }?> data-value="+998">Uzbekistan (+998)</option>
  <option value="Vanuatu" <?php if($this->input->post('country')=="Vanuatu"){ echo "selected"; }?> data-value="+678">Vanuatu (+678)</option>
  <option value="Vatican City" <?php if($this->input->post('country')=="Vatican City"){ echo "selected"; }?> data-value="+379">Vatican City (+379)</option>
  <option value="Venezuela" <?php if($this->input->post('country')=="Venezuela"){ echo "selected"; }?> data-value="+58">Venezuela (+58)</option>
  <option value="Vietnam" <?php if($this->input->post('country')=="Vietnam"){ echo "selected"; }?> data-value="+84">Vietnam (+84)</option>
  <option value="Virgin Islands - British" <?php if($this->input->post('country')=="Virgin Islands - British"){ echo "selected"; }?> data-value="+1">Virgin Islands - British (+1)</option>
  <option value="Virgin Islands - US" <?php if($this->input->post('country')=="Virgin Islands - US"){ echo "selected"; }?> data-value="+1">Virgin Islands - US (+1)</option>
  <option value="Wallis &amp; Futuna" <?php if($this->input->post('country')=="Wallis & Futuna"){ echo "selected"; }?> data-value="+681">Wallis &amp; Futuna (+681)</option>
  <option value="Yemen" <?php if($this->input->post('country')=="Yemen"){ echo "selected"; }?> data-value="+969">Yemen (North)(+969)</option>
  <option value="Yemen" <?php if($this->input->post('country')=="Yemen"){ echo "selected"; }?> data-value="+967">Yemen (South)(+967)</option>
  <option value="Zambia" <?php if($this->input->post('country')=="Zambia"){ echo "selected"; }?> data-value="+260">Zambia (+260)</option>
  <option value="Zimbabwe" <?php if($this->input->post('country')=="Zimbabwe"){ echo "selected"; }?> data-value="+263">Zimbabwe (+263)</option>
</select>