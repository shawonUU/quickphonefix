<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Quick Phone Fix N More</title>
 <style>
      @page {
        size: auto;
        margin: 0mm;
      }

      @media print {
        body {
          -webkit-print-color-adjust: exact;
        }
      }
    </style>

   <link rel="stylesheet" href="{{asset('assets/css/invoice.css')}}">
  </head>
  <body style="color: black !important;">

    <div style="page-break-after: always;">
      <div class="fk-print t-pt-30 t-pb-30">
        <div style="display:flex !important; justify-content:center !important;">
          <div id="preview" style="padding: 2px;" content="width=device-width, initial-scale=1.0">
            <div class="row">
              <div class="col-12 text-center">
                <span class="d-block fk-print-text fk-print-text--bold text-uppercase fk-print__title text-center mb-2">Quick Phone Fix N More</span>
                <p class="mb-0 xsm-text fk-print-text text-center text-capitalize" style="font-size: 14px;">Invoice (Office Copy)</p>
                <p></p>
                <p class="mb-0 xsm-text fk-print-text text-center text-capitalize" style="font-size: 14px;">7157 Ogontaz Ave,
                Philadelphia PA 19138</p>
                <p class="mb-0 xsm-text fk-print-text text-center text-capitalize" style="font-size: 14px;">Hotline: +445 309 7609</p>
                <div class="col-12 mt-1 mb-1" style="border-bottom: 1px dashed"></div>
                <!-- <span class="d-block fk-print-text fk-print-text--bold text-uppercase text-center md-text">Kitchen Order Token  (KOT)</span> -->
                <div class="col-12 mt-1 mb-1" style="border-bottom: 1px dashed"></div>
                
                
                <table class="table mb-0 text table-borderless">
                  <thead>
                    <tr style="border-bottom: 1px dashed ">
                      <th scope="col" class="fk-print-text fk-print-text--bold xxsm-text text-capitalize" style="font-size: 14px;">Customer Info:</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr style="">
                      <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">
                        <span class="d-block">
                          <span class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Name: {{$service->name}} </span>
                        </span>
                      </td>
                    </tr>
                    <tr style=" ">
                      <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">
                        <span class="d-block">
                          <span class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Phone: {{$service->phone}} </span>
                        </span>
                      </td>
                    </tr>
                    <tr style="">
                      <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">
                        <span class="d-block">
                          <span class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Email: {{$service->email}} </span>
                        </span>
                      </td>
                    </tr>
                    <tr style="">
                      <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">
                        <span class="d-block">
                          <span class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Address: {{$service->address}} </span>
                        </span>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>
                <table class="table mb-0 text table-borderless">
                  <tbody>
                    <tr style="border-bottom: 1px dashed ">
                      <th scope="col" class="fk-print-text fk-print-text--bold xxsm-text text-capitalize" style="font-size: 14px;" colspan="6">Service Info:</th>
                    </tr>
                    @if($service->details != "")
                      <tr>
                        <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px; max-width: 750px !important;" colspan="6">
                            Details: <br>
                            {{$service->details}}
                        </td>
                      </tr>
                    @endif
                    <tr>
                        <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px; " colspan="6">
                            Repaired By: {{getArrayData($serviceMans,$service->repaired_by)}}
                        </td>
                      </tr>
                    <tr>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Product</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">EMEI</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Warranty</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Price</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Paid</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Due</th>
                    </tr>
                    <tr>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">{{$service->product_name}}</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">{{$service->product_number}}</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">{{$service->warranty_duration}} Days</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">${{$service->bill}}</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">${{$service->paid_amount}}</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">${{$service->due_amount}}</td>
                    </tr>
                  </tbody>
                </table>
                <!-- <hr> -->
                <!-- <hr> -->
                <!-- <p class="mb-0 xsm-text fk-print-text text-capitalize text-center">bill prepared by: Ariya Stark</p> -->
                <!-- <span>---------------------------------------------------------------------------------------------------</span> -->
                <div class="col-12 mt-2 mb-1" style="border-bottom: 1px dashed"></div>
                <span scope="col" class="fk-print-text fk-print-text--bold xsm-text text-capitalize" style="font-size: 14px;" id="datePlaceholder">Date: {{date("m-d-Y g:i A")}}</span>
                <br>
                <span scope="col" class="fk-print-text fk-print-text--bold xsm-text text-capitalize text-center" style="font-size: 14px;">Generate By: {{auth()->user()->name}}</span>
                <table class="table mt-1 mb-1 text-center table-borderless">
                  <thead>
                    <tr></tr>
                  </thead>
                </table>
                <div class="col-12 mt-0" style="border-bottom: 1px dashed"></div>
                <p class="mb-0 sm-text fk-print-text--bold text-center text-capitalize" style="font-size: 12px;">Thank You. Please come again</p>
                <p class="mb-0 sm-text fk-print-text--bold text-center text-capitalize" style="font-size: 12px;">Note: Warranty For 7 Days. Warranty Does Not Cover Broken Or Water Damage. No Refund, Exchange Only.</p>
                <div class="col-12 mt-0" style="border-bottom: 1px dashed"></div>
                <div class="col-12 mt-0" style="border-bottom: 1px dashed"></div>
                <div class="no-cut">&nbsp;</div>
                <div class="no-cut">&nbsp;</div>
                <div class="no-cut">&nbsp;</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="page-break-before: always;">
      <div class="fk-print t-pt-30 t-pb-30">
        <div style="display:flex; justify-content:center;">
          <div id="preview" style="padding: 2px;" content="width=device-width, initial-scale=1.0">
            <div class="row">
              <div class="col-12 text-center">
                <span class="d-block fk-print-text fk-print-text--bold text-uppercase fk-print__title text-center mb-2">Quick Phone Fix N More</span>
                <p class="mb-0 xsm-text fk-print-text text-center text-capitalize" style="font-size: 14px;">Invoice (Customer Copy)</p>
                <p></p>
                <p class="mb-0 xsm-text fk-print-text text-center text-capitalize" style="font-size: 14px;">7157 Ogontaz Ave,
                Philadelphia PA 19138</p>
                <p class="mb-0 xsm-text fk-print-text text-center text-capitalize" style="font-size: 14px;">Hotline: +445 309 7609</p>
                <div class="col-12 mt-1 mb-1" style="border-bottom: 1px dashed"></div>
                <!-- <span class="d-block fk-print-text fk-print-text--bold text-uppercase text-center md-text">Kitchen Order Token  (KOT)</span> -->
                <div class="col-12 mt-1 mb-1" style="border-bottom: 1px dashed"></div>
                
                
                <table class="table mb-0 text table-borderless">
                  <thead>
                    <tr style="border-bottom: 1px dashed ">
                      <th scope="col" class="fk-print-text fk-print-text--bold xxsm-text text-capitalize" style="font-size: 14px;">Customer Info:</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr style="">
                      <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">
                        <span class="d-block">
                          <span class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Name: {{$service->name}} </span>
                        </span>
                      </td>
                    </tr>
                    <tr style=" ">
                      <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">
                        <span class="d-block">
                          <span class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Phone: {{$service->phone}} </span>
                        </span>
                      </td>
                    </tr>
                    <tr style="">
                      <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">
                        <span class="d-block">
                          <span class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Email: {{$service->email}} </span>
                        </span>
                      </td>
                    </tr>
                    <tr style="">
                      <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">
                        <span class="d-block">
                          <span class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Address: {{$service->address}} </span>
                        </span>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>
                <table class="table mb-0 text table-borderless">
                  <tbody>
                    <tr style="border-bottom: 1px dashed ">
                      <th scope="col" class="fk-print-text fk-print-text--bold xxsm-text text-capitalize" style="font-size: 14px;" colspan="6">Service Info:</th>
                    </tr>
                    @if($service->details != "")
                      <tr>
                        <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px; max-width: 750px !important;" colspan="6">
                            Details: <br>
                            {{$service->details}}
                        </td>
                      </tr>
                    @endif
                    <tr>
                        <td class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px; " colspan="6">
                            Repaired By: {{getArrayData($serviceMans,$service->repaired_by)}}
                        </td>
                      </tr>
                    <tr>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Product</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">EMEI</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Warranty</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Price</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Paid</th>
                      <th class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">Due</th>
                    </tr>
                    <tr>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">{{$service->product_name}}</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">{{$service->product_number}}</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">{{$service->warranty_duration}} Days</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">${{$service->bill}}</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">${{$service->paid_amount}}</td>
                      <td  class="fk-print-text xxsm-text text-capitalize" style="font-size: 14px;">${{$service->due_amount}}</td>
                    </tr>
                  </tbody>
                </table>
                <!-- <hr> -->
                <!-- <hr> -->
                <!-- <p class="mb-0 xsm-text fk-print-text text-capitalize text-center">bill prepared by: Ariya Stark</p> -->
                <!-- <span>---------------------------------------------------------------------------------------------------</span> -->
                <div class="col-12 mt-2 mb-1" style="border-bottom: 1px dashed"></div>
                <span scope="col" class="fk-print-text fk-print-text--bold xsm-text text-capitalize" style="font-size: 14px;" id="datePlaceholder">Date: {{date("m-d-Y g:i A")}}</span>
                <br>
                <span scope="col" class="fk-print-text fk-print-text--bold xsm-text text-capitalize text-center" style="font-size: 14px;">Generate By: {{auth()->user()->name}}</span>
                <table class="table mt-1 mb-1 text-center table-borderless">
                  <thead>
                    <tr></tr>
                  </thead>
                </table>
                <div class="col-12 mt-0" style="border-bottom: 1px dashed"></div>
                <p class="mb-0 sm-text fk-print-text--bold text-center text-capitalize" style="font-size: 12px;">Thank You. Please come again</p>
                <p class="mb-0 sm-text fk-print-text--bold text-center text-capitalize" style="font-size: 12px;">Note: Warranty For 7 Days. Warranty Does Not Cover Broken Or Water Damage. No Refund, Exchange Only.</p>
                <div class="col-12 mt-0" style="border-bottom: 1px dashed"></div>
                <div class="col-12 mt-0" style="border-bottom: 1px dashed"></div>
                <div class="no-cut">&nbsp;</div>
                <div class="no-cut">&nbsp;</div>
                <div class="no-cut">&nbsp;</div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-print-none" style="display:flex; justify-content:center;">
          <button onclick="printPage(true)" class="d-print-none btn btn-sm btn-primary mt-2">Print</button>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script type="application/javascript">
      $(document).ready(function() {
        // printPage();
      });

      function printPage(clicked = false) {
        const userAgent = navigator.userAgent.toLowerCase();
        const platform = navigator.platform.toLowerCase();
        var isAndroid = userAgent.includes('android') || platform.includes('android') || userAgent.includes('linux') && !userAgent.includes('windows');
        if (isAndroid) {
          if (!clicked) return;
          // localStorage.setItem('username', 'JohnDoe');
          var printerKey = localStorage.getItem('printer_key');
          if (!printerKey) {
            printerKey = prompt("Please enter Sunmi Printer Key:");
            if (printerKey == null || printerKey == "") {
              return;
            } else {
              localStorage.setItem('printer_key', printerKey);
            }
          }
          const content = document.getElementById('preview');
          content.style.width = "400px";
          html2canvas(content).then(canvas => {
            // const originalWidth = canvas.width;
            // const originalHeight = canvas.height;
            // const newWidth = 600;
            // const newHeight = (originalHeight / originalWidth) * newWidth;
            // const newCanvas = document.createElement('canvas');
            // newCanvas.width = newWidth;
            // newCanvas.height = newHeight;
            // const ctx = newCanvas.getContext('2d');
            // ctx.drawImage(canvas, 0, 0, newWidth, newHeight);
            const imgData = canvas.toDataURL('image/png');
            const img = document.createElement('img');
            img.src = imgData;
            img.alt = "Captured Image";
            // document.body.appendChild(img);
            // Create a new FormData object
            const formData = new FormData();
            // Append your form data to the FormData object
            formData.append('imageData', imgData);
            formData.append('order_id', '07064560');
            formData.append('user_id', '10');
            formData.append('print_of', 'Invoice');
            formData.append('printer_key', printerKey);
            // Include CSRF token
            formData.append('_token', 'QmLA1YvcFRmadAHnyqaC5XCC7Cnv0LDLPNNGTQH1');
            // Send POST request
            $.ajax({
              url: "https://konacafedhaka.com/cut-paper",
              method: "POST",
              data: formData,
              processData: false, // Prevent jQuery from automatically processing the data
              contentType: false, // Prevent jQuery from automatically setting the Content-Type header
              success: function(data) {
                console.log(data);
              },
              error: function(xhr, status, error) {
                console.error(error);
              }
            });
          });
        } else {
          window.print();
        }
      }
    </script>
  </body>
</html>